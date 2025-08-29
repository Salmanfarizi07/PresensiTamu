<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Tujuan;
use App\Models\Submission;
use Mpdf\Mpdf;

class TujuanController extends Controller
{

    public function index(Request $request)
    {
        $unitFilter = $request->unit;

        // Ambil semua tujuan sesuai filter (opsional)
        $tujuans = Tujuan::when($unitFilter, function($query) use ($unitFilter) {
            $query->where('unit', $unitFilter);
        })->get();

        // Hitung total kunjungan per unit
        $rekapKunjunganPerUnitQuery = DB::table('submissions')
            ->join('tujuans', 'submissions.tujuan_id', '=', 'tujuans.id')
            ->select('tujuans.unit', DB::raw('COUNT(*) as total_kunjungan'))
            ->groupBy('tujuans.unit');

        if ($unitFilter) {
            $rekapKunjunganPerUnitQuery->where('tujuans.unit', $unitFilter);
        }

        $rekapKunjunganPerUnit = $rekapKunjunganPerUnitQuery->pluck('total_kunjungan', 'unit');

        return view('tujuans.index', compact('tujuans', 'rekapKunjunganPerUnit', 'unitFilter'));
    }

    // Form tambah tujuan
    public function create()
    {
        return view('tujuans.create');
    }

    // Simpan tujuan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'unit' => 'required|string|in:UPT,UP2B',
        ]);

        Tujuan::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'unit' => $request->unit,
        ]);

        return redirect()->route('tujuans.index')->with('success', 'Data berhasil ditambahkan!');
    }

    // Form edit tujuan
    public function edit($id)
    {
        $tujuan = Tujuan::findOrFail($id);
        return view('tujuans.edit', compact('tujuan'));
    }

    // Update tujuan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'unit' => 'required|string|in:UPT,UP2B',
        ]);

        $tujuan = Tujuan::findOrFail($id);
        $tujuan->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'unit' => $request->unit,
        ]);

        return redirect()->route('tujuans.index')->with('success', 'Data berhasil diperbarui!');
    }

    // Hapus tujuan
    public function destroy($id)
    {
        $tujuan = Tujuan::findOrFail($id);
        $tujuan->delete();

        return redirect()->route('tujuans.index')->with('success', 'Data berhasil dihapus!');
    }

    public function picPdf(Request $request)
    {
        $unit = $request->input('unit');
        $filter = $request->input('filter', 'today');
        $start = $request->input('start_date');
        $end   = $request->input('end_date');

        $query = Tujuan::where('unit', $unit);

        if ($filter === 'today') {
            $query->whereDate('created_at', now());
        } elseif ($filter === 'week') {
            $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
        } elseif ($filter === 'month') {
            $query->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year);
        } elseif ($filter === 'range' && $start && $end) {
            $query->whereBetween('created_at', [$start, $end]);
        }

        $data = $query->get();

        // Render blade ke HTML
        $html = view('pdf.tujuan', compact('data','unit','filter','start','end'))->render();

        // Buat objek mPDF
        $mpdf = new Mpdf();

        $mpdf->WriteHTML($html);
        $mpdf->Output("tujuan_{$unit}.pdf", 'I'); // 'I' untuk stream ke browser, 'D' untuk download
    }



}

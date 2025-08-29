<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Tujuan;
use Mpdf\Mpdf;

use Carbon\Carbon;

class PdfController extends Controller
{
    public function cetakLaporan(Request $request)
    {
        $filter = $request->filter ?? 'today'; // default filter hari ini
        $start = $request->start_date;
        $end   = $request->end_date;

        $query = Laporan::query();

        if($filter === 'today') {
            $query->whereDate('created_at', today());
            $start = today()->format('Y-m-d');
            $end   = today()->format('Y-m-d');

        } elseif($filter === 'week') {
            $start = Carbon::now()->startOfWeek()->format('Y-m-d'); // Senin
            $end   = Carbon::now()->endOfWeek()->format('Y-m-d');   // Minggu
            $query->whereBetween('created_at', [$start, $end]);

        } elseif($filter === 'month') {
            $query->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year);
            $start = now()->startOfMonth()->format('Y-m-d');
            $end   = now()->endOfMonth()->format('Y-m-d');

        } elseif($filter === 'range') {
            if($start && $end) {
                $query->whereDate('created_at', '>=', $start)
                    ->whereDate('created_at', '<=', $end);
            } else {
                // fallback ke hari ini jika range kosong
                $start = today()->format('Y-m-d');
                $end   = today()->format('Y-m-d');
                $query->whereDate('created_at', today());
            }
        }

        $laporans = $query->orderBy('created_at','asc')->get();

        $html = view('pdf.laporans', compact('laporans','start','end'))->render();

        $mpdf = new \Mpdf\Mpdf(['format'=>'A4-L']);
        $mpdf->WriteHTML($html);

        $filename = 'laporan_' . $start . '_sampai_' . $end . '.pdf';
        return $mpdf->Output($filename, 'I');
    }
    
    public function picPdf($unit)
    {
        // Ambil data sesuai unit yang dipilih
        $rekapKunjunganPerUnit = DB::table('submissions')
            ->join('tujuans', 'submissions.tujuan_id', '=', 'tujuans.id')
            ->select('tujuans.unit', DB::raw('COUNT(*) as total_kunjungan'))
            ->where('tujuans.unit', $unit)
            ->groupBy('tujuans.unit')
            ->get();

        // Kalau datanya kosong
        if ($rekapKunjunganPerUnit->isEmpty()) {
            return redirect()->back()->with('error', "Belum ada data untuk unit $unit.");
        }

        // Render view untuk PDF
        $html = view('pdf.tujuan', compact('rekapKunjunganPerUnit', 'unit'))->render();

        // Inisialisasi mPDF
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);

        // Output download PDF (nama file sesuai unit)
        $mpdf->Output("rekap_kunjungan_{$unit}.pdf", 'D');
    }

}

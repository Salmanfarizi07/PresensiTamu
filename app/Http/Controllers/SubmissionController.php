<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;
use App\Models\Zone;
use App\Models\Tujuan;



class SubmissionController extends Controller
{
    public function usermain()
    {
        $tamuPending   = Submission::where('status', 'pending')->latest()->get();
        $tamuAktif    = Submission::where('status', 'aktif')->latest()->get();
        $tamuNonAktif = Submission::where('status', 'nonaktif')->latest()->get();

        return view('submission.usermain', compact('tamuPending', 'tamuAktif', 'tamuNonAktif'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'tujuan_id' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jumlah' => 'required|string|max:255',
            'keperluan' => 'required|string|max:255',
            'keluar' => 'nullable|string|max:5',
            'identitas' => 'required|string|max:255',
            'daerah' => 'nullable|string|max:255',
            'nokartu' => 'required|string|max:255',
            'nopol' => 'required|string|max:255',
        ]);

        Submission::create([
            'tujuan_id' => $request->tujuan_id, // sudah gabung dari JS
            'name' => $request->name,
            'alamat' => $request->alamat,
            'jumlah' => $request->jumlah,
            'keperluan' => $request->keperluan,
            'keluar' => null,
            'identitas' => $request->identitas,
            'daerah' => strtoupper($request->daerah ?? ''),
            'nokartu' => $request->nokartu,
            'nopol' => strtoupper($request->nopol ?? ''),
            'status' => 'pending',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan!'
        ]);
    }

    public function create()
    {
        // arahkan ke view yang kamu buat
        $tujuans = \App\Models\Tujuan::all();
        $tujuans = Tujuan::orderBy('unit')->orderBy('nama')->get();
        return view('submission.add', compact('tujuans'));
    }

    public function edit($id)
    {
        $submission = Submission::findOrFail($id);

        // Cek status
        if ($submission->status !== 'aktif') {
            return redirect()->route('datatamu')
                            ->with('error', 'Data ini tidak dapat diedit karena statusnya bukan aktif.');
        }

        $tujuans = Tujuan::orderBy('unit')->orderBy('nama')->get();
        return view('submission.edit', compact('submission', 'tujuans'));
    }

    public function update(Request $request, $id)
    {
        $submission = Submission::findOrFail($id);

        // Cek status sebelum update
        if ($submission->status !== 'aktif') {
            return redirect()->route('datatamu')
                            ->with('error', 'Data ini tidak dapat diupdate karena statusnya bukan aktif.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jumlah' => 'required|string|max:255',
            'keluar' => 'nullable|string|max:5',
            'keperluan' => 'required|string|max:255',
            'identitas' => 'required|string|max:255',
            'daerah' => 'nullable|string|max:255',
            'nokartu' => 'required|string|max:255',
            'nopol' => 'required|string|max:255',
        ]);

        $submission->update($request->all());

        return redirect()->route('datatamu')->with('success', 'Data berhasil diupdate!');
    }


    public function datatamu(Request $request)
    {
        $statusFilter = $request->get('status'); // ambil filter status

        $query = Submission::latest(); // urut berdasarkan created_at DESC
        dd($statusFilter, $submissions->pluck('status'));

        if(in_array($statusFilter, ['aktif','pending'])) {
            $query->where('status', $statusFilter);
        }

        $submissions = $query->get();

        return view('submission.datatamu', compact('submissions', 'statusFilter'));
    }


    
    
    // Tombol "Selesaikan Presensi"
    public function selesai(Request $request, $id) 
    {
        $tamu = Submission::findOrFail($id);
        
        $tamu->status = 'nonaktif';
        $tamu->save();
        return response()->json([
        'success' => true,
        'tamu' => [
            'name' => $tamu->name,
            'identitas' => $tamu->identitas,
            'nopol' => $tamu->nopol,
        ]
        ]);

    }

    public function accPending(Request $request, $id)
    {
        $request->validate([
            'id_kartu' => 'required|string|size:10',
        ]);

        $zone = Zone::where('id_kartu', $request->id_kartu)->first();

        if (!$zone) {
            return response()->json([
                'success' => false,
                'message' => 'ID Kartu tidak valid!'
            ], 404);
        }

        $tamu = Submission::findOrFail($id);
        $tamu->status   = 'aktif';
        $tamu->daerah   = $zone->nomor . '-' . $zone->zona; // nomor-zona
        $tamu->id_kartu = $zone->id_kartu;                  // simpan ID Kartu asli
        $tamu->save();

        return response()->json([
            'success' => true,
            'message' => 'Tamu berhasil diaktifkan!',
            'tamu' => [
                'name'   => $tamu->name,
                'daerah' => $tamu->daerah,
                'status' => $tamu->status
            ]
        ]);
    }



    public function resetNonaktif()
    {
        Submission::where('status', 'nonaktif')->delete();

        return redirect()->back()->with('success', 'Semua data tamu nonaktif berhasil direset.');
    }

    public function forceDelete($id)
    {
        $tamu = Submission::findOrFail($id);
        $tamu->delete(); // hapus permanen dari database

        return redirect()->back()->with('success', 'Data tamu berhasil dihapus permanen.');
    }
    
    public function laporanNonaktif()
    {
        $totalNonaktif = \App\Models\Submission::where('status', 'nonaktif')->count();

        return view('laporan', compact('totalNonaktif'));
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'id_kartu' => 'required|string|size:10',
        ]);

        // Cari zone dulu
        $zone = Zone::where('id_kartu', $request->id_kartu)->first();
        if (!$zone) {
            return response()->json([
                'success' => false,
                'message' => 'ID Kartu tidak valid!'
            ], 404);
        }

        // Cari tamu aktif berdasarkan nomor-zona
        $daerah = $zone->nomor . '-' . $zone->zona;
        $tamu = Submission::where('daerah', $daerah)
                    ->where('status', 'aktif')
                    ->first();

        if (!$tamu) {
            return response()->json([
                'success' => false,
                'message' => 'Tamu tidak ditemukan atau sudah checkout.'
            ], 404);
        }

        // Update status checkout
        $tamu->status = 'nonaktif';
        $tamu->keluar = now()->format('H:i');
        $tamu->save();

        return response()->json([
            'success' => true,
            'message' => 'Tamu berhasil checkout!',
            'tamu' => [
                'name' => $tamu->name,
                'identitas' => $tamu->identitas,
                'daerah' => $tamu->daerah,
            ]
        ]);
    }

    public function confirmCheckout(Request $request)
    {
        $request->validate([
            'id_kartu' => 'required|string|max:255',
        ]);

        $tamu = Submission::where('daerah', $request->daerah)
                ->where('status', 'aktif')
                ->first();

        if(!$tamu){
            return response()->json([
                'success' => false,
                'message' => 'ID Kartu tidak valid atau tamu belum aktif.'
            ]);
        }

        return response()->json([
            'success' => true,
            'tamu' => [
                'id' => $tamu->id,
                'name' => $tamu->name,
                'identitas' => $tamu->identitas,
                'daerah' => $tamu->daerah
            ]
        ]);
    }

    public function checkoutByKartu(Request $request, $id)
    {
        $tamu = Submission::findOrFail($id);

        $tamu->status = 'nonaktif';
        $tamu->keluar = now()->timezone('Asia/Jakarta')->format('H:i');
        $tamu->save();

        return response()->json([
            'success' => true,
            'message' => 'Tamu berhasil checkout!',
            'name' => $tamu->name,
            'identitas' => $tamu->identitas
        ]);
    }


}

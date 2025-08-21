<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;

class SubmissionController extends Controller
{
    public function usermain()
    {
        $tamuAktif    = Submission::where('status', 'aktif')->latest()->get();
        $tamuNonAktif = Submission::where('status', 'nonaktif')->latest()->get();

        return view('submission.usermain', compact('tamuAktif', 'tamuNonAktif'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'keluar' => 'nullable|string|max:5',
            'keperluan' => 'required|string|max:255',
            'identitas' => 'required|string|max:255',
            'daerah' => 'required|string|max:255',
            'nokartu' => 'required|string|max:255',
            'nopol' => 'required|string|max:255',
        ]);

        Submission::create([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'keluar' => 'nullable',
            'keperluan' => $request->keperluan,
            'identitas' => $request->identitas,
            'daerah' => strtoupper($request->daerah ?? ''),
            'nokartu' => $request->nokartu,
            'nopol' => strtoupper($request->nopol ?? ''),
            'status' => 'aktif', // default masuk tabel atas
        ]);

        return redirect('/usermain')->with('success', 'Data berhasil disimpan!');
    }

    public function edit($id)
    {
        $submission = Submission::findOrFail($id);
        return view('submission.edit', compact('submission'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'keluar' => 'nullable|string|max:5',
            'keperluan' => 'required|string|max:255',
            'identitas' => 'required|string|max:255',
            'daerah' => 'required|string|max:255',
            'nokartu' => 'required|string|max:255',
            'nopol' => 'required|string|max:255',
        ]);

        $submission = Submission::findOrFail($id);
        $submission->update($request->all());

        return redirect()->route('datatamu')->with('success', 'Data berhasil diupdate!');
    }
    
    // Tombol "Selesaikan Presensi"
    public function selesai(Request $request, $id) 
    {
        $tamu = Submission::findOrFail($id);
        
        $tamu->status = 'nonaktif';
        $tamu->save();
        return redirect()->back()->with('success', 'Presensi tamu diselesaikan.');
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
}

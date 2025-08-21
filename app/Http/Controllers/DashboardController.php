<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTamu   = Submission::count();                // total data tamu
        $totalHariIni = Submission::whereDate('created_at', now()->toDateString())->count();
        $latestTamu  = Submission::latest()->first();      // data tamu terakhir

        return view('dashboard', compact('totalTamu', 'totalHariIni', 'latestTamu'));
    }

    public function dataTamu()
    {
        $submissions = Submission::latest()->get();
        return view('datatamu', compact('submissions'));
    }
    

    public function destroy($id)
    {
        $submissions = Submission::findOrFail($id); // cari data berdasarkan id
        $submissions->delete();               // hapus data
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}

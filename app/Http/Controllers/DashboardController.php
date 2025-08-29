<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;
use App\Models\Zone;


class DashboardController extends Controller
{
    // public function index(Request $request)
    // {
    //     $status   = $request->get('status');
    //     $search   = $request->get('search');
    //     $perPage  = $request->get('per_page', 10); // default 10

    //     $query = Submission::query();

    //     if($status && $status !== 'nonaktif'){
    //         $query->where('status', $status);
    //     }

    //     if ($search) {
    //         $query->where(function ($q) use ($search) {
    //             if (preg_match('/^\d{10}$/', $search)) {
    //                 // Cari berdasarkan id_kartu di tabel zones
    //                 $q->whereHas('zone', function ($z) use ($search) {
    //                     $z->where('id_kartu', $search);
    //                 });
    //             } else {
    //                 $q->where('name', 'like', "%{$search}%")
    //                 ->orWhere('alamat', 'like', "%{$search}%")
    //                 ->orWhere('keperluan', 'like', "%{$search}%")
    //                 ->orWhere('daerah', 'like', "%{$search}%");
    //             }
    //         });
    //     }

    //     // Pagination
    //     $submissions = ($perPage && $perPage !== 'all')
    //         ? $query->latest()->paginate($perPage)->appends([
    //             'status' => $status,
    //             'search' => $search,
    //             'per_page' => $perPage
    //         ])
    //         : $query->latest()->get();

    //     // Cards
    //     $totalTamu         = Submission::count();
    //     $totalHariIni      = Submission::whereDate('created_at', now()->toDateString())->count();
    //     $latestTamu        = Submission::latest()->first();
    //     $totalTamuAktif    = Submission::where('status', 'aktif')->count();
    //     $totalTamuPending  = Submission::where('status', 'pending')->count();
    //     $totalTamuNonAktif = Submission::where('status', 'nonaktif')->count();

    //     return view('dashboard', compact(
    //         'status','search','perPage','submissions',
    //         'totalTamu','totalHariIni','latestTamu',
    //         'totalTamuAktif','totalTamuPending','totalTamuNonAktif'
    //     ));
    // }

    // public function index(Request $request)
    // {
    //     $status   = $request->get('status');
    //     $search   = $request->get('search');
    //     $perPage  = $request->get('per_page', 10); // default 10

    //     $query = Submission::query();

    //     // Filter status (kecuali nonaktif)
    //     if ($status && in_array($status, ['aktif', 'pending'])) {
    //         $query->where('status', $status);
    //     }



    //     // Filter search
    //     if ($search) {
    //         if (preg_match('/^\d{10}$/', $search)) {
    //             // Kalau inputnya 10 digit → coba cek di tabel zones
    //             $zone = \App\Models\Zone::where('id_kartu', $search)->first();

    //             if ($zone) {
    //                 // Cari berdasarkan kode zona di kolom daerah
    //                 $query->where('daerah', 'like', $zone->kode . '-%');
    //             } else {
    //                 // fallback: cari juga di kolom id_kartu langsung (kalau ada)
    //                 $query->where('id_kartu', $search);
    //             }
    //         } else {
    //             // Pencarian LIKE biasa
    //             $query->where(function ($q) use ($search) {
    //                 $q->where('name', 'like', "%{$search}%")
    //                 ->orWhere('alamat', 'like', "%{$search}%")
    //                 ->orWhere('keperluan', 'like', "%{$search}%")
    //                 ->orWhere('daerah', 'like', "%{$search}%");
    //             });
    //         }
    //     }

    //     // Pagination
    //     $submissions = ($perPage && $perPage !== 'all')
    //         ? $query->latest()->paginate($perPage)->appends([
    //             'status' => $status,
    //             'search' => $search,
    //             'per_page' => $perPage
    //         ])
    //         : $query->latest()->get();

    //     // Cards
    //     $totalTamu         = Submission::count();
    //     $totalHariIni      = Submission::whereDate('created_at', now()->toDateString())->count();
    //     $latestTamu        = Submission::latest()->first();
    //     $totalTamuAktif    = Submission::where('status', 'aktif')->count();
    //     $totalTamuPending  = Submission::where('status', 'pending')->count();
    //     $totalTamuNonAktif = Submission::where('status', 'nonaktif')->count();

    //     return view('dashboard', compact(
    //         'status','search','perPage','submissions',
    //         'totalTamu','totalHariIni','latestTamu',
    //         'totalTamuAktif','totalTamuPending','totalTamuNonAktif'
    //     ));
    // }




    // public function data(Request $request)
    // {
    //     // Pilih model sumber data
    //     $query = $request->status === 'nonaktif'
    //         ? \App\Models\Laporan::query()
    //         : \App\Models\Submission::query();

    //     // Filter search
    //     if ($request->search) {
    //         $query->where(function ($q) use ($request) {
    //             $q->where('name', 'like', "%{$request->search}%")
    //             ->orWhere('alamat', 'like', "%{$request->search}%")
    //             ->orWhere('keperluan', 'like', "%{$request->search}%");
    //         });
    //     }

    //     // Filter status (selain nonaktif)
    //     if ($request->status && $request->status !== 'nonaktif') {
    //         $query->where('status', $request->status);
    //     }

    //     // Pagination
    //     $perPage = $request->per_page ?? 10;
    //     $data = $perPage === 'all'
    //         ? $query->latest()->get()
    //         : $query->latest()->paginate($perPage)->appends($request->only('status', 'search', 'per_page'));

    //     // Jika auto-refresh (check_new=1)
    //     if ($request->check_new) {
    //         $html = view('partials.submissions-table', [
    //             'submissions' => $data,
    //             'perPage' => $perPage
    //         ])->render();

    //         return response()->json([
    //             'count' => $data->count(),
    //             'html' => $html
    //         ]);
    //     }

    //     return view('partials.submissions-table', [
    //         'submissions' => $data,
    //         'perPage' => $perPage
    //     ]);
    // }

    /**
     * Apply filters for submissions/laporan.
     */
    private function applyFilters($query, Request $request)
    {
        // Filter status
        if ($request->status && in_array($request->status, ['aktif','pending'])) {
            $query->where('status', $request->status);
        }

        // Filter search
        if ($request->search) {
            $search = $request->search;
            

            if (preg_match('/^\d{10}$/', $search)) {
                \Log::info('Debug SQL: ' . $query->toSql());
                \Log::info('Bindings: ', $query->getBindings());
                // Join ke tabel zones untuk cari id_kartu asli
                $query->whereExists(function($q) use ($search) {
                    $q->select(\DB::raw(1))
                    ->from('zones')
                    ->where('zones.id_kartu', $search)
                    ->whereRaw("submissions.daerah LIKE CONCAT(zones.nomor, '-%')");
                });
            } else {
                // Pencarian LIKE biasa
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                    ->orWhere('alamat', 'like', "%{$search}%")
                    ->orWhere('keperluan', 'like', "%{$search}%")
                    ->orWhere('daerah', 'like', "%{$search}%");
                });
            }
        }

        return $query;
    }


    /**
     * Dashboard utama.
     */
    public function index(Request $request)
    {
        $status  = $request->get('status');
        $search  = $request->get('search');
        $perPage = $request->get('per_page', 10); // default 10

        $query = Submission::query();

        // Filter status (kecuali nonaktif)
        if ($status && in_array($status, ['aktif', 'pending'])) {
            $query->where('status', $status);
        }

        // Filter search
        if ($search) {
            if (preg_match('/^\d{10}$/', $search)) {
                // Search 10 digit id_kartu di tabel zones
                $query->join('zones', function($join) {
                    $join->whereRaw("submissions.daerah LIKE CONCAT(zones.nomor, '-', zones.zona)");
                })
                ->where('zones.id_kartu', $search)
                ->select('submissions.*'); // biar pagination tetap jalan
            } else {
                // Search LIKE biasa di submissions
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                    ->orWhere('alamat', 'like', "%{$search}%")
                    ->orWhere('keperluan', 'like', "%{$search}%")
                    ->orWhere('daerah', 'like', "%{$search}%");
                });
            }
        }

        // Pagination
        $submissions = ($perPage && $perPage !== 'all')
            ? $query->latest()->paginate($perPage)->appends($request->only('status','search','per_page'))
            : $query->latest()->get();

        // Cards
        $totalTamu         = Submission::count();
        $totalHariIni      = Submission::whereDate('created_at', now()->toDateString())->count();
        $latestTamu        = Submission::latest()->first();
        $totalTamuAktif    = Submission::where('status', 'aktif')->count();
        $totalTamuPending  = Submission::where('status', 'pending')->count();
        $totalTamuNonAktif = Submission::where('status', 'nonaktif')->count();

        return view('dashboard', compact(
            'status','search','perPage','submissions',
            'totalTamu','totalHariIni','latestTamu',
            'totalTamuAktif','totalTamuPending','totalTamuNonAktif'
        ));
    }


    /**
     * Data AJAX (refresh/filter).
     */
    public function data(Request $request)
    {
        // Pilih model
        $query = $request->status === 'nonaktif'
            ? Laporan::query()
            : Submission::query();

        $this->applyFilters($query, $request);

        // Pagination
        $perPage = $request->per_page ?? 10;
        $data = $perPage === 'all'
            ? $query->latest()->get()
            : $query->latest()->paginate($perPage)->appends($request->only('status','search','per_page'));

        // Untuk auto-refresh
        if ($request->check_new) {
            $html = view('partials.submissions-table', [
                'submissions' => $data,
                'perPage' => $perPage
            ])->render();

            return response()->json([
                'count' => $data->count(),
                'html' => $html
            ]);
        }

        return view('partials.submissions-table', [
            'submissions' => $data,
            'perPage' => $perPage
        ]);
    }

    // view sidebar app
    public function dataTamu()
    {
        $submissions = Submission::latest()->get();
        return view('datatamu', compact('submissions'));
    }
    public function dataUser()
    {
        return view('dataUser');
    }
    public function laporan()
    {
        return view('laporan');
    }
    public function pengaturan()
    {
        return view('setting');
    }
    

    public function destroy($id)
    {
        $submissions = Submission::findOrFail($id); // cari data berdasarkan id
        $submissions->delete();               // hapus data
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}

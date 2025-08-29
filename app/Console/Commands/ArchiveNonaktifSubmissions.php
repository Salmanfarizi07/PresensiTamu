<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Submission;
use App\Models\Laporan;
use Carbon\Carbon;

// class ArchiveNonaktifSubmissions extends Command
// {
//     protected $signature = 'submissions:archive-nonaktif';
//     protected $description = 'Memindahkan submission nonaktif ke laporan & hapus >1 hari';

//     public function handle()
//     {
//         // Ambil submission nonaktif yang belum di-archive
//         $submissions = Submission::where('status','nonaktif')
//             ->where('is_archived', false)
//             ->get();

//         foreach($submissions as $submission){
//             // Salin ke laporan
//             Laporan::create($submission->only([
//                 'name','alamat','jumlah','keluar','keperluan',
//                 'identitas','daerah','nokartu','nopol','status'
//             ]));

//             // Tandai archived
//             $submission->update([
//                 'is_archived' => true,
//                 'archived_at' => now(),
//             ]);
//         }

//         // Hapus submission nonaktif yang sudah >1 hari di-archive
//         $deleted = Submission::where('status','nonaktif')
//             ->where('is_archived', true)
//             ->whereDate('archived_at', '<', Carbon::now()->subDay()->format('Y-m-d'))
//             ->delete();

//         $this->info("{$submissions->count()} submission dipindahkan ke laporan.");
//         $this->info("{$deleted} submission nonaktif >1 hari dihapus.");
//     }
// }

// class DeleteOldNonaktifSubmissions extends Command
// {
//     protected $signature = 'submissions:delete-old-nonaktif';
//     protected $description = 'Hapus submission nonaktif >1 hari';

//     public function handle()
//     {
//         $deleted = Submission::where('status','nonaktif')
//             ->where('is_archived',true)
//             ->whereDate('archived_at', '<', Carbon::now()->subDay()->format('Y-m-d'))
//             ->delete();

//         $this->info("{$deleted} submission nonaktif >1 hari dihapus.");
//     }
// }

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Submission;
use Carbon\Carbon;

class DeleteOldNonaktifSubmissions extends Command
{
    protected $signature = 'submissions:delete-old-nonaktif';
    protected $description = 'Hapus submission nonaktif >1 hari';

    public function handle()
    {
        $deleted = Submission::where('status','nonaktif')
            ->where('is_archived',true)
            ->whereDate('archived_at','<', Carbon::now()->subDay()->format('Y-m-d'))
            ->delete();

        $this->info("{$deleted} submission nonaktif >1 hari dihapus.");
    }
}

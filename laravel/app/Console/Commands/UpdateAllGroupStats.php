<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\DB;

use App\Models\Candidate;
use App\Models\CandidateGroupStats;

class UpdateAllGroupStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prpnet:UpdateAllGroupStats';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all GroupStats';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $Candidates = DB::table('Candidate')->select(DB::raw('DISTINCT k, b, c'))->get();

        foreach($Candidates as $Candidate) {
            $this->call('prpnet:UpdateCandidateGroupStats', [
                '-k' => $Candidate->k,
                '-b' => $Candidate->b,
                '-c' => $Candidate->c
            ]);
        }
    }
}

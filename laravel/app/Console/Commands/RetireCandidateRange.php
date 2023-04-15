<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Candidate;
use App\Models\CandidateGroupStats;

class RetireCandidateRange extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prpnet:RetireCandidateRange {--k|kk=} {--b|bb=} {--c|cc=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retire Candidate Range';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->call('prpnet:UpdateCandidateGroupStats', [
            '-k' => $this->option('kk'),
            '-b' => $this->option('bb'),
            '-c' => $this->option('cc'),
        ]);
    }
}

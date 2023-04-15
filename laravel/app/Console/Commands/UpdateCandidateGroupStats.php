<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Candidate;
use App\Models\CandidateGroupStats;

class UpdateCandidateGroupStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prpnet:UpdateCandidateGroupStats {--k|kk=} {--b|bb=} {--c|cc=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update CandidateGroupStats';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $thisK = $this->option('kk');
        $thisB = $this->option('bb');
        $thisC = $this->option('cc');

        $candidates = Candidate::where('k', $thisK)->where('b', $thisB)->where('c', $thisC);

        $CountInGroup = (clone $candidates)->count();
        $CountUntested = (clone $candidates)->where('CompletedTests', '=', 0)->count();
        $CountTested = (clone $candidates)->where('CompletedTests', '>', 0)->count();
        $CountDoubleChecked = (clone $candidates)->where('DoubleChecked', '=', 1)->count();
        $CountInProgress = (clone $candidates)->where('HasPendingTest', '>', 0)->count();
        $MinInGroup = (clone $candidates)->min('n');
        $MaxInGroup = (clone $candidates)->max('n');
        $PRPandPrimesFound = (clone $candidates)->where('MainTestResult', '>', 0)->count();

        if (config('prpnet.usesDoubleCheck')) {
            $NextToTest = (clone $candidates)->where('DoubleChecked', '=', 0)->min('n') ?? 0;
        } else {
            $NextToTest = (clone $candidates)->where('CompletedTests', '=', 0)->min('n') ?? 0;
        }

        $LeadingEdge = (clone $candidates)->where(function ($query) {
            $query->where('CompletedTests', '>', 0)->orWhere('HasPendingTest', '=', 0);
        })->max('n') ?? 0;

        if ($LeadingEdge < $NextToTest) {
            $LeadingEdge = $NextToTest;
        }

        if ($NextToTest == 0) {
            $CompletedThru = (clone $candidates)->max('n');
        } else {
            $CompletedThru = (clone $candidates)->where('n', '<', $NextToTest)->max('n') ?? $NextToTest;
        }

        // Perform update
        $candidateGS = CandidateGroupStats::where('k', $thisK)->where('b', $thisB)->where('c', $thisC)->first();

        if (is_null($candidateGS)) {
            $candidateGS = new CandidateGroupStats();
            $candidateGS->k = $thisK;
            $candidateGS->b = $thisB;
            $candidateGS->c = $thisC;
        }

        $candidateGS->CountInGroup = $CountInGroup;
        $candidateGS->CountUntested = $CountUntested;
        $candidateGS->CountTested = $CountTested;
        $candidateGS->CountDoubleChecked = $CountDoubleChecked;
        $candidateGS->CountInProgress = $CountInProgress;
        $candidateGS->MinInGroup = $MinInGroup;
        $candidateGS->MaxInGroup = $MaxInGroup;
        $candidateGS->PRPandPrimesFound = $PRPandPrimesFound;
        $candidateGS->LeadingEdge = $LeadingEdge;
        $candidateGS->CompletedThru = $CompletedThru;

        $candidateGS->save();
    }
}

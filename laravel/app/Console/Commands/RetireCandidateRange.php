<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

use App\Models\Candidate;
use App\Models\CandidateTest;
use App\Models\CandidateTestResult;
use App\Models\CandidateGroupStats;

class RetireCandidateRange extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prpnet:RetireCandidateRange {--k|kk=0} {--b|bb=0} {--c|cc=0}';

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
        $k = $this->option('kk');
        $b = $this->option('bb');
        $c = $this->option('cc');

        $this->exportRange($k, $b, $c);
        // $this->deleteRangeFromCandidateTestResults($k, $b, $c);
        // $this->deleteRangeFromCandidateTests($k, $b, $c);
        // $this->deleteRangeFromCandidates($k, $b, $c);
        // $this->updateGroupStats();
    }

    private function exportRange($k = 0, $b = 0, $c = 0) {
        $candidates = Candidate::where('k', $k)->where('b', $b)->where('c', $c)->get();

        $csvHeaders = [
            'CandidateName',
            'DecimalLength',
            'k',
            'b',
            'n',
            'c',
            'CompletedTests',
            'HasPendingTest',
            'DoubleChecked',
            'MainTestResult',
            'Date',
            'UserID',
            'MachineID',
            'InstanceID',
            'TeamID',
            'SecondsForTest',
            'TestedNumber',
            'PRPingProgram',
            'PRPingProgramVersion',
            'ProvingProgram',
            'ProvingProgramVersion',
            'Residue'
        ];

        $lines = [];

        foreach($candidates as $candidate) {
            $line = [
                $candidate->CandidateName,
                $candidate->DecimalLength,
                $candidate->k,
                $candidate->b,
                $candidate->n,
                $candidate->c,
                $candidate->CompletedTests,
                $candidate->HasPendingTest,
                $candidate->DoubleChecked,
                $candidate->MainTestResult,
                $candidate->LastUpdateTime
            ];

            if (!is_null($candidate->CandidateTest)) {
                $line[] = $candidate->CandidateTest->UserID;
                $line[] = $candidate->CandidateTest->MachineID;
                $line[] = $candidate->CandidateTest->InstanceID;
                $line[] = $candidate->CandidateTest->TeamID;

                if (!is_null($candidate->CandidateTest->CandidateTestResult)) {
                    $line[] = $candidate->CandidateTest->CandidateTestResult->SecondsForTest;
                    $line[] = $candidate->CandidateTest->CandidateTestResult->TestedNumber;
                    $line[] = $candidate->CandidateTest->CandidateTestResult->PRPingProgram;
                    $line[] = $candidate->CandidateTest->CandidateTestResult->PRPingProgramVersion;
                    $line[] = $candidate->CandidateTest->CandidateTestResult->ProvingProgram;
                    $line[] = $candidate->CandidateTest->CandidateTestResult->ProvingProgramVersion;
                    $line[] = $candidate->CandidateTest->CandidateTestResult->Residue;
                } else {
                    $line = array_merge($line, array_fill(14, 7, ''));
                }
            } else {
                $line = array_merge($line, array_fill(10, 11, ''));
            }

            $lines[] = $line;
        }

        $filecontents = '';
        $filecontents .= join(',', $csvHeaders)."\n";

        foreach($lines as $line) {
            $filecontents .= join(',', $line)."\n";
        }

        Storage::put("exports/export-k$k-b$b-c$c.csv", $filecontents);
    }

    private function deleteRangeFromCandidateTestResults($k = 0, $b = 0, $c = 0) {

    }

    private function deleteRangeFromCandidateTests($k = 0, $b = 0, $c = 0) {

    }

    private function deleteRangeFromCandidates($k = 0, $b = 0, $c = 0) {

    }

    private function updateGroupStats() {
        $this->call('prpnet:UpdateAllGroupStats');
    }
}

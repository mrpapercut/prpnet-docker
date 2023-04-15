<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\AppConstants;

use App\Models\Candidate;
use App\Models\CandidateTest;
use App\Models\CandidateTestResult;
use App\Models\CandidateGroupStats;
use App\Models\UserStats;
use App\Models\UserPrimes;
use App\Models\TeamStats;

class PRPNetController extends Controller
{
    public function index() {
        $candidates = Candidate::where('MainTestResult', '2')->orderByDesc('n')->get();

        return view('index', ['candidates' => $candidates]);
    }

    private function computeHoursRemaining() {
        $countTested = CandidateGroupStats::sum('CountTested');
        $countUntested = CandidateGroupStats::sum('CountUntested');
        $startTime = CandidateTest::min('TestID');

        $now = time();
        $percent = $countTested / ($countTested + $countUntested);
        if ($percent == 0) $percent = 1;

        $endTime = ($now - $startTime) / $percent;
        $hoursLeft = ($endTime - $now + $startTime) / 3600;

        return $hoursLeft;
    }

    public function serverStats() {
        $serverStats = CandidateGroupStats::orderBy('k')->orderBy('b')->orderBy('c')->get();

        $totals = [
            'groups' => 0,
            'totalCandidates' => 0,
            'minN' => 0,
            'maxN' => 0,
            'countTested' => 0,
            'countUntested' => 0,
            'inProgress' => 0,
            'completedThru' => 0,
            'leadingEdge' => 0,
            'prpsPrimes' => 0
        ];

        foreach ($serverStats as $idx => $groupStats) {
            // Add groupForm to groupStats
            switch ((int) config('prpnet.serverType')) {
                case 32:
                    $groupform = '('.$groupStats->b.'^n'.($groupStats->c < 0 ? $groupStats->c : '+'.$groupStats->c).')^2-2';
                    break;

                default:
                    $groupform = $groupStats->k.'*'.$groupStats->b.'^n'.($groupStats->c < 0 ? $groupStats->c : '+'.$groupStats->c);
                    break;
            }
            $serverStats[$idx]->groupform = $groupform;

            // Compute totals
            $totals['groups']++;
            $totals['totalCandidates'] += $groupStats->CountInGroup;
            $totals['minN'] = $totals['minN'] === 0 ? $groupStats->MinInGroup : min([$totals['minN'], $groupStats->MinInGroup]);
            $totals['maxN'] = max([$totals['maxN'], $groupStats->MaxInGroup]);
            $totals['countTested'] += $groupStats->CountTested;
            $totals['countUntested'] += $groupStats->CountUntested;
            $totals['inProgress'] += $groupStats->CountInProgress;
            $totals['completedThru'] = max([$totals['completedThru'], $groupStats->CompletedThru]);
            $totals['leadingEdge'] = max([$totals['leadingEdge'], $groupStats->LeadingEdge]);
            $totals['prpsPrimes'] += $groupStats->PRPandPrimesFound;
        }

        $hoursLeft = $this->computeHoursRemaining();

        return view('serverStats', ['serverStats' => $serverStats, 'hoursLeft' => $hoursLeft, 'totals' => $totals]);
    }

    private function getPendingTests() {
        $pendingTests = DB::table('Candidate')
            ->select('Candidate.CandidateName', 'Candidate.DecimalLength',
            'CandidateTest.TestID', 'CandidateTest.UserID',
            'CandidateTest.MachineID', 'CandidateTest.InstanceID',
            'CandidateTest.TeamID')
            ->join('CandidateTest', 'Candidate.CandidateName', '=', 'CandidateTest.CandidateName')
            ->where('CandidateTest.IsCompleted', 0)
            ->orderBy('CandidateTest.TestID')
            ->orderBy('CandidateTest.CandidateName')
            ->get();

        $currentTime = time();
        foreach($pendingTests as $pendingTest) {
            // Age
            $seconds = $currentTime - $pendingTest->TestID;
            $hours = str_pad(floor($seconds / 3600), 2, '0', STR_PAD_LEFT);
            $minutes = str_pad(floor(($seconds - $hours * 3600) / 60), 2, '0', STR_PAD_LEFT);
            $pendingTest->Age = "$hours:$minutes";

            // Expiration
            $expireSeconds = 0;
            foreach (AppConstants::SERVER_DELAY as $decimalLimit => $delay) {
                if ($pendingTest->DecimalLength < $decimalLimit) {
                    $expireSeconds = $pendingTest->TestID + $delay - $currentTime;
                    break;
                }
            }
            if ($expireSeconds < 0) $expireSeconds = 0;
            $expireHours = str_pad(floor($expireSeconds / 3600), 2, '0', STR_PAD_LEFT);
            $expireMinutes = str_pad(floor(($expireSeconds - $expireHours * 3600) / 60), 2, '0', STR_PAD_LEFT);
            $pendingTest->Expiration = "$expireHours:$expireMinutes";
        }

        return $pendingTests;
    }

    public function pendingTests() {
        $pendingTests = $this->getPendingTests();

        return view('pendingTests', ['pendingTests' => $pendingTests]);
    }

    private function getUserStats() {
        $userStats = UserStats::orderByDesc('TotalScore')->get();

        return $userStats;
    }

    public function userStats() {
        $userStats = $this->getUserStats();

        return view('userStats', ['userStats' => $userStats]);
    }

    private function getUserPrimes() {
        $userPrimes = UserPrimes::join('Candidate', 'UserPrimes.CandidateName', '=', 'Candidate.CandidateName')
            ->orderBy('UserID')->orderBy('k')->orderBy('c')->orderBy('n')->get();

        return $userPrimes;
    }

    public function userPrimes() {
        $userPrimes = $this->getUserPrimes();

        return view('userPrimes', ['userPrimes' => $userPrimes]);
    }

    private function getTeamStats() {
        $teamStats = TeamStats::orderByDesc('TotalScore')->get();

        return $teamStats;
    }

    public function teamStats() {
        $teamStats = $this->getTeamStats();

        return view('teamStats', ['teamStats' => $teamStats]);
    }

    private function getTeamPrimes() {
        $teamPrimes = UserPrimes::join('Candidate', 'UserPrimes.CandidateName', '=', 'Candidate.CandidateName')
            ->orderBy('UserID')->orderBy('k')->orderBy('c')->orderBy('n')->get();

        return $teamPrimes;
    }

    public function teamPrimes() {
        $teamPrimes = $this->getTeamPrimes();

        return view('teamPrimes', ['teamPrimes' => $teamPrimes]);
    }

    private function getRecentResults() {
        $recentResults = CandidateTestResult::join('CandidateTest', 'CandidateTestResult.CandidateName', '=', 'CandidateTest.CandidateName')
            ->orderByDesc('CandidateTestResult.TestID')->limit(20)->get();

        foreach($recentResults as $recentResult) {
            switch ($recentResult->TestResult) {
                case AppConstants::RESULT_COMPOSITE:
                    $recentResult->TestResult = 'Composite';
                    break;

                case AppConstants::RESULT_PRP:
                    $recentResult->TestResult = 'PRP';
                    break;

                case AppConstants::RESULT_PRIME:
                    $recentResult->TestResult = 'Prime';
                    break;
            }
        }

        return $recentResults;
    }

    public function recentResults() {
        $recentResults = $this->getRecentResults();

        return view('recentResults', ['recentResults' => $recentResults]);
    }

    public function statistics() {
        return view('statistics', [
            'userStats' => $this->getUserStats(),
            'userPrimes' => $this->getUserPrimes(),
            'teamStats' => $this->getTeamStats(),
            'teamPrimes' => $this->getTeamPrimes()
        ]);
    }
}

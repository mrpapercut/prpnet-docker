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

class AdminController extends Controller
{
    public function groupDetails(string $form) {
        list($k, $b, $c) = $this->getKBCFromString(urldecode($form));

        $candidates = Candidate::where('k', $k)->where('b', $b)->where('c', $c)->first();
        $candidateGroupStats = CandidateGroupStats::where('k', $k)->where('b', $b)->where('c', $c)->first();

        // $candidateTestResults = CandidateTestResult::where('CandidateName', '1*10^100025-23')->first();

        // Log::debug($candidates->CandidateTest->CandidateTestResult);
        // Log::debug($candidateTestResults->CandidateTest->Candidate);

        return view('admin.groupDetails', [
            'groupStats' => $candidateGroupStats
        ]);
    }

    public function exportGroup(Request $request) {
        list($k, $b, $c) = $this->getKBCFromString($request['form']);

        if (!$k || !$b || !$c) return redirect('/');

        $candidateGroupStats = CandidateGroupStats::where('k', $k)->where('b', $b)->where('c', $c)->first();
        $candidates = Candidate::where('k', $k)->where('b', $b)->where('c', $c)->orderBy('n')->get();
        $candidateTestResults = Candidate::where('k', $k)->where('b', $b)->where('c', $c)->orderBy('n')->get();

        return view('admin.groupDetails', [
            'groupStats' => $candidateGroupStats
        ]);
    }

    private function getKBCFromString(string $form) {
        preg_match('/(\d+)\*(\d+)\^n([\+\-]\d+)/', $form, $matches);

        list($all, $k, $b, $c) = $matches;

        return [$k, $b, $c];
    }
}

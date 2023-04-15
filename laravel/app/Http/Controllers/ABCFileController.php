<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\AppConstants;

use App\Models\Candidate;
use App\Models\CandidateGroupStats;

class ABCFileController extends Controller
{
    public function ReadFile(string $filename) {

    }

    public function DetermineABCFormat(string $abcHeader) {

    }
}

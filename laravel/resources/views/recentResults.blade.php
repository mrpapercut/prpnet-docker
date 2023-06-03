@extends('layout.app')

@section('content')
<h2>Recent results</h2>
@if(count($recentResults) == 0)
<p id="recent-results-notice" class="warning">No recent results</p>
@else
<div class="statsTable grid5" id="recentResults">
@foreach(['Candidate', 'Result', 'Date', 'Total Time', 'Decminal Length'] as $header)
<div class="tableHeader">{{ $header }}</div>
@endforeach
@foreach($recentResults as $recentResult)
<div>{{ $recentResult->CandidateName }}</div>
<div>{{ $recentResult->TestResult }}</div>
<div>{{ date('H:i:s', $recentResult->TestID + 7200 + round($recentResult->SecondsForTest)) }}</div>
<div>{{ DateTime::createFromFormat('U.u', $recentResult->SecondsForTest)->format('H:i:s') }}</div>
<div>{{ $recentResult->DecimalLength }}</div>
@endforeach
@endif
@endsection

@extends('layout.app')

@section('content')
<h2>Recent results</h2>
@if(count($recentResults) == 0)
<p id="recent-results-notice" class="warning">No recent results</p>
@else
<table class="statsTable" id="recentResults">
<thead>
<tr>
    <th>Candidate</th>
    <th>Result</th>
    {{--
    <th>User</th>
    <th>Machine</th>
    <th>Instance</th>
    <th>Team</th>
    --}}
    <th>Date Assigned</th>
    <th>Total Time</th>
</tr>
</thead>
<tbody>
@foreach($recentResults as $recentResult)
<tr>
    <td>{{ $recentResult->CandidateName }}</td>
    <td>{{ $recentResult->TestResult }}</td>
    {{--
    <td>{{ $recentResult->UserID }}</td>
    <td>{{ $recentResult->MachineID }}</td>
    <td>{{ $recentResult->InstanceID }}</td>
    <td>{{ $recentResult->TeamID }}</td>
    --}}
    <td>{{ date('Y-m-d H:i:s', $recentResult->TestID) }}</td>
    <td>{{ substr(DateTime::createFromFormat('U.u', $recentResult->SecondsForTest)->format('i:s.u'), 0, -3) }}</td>
</tr>
@endforeach
@endif
@endsection

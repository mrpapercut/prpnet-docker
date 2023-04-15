@extends('layout.app')

@section('content')
<h2>Pending tests</h2>
@if(count($pendingTests) == 0)
<p id="pending-tests-notice" class="warning">No pending tests</p>
@elseif(1 == 1)
<div class="statsTable" id="pendingTests">
@foreach(['Candidate', 'Machine', 'Date', 'Age'] as $header)
<div class="tableHeader">{{ $header }}</div>
@endforeach
@foreach($pendingTests as $pendingTest)
<div>{{ $pendingTest->CandidateName }}</div>
<div>{{ $pendingTest->MachineID }} - {{ $pendingTest->InstanceID }}</div>
<div>{{ date('H:i:s', $pendingTest->TestID) }}</div>
<div>{{ $pendingTest->Age }}</div>
@endforeach
</div>
@else
<table class="statsTable" id="serverStats">
<thead>
<tr>
    <th>Candidate</th>
    <th>Machine</th>
    <th>Instance</th>
    {{--
    <th>User</th>
    <th>Team</th>
    <th>Expires (hh:mm)</th>
    --}}
    <th>Date Assigned</th>
    <th>Age (hh:mm)</th>
</tr>
</thead>
<tbody>
@foreach($pendingTests as $pendingTest)
<tr>
    <td>{{ $pendingTest->CandidateName }}</td>
    <td>{{ $pendingTest->MachineID }}</td>
    <td>{{ $pendingTest->InstanceID }}</td>
    {{--
    <td>{{ $pendingTest->UserID }}</td>
    <td>{{ $pendingTest->TeamID }}</td>
    <td>{{ $pendingTest->Expiration }}</td>
    --}}
    <td>{{ date('H:i:s', $pendingTest->TestID) }}</td>
    <td>{{ $pendingTest->Age }}</td>
</tr>
@endforeach
@endif
@endsection

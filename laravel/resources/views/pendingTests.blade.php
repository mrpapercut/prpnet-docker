@extends('layout.app')

@section('content')
<h2>Pending tests</h2>
@if(count($pendingTests) == 0)
<p id="pending-tests-notice" class="warning">No pending tests</p>
@else
<div class="statsTable grid5" id="pendingTests">
@foreach(['Candidate', 'Machine', 'Date', 'Age', 'Decimal Length'] as $header)
<div class="tableHeader">{{ $header }}</div>
@endforeach
@foreach($pendingTests as $pendingTest)
<div>{{ $pendingTest->CandidateName }}</div>
<div>{{ $pendingTest->MachineID }} - {{ $pendingTest->InstanceID }}</div>
<div>{{ date('H:i:s', ((int) $pendingTest->TestID + 7200)) }}</div>
<div>{{ $pendingTest->Age }}</div>
<div>{{ $pendingTest->DecimalLength }}</div>
@endforeach
</div>
@endif
@endsection

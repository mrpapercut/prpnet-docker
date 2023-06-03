@if(count($teamPrimes) == 0)
<p id="team-primes-notice" class="warning">No team primes</p>
@else
<div class="statsTable grid5" id="teamPrimes">
<div class="gridwide">Primes and PRPs for Team {{ $teamPrimes[0]->TeamID }}</div>
@foreach(['Candidate', 'Prime/PRP', /*'User',*/ 'Machine', 'Date Reported', 'Decimal Length'] as $header)
<div class="tableHeader">{{ $header }}</div>
@endforeach

@foreach($teamPrimes as $teamPrime)
    <div>{{ $teamPrime->CandidateName }}</div>
    <div>{{ $teamPrime->TestResult == AppConstants::RESULT_PRIME ? 'Prime' : 'PRP' }}</div>
    <!-- <div>{{ $teamPrime->UserID }}</div> -->
    <div>{{ $teamPrime->MachineID }} - {{ $teamPrime->InstanceID }}</div>
    <div>{{ date('Y-m-d H:i:s', $teamPrime->DateReported) }}</div>
    <div>{{ $teamPrime->DecimalLength }}</div>
@endforeach
</div>
@endif

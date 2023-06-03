@if(count($userPrimes) == 0)
<p id="user-primes-notice" class="warning">No user primes</p>
@else
<div class="statsTable grid5" id="userPrimes">
<div class="gridwide">Primes and PRPs for User {{ $userPrimes[0]->UserID }}</div>
@foreach(['Candidate', 'Prime/PRP', 'Machine', 'Date Reported', 'Decimal Length'] as $header)
<div class="tableHeader">{{ $header }}</div>
@endforeach

@foreach($userPrimes as $userPrime)
    <div>{{ $userPrime->CandidateName }}</div>
    <div>{{ $userPrime->TestResult == AppConstants::RESULT_PRIME ? 'Prime' : 'PRP' }}</div>
    <div>{{ $userPrime->MachineID }} - {{ $userPrime->InstanceID }}</div>
    <div>{{ date('Y-m-d H:i:s', $userPrime->DateReported) }}</div>
    <div>{{ $userPrime->DecimalLength }}</div>
@endforeach
</div>
@endif

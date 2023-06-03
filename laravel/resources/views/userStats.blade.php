@if(count($userStats) == 0)
<p id="user-stats-notice" class="warning">No user stats</p>
@else
@php $showGFNDivisors = array_sum(array_map(function($userStat) { return $userStat['GFNDivisorsFound']; }, $userStats->toArray())) > 0; @endphp
<div class="statsTable {{ $showGFNDivisors ? 'grid6' : 'grid5' }}" id="userStats">
<div class="tableHeader">User</div>
<div class="tableHeader">Total Score</div>
<div class="tableHeader">Tests Performed</div>
<div class="tableHeader">PRPs Found</div>
<div class="tableHeader">Primes Found</div>
@if($showGFNDivisors) <div class="tableHeader">GFN Divisors Found</div> @endif

@foreach($userStats as $userStat)
    <div>{{ $userStat->UserID }}</div>
    <div>{{ round($userStat->TotalScore) }}</div>
    <div>{{ $userStat->TestsPerformed }}</div>
    <div>{{ $userStat->PRPsFound }}</div>
    <div>{{ $userStat->PrimesFound }}</div>
    @if($showGFNDivisors) <div>{{ $userStat->GFNDivisorsFound }}</div> @endif
@endforeach
</div>
@endif

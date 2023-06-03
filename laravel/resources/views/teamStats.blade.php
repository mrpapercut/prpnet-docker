@if(count($teamStats) == 0)
<p id="team-stats-notice" class="warning">No team stats</p>
@else
@php $showGFNDivisors = array_sum(array_map(function($teamStat) { return $teamStat['GFNDivisorsFound']; }, $teamStats->toArray())) > 0; @endphp
<div class="statsTable {{ $showGFNDivisors ? 'grid6' : 'grid5' }}" id="teamStats">
<div class="tableHeader">Team</div>
<div class="tableHeader">Total Score</div>
<div class="tableHeader">Tests Performed</div>
<div class="tableHeader">PRPs Found</div>
<div class="tableHeader">Primes Found</div>
@if($showGFNDivisors) <div class="tableHeader">GFN Divisors Found</div> @endif

@foreach($teamStats as $teamStat)
    <div>{{ $teamStat->TeamID }}</div>
    <div>{{ round($teamStat->TotalScore) }}</div>
    <div>{{ $teamStat->TestsPerformed }}</div>
    <div>{{ $teamStat->PRPsFound }}</div>
    <div>{{ $teamStat->PrimesFound }}</div>
    @if($showGFNDivisors) <div>{{ $teamStat->GFNDivisorsFound }}</div> @endif
@endforeach
</div>
@endif

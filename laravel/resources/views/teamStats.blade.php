@if(count($teamStats) == 0)
<p id="team-stats-notice" class="warning">No team stats</p>
@else
<table class="statsTable" id="teamStats">
<thead>
<tr>
    <th>Team</th>
    <th>Total Score</th>
    <th>Tests Performed</th>
    <th>PRPs Found</th>
    <th>Primes Found</th>
    <th>GFN Divisors Found</th>
</tr>
</thead>
<tbody>
@foreach($teamStats as $teamStat)
<tr>
    <td>{{ $teamStat->TeamID }}</td>
    <td>{{ $teamStat->TotalScore }}</td>
    <td>{{ $teamStat->TestsPerformed }}</td>
    <td>{{ $teamStat->PRPsFound }}</td>
    <td>{{ $teamStat->PrimesFound }}</td>
    <td>{{ $teamStat->GFNDivisorsFound }}</td>
</tr>
@endforeach
</tbody>
</table>
@endif

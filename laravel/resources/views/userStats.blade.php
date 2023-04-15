@if(count($userStats) == 0)
<p id="user-stats-notice" class="warning">No user stats</p>
@else
<table class="statsTable" id="userStats">
<thead>
<tr>
    <th>User</th>
    <th>Total Score</th>
    <th>Tests Performed</th>
    <th>PRPs Found</th>
    <th>Primes Found</th>
    <th>GFN Divisors Found</th>
</tr>
</thead>
<tbody>
@foreach($userStats as $userStat)
<tr>
    <td>{{ $userStat->UserID }}</td>
    <td>{{ $userStat->TotalScore }}</td>
    <td>{{ $userStat->TestsPerformed }}</td>
    <td>{{ $userStat->PRPsFound }}</td>
    <td>{{ $userStat->PrimesFound }}</td>
    <td>{{ $userStat->GFNDivisorsFound }}</td>
</tr>
@endforeach
</tbody>
</table>
@endif

@if(count($teamPrimes) == 0)
<p id="team-primes-notice" class="warning">No team primes</p>
@else
<table class="statsTable" id="teamPrimes">
<thead>
<tr><th colspan="7">Primes and PRPs for Team {{ $teamPrimes[0]->TeamID }}</th></tr>
<tr>
    <th>Candidate</th>
    <th>Prime/PRP</th>
    <th>User</th>
    <th>Machine</th>
    <th>Instance</th>
    <th>Date Reported</th>
    <th>Decimal Length</th>
</tr>
</thead>
<tbody>
@foreach($teamPrimes as $teamPrime)
<tr>
    <td>{{ $teamPrime->CandidateName }}</td>
    <td>{{ $teamPrime->TestResult == AppConstants::RESULT_PRIME ? 'Prime' : 'PRP' }}</td>
    <td>{{ $teamPrime->UserID }}</td>
    <td>{{ $teamPrime->MachineID }}</td>
    <td>{{ $teamPrime->InstanceID }}</td>
    <td>{{ date('Y-m-d H:i:s', $teamPrime->DateReported) }}</td>
    <td>{{ $teamPrime->DecimalLength }}</td>
</tr>
@endforeach
</tbody>
</table>
@endif

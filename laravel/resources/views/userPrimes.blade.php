@if(count($userPrimes) == 0)
<p id="user-primes-notice" class="warning">No user primes</p>
@else
<table class="statsTable" id="userPrimes">
<thead>
<tr><th colspan="7">Primes and PRPs for User {{ $userPrimes[0]->UserID }}</th></tr>
<tr>
    <th>Candidate</th>
    <th>Prime/PRP</th>
    {{--
    <th>Machine</th>
    <th>Instance</th>
    <th>Team</th>
    --}}
    <th>Date Reported</th>
    <th>Decimal Length</th>
</tr>
</thead>
<tbody>
@foreach($userPrimes as $userPrime)
<tr>
    <td>{{ $userPrime->CandidateName }}</td>
    <td>{{ $userPrime->TestResult == AppConstants::RESULT_PRIME ? 'Prime' : 'PRP' }}</td>
    {{--
    <td>{{ $userPrime->MachineID }}</td>
    <td>{{ $userPrime->InstanceID }}</td>
    <td>{{ $userPrime->TeamID }}</td>
    --}}
    <td>{{ date('Y-m-d H:i:s', $userPrime->DateReported) }}</td>
    <td>{{ $userPrime->DecimalLength }}</td>
</tr>
@endforeach
</tbody>
</table>
@endif

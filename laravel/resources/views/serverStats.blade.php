@extends('layout.app')

@section('content')
<p id="work-remaining-notice" {{ $hoursLeft < 240 ? 'class=warning' : '' }}>
@if(is_null($hoursLeft))
No tests have run yet.
@elseif($hoursLeft <= 0)
The server has no work left.
@elseif($hoursLeft < 72)
Estimate of {{ floor($hoursLeft) }} hours before the server runs out of work.
@else
Estimate of {{ floor($hoursLeft / 24) }} days before the server runs out of work.
@endif
</p>

<table class="statsTable" id="serverStats">
<thead>
<tr>
    <th>Form</th>
    <th>Total Candidates</th>
    <th>Min N</th>
    <th>Max N</th>
    <th>Count Tested</th>
    <th>Count Untested</th>
    <th>In Progress</th>
    <th>Completed Thru</th>
    <th>Leading Edge</th>
    <th>Progress</th>
    <th>PRPs/Primes</th>
</tr>
</thead>
<tbody>
@foreach($serverStats as $groupStats)
<tr>
    <td><a href="/admin/group/{{ urlencode($groupStats->groupform) }}">{{ $groupStats->groupform }}</a></td>
    <td>{{ $groupStats->CountInGroup }}</td>
    <td>{{ $groupStats->MinInGroup }}</td>
    <td>{{ $groupStats->MaxInGroup }}</td>
    <td>{{ $groupStats->CountTested }}</td>
    <td>{{ $groupStats->CountUntested }}</td>
    <td>{{ $groupStats->CountInProgress }}</td>
    <td>{{ $groupStats->CompletedThru }}</td>
    <td>{{ $groupStats->LeadingEdge }}</td>
    <td>{{ round(($groupStats->CountTested / $groupStats->CountInGroup) * 100) }}%</td>
    <td>{{ $groupStats->PRPandPrimesFound }}</td>
</tr>
@endforeach
</tbody>
<tfoot>
<tr>
    <th>Groups: {{ $totals['groups'] }}</th>
    <th>{{ $totals['totalCandidates'] }}</th>
    <th>{{ $totals['minN'] }}</th>
    <th>{{ $totals['maxN'] }}</th>
    <th>{{ $totals['countTested'] }}</th>
    <th>{{ $totals['countUntested'] }}</th>
    <th>{{ $totals['inProgress'] }}</th>
    <th>{{ $totals['completedThru'] }}</th>
    <th>{{ $totals['leadingEdge'] }}</th>
    <td>{{ round(($totals['countTested'] / $totals['totalCandidates']) * 100) }}%</td>
    <th>{{ $totals['prpsPrimes'] }}</th>
</tr>
</tfoot>
</table>
@endsection

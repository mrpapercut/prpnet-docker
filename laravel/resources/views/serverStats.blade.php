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

<div class="statsTable grid5" id="serverStats">
@foreach(['Form', /*'Total Candidates', 'Min N', 'Max N',*/ 'Tested / Untested / In Progress', /*'Completed Thru',*/ 'Leading Edge', 'Progress', 'PRPs/Primes'] as $header)
<div class="tableHeader">{{ $header }}</div>
@endforeach
@foreach($serverStats as $groupStats)
<div><a href="/admin/group/{{ urlencode($groupStats->groupform) }}">{{ $groupStats->groupform }}</a></div>
<!-- <div>{{ $groupStats->CountInGroup }}</div>
<div>{{ $groupStats->MinInGroup }}</div>
<div>{{ $groupStats->MaxInGroup }}</div> -->
<div>{{ $groupStats->CountTested }} / {{ $groupStats->CountUntested }} / {{ $groupStats->CountInProgress }}</div>
<!-- <div>{{ $groupStats->CompletedThru }}</div> -->
<div>{{ $groupStats->LeadingEdge }}</div>
<div>{{ round(($groupStats->CountTested / $groupStats->CountInGroup) * 100) }}%</div>
<div>{{ $groupStats->PRPandPrimesFound }}</div>
@endforeach
<div>Groups: {{ $totals['groups'] }}</div>
<!-- <div>{{ $totals['totalCandidates'] }}</div>
<div>{{ $totals['minN'] }}</div>
<div>{{ $totals['maxN'] }}</div> -->
<div>{{ $totals['countTested'] }} / {{ $totals['countUntested'] }} / {{ $totals['inProgress'] }}</div>
<!-- <div>{{ $totals['completedThru'] }}</div> -->
<div>{{ $totals['leadingEdge'] }}</div>
<div>{{ round(($totals['countTested'] / $totals['totalCandidates']) * 100) }}%</div>
<div>{{ $totals['prpsPrimes'] }}</div>
</div>
@endsection

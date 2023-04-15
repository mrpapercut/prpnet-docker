@extends('layout.app')

@section('content')
<table>
<thead>
<tr>
    <th>Candidate</th>
    <th>Result</th>
    <th>Decimal Length</th>
    <th>Date</th>
</tr>
</thead>
<tbody>
@foreach ($candidates as $candidate)
<tr>
    <td>{{ $candidate->CandidateName }}</td>
    <td>{{ $candidate->MainTestResult == '2' ? 'Prime!' : 'Not prime :(' }}</td>
    <td>{{ $candidate->DecimalLength }}</td>
    <td>{{ date('Y-m-d H:i:s', $candidate->LastUpdateTime) }}</td>
</tr>
@endforeach
</tbody>
</table>
@endsection

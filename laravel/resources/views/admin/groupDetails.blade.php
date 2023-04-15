@extends('layout.app')

@section('content')
<h2>Manage group</h2>
<h3>Group info</h3>
<div>
@php $groupForm = $groupStats->k.'*'.$groupStats->b.'^n'.($groupStats->c < 0 ? $groupStats->c : '+'.$groupStats->c); @endphp
Form: {{ $groupForm }}<br>
Total candidates: {{ $groupStats->CountInGroup }}<br>
Completed: {{ floor(($groupStats->CountTested / $groupStats->CountInGroup) * 100) }}%
<form method="post" action="/admin/group/export">
    @csrf
    <input type="hidden" name="form" value="{{ $groupForm }}">
    <button id="export">Export</button>
</form>
<form method="post" action="/admin/group/delete">
    @csrf
    <input type="hidden" name="form" value="{{ $groupForm }}">
    <button id="delete">Delete</button>
</form>
</div>

@endsection

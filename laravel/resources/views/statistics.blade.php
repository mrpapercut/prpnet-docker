@extends('layout.app')

@section('content')
<h2>User stats</h2>
@include('userStats')
<hr>

<h2>User primes</h2>
@include('userPrimes')
<hr>

<h2>Team stats</h2>
@include('teamStats')
<hr>

<h2>Team primes</h2>
@include('teamPrimes')
@endsection

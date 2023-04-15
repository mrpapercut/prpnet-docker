<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/gif" href="data:image/gif;base64,R0lGODlhEAAQAIABAAAAAP///yH5BAEAAAEALAAAAAAQABAAQAIijI9pwBDtoJq0Wuue1rmjuFziSB7S2YRc6G1L5qoqWNZIAQA7">

<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<script src="{{ asset('js/index.js') }}"></script>

<title>PRPNet Dashboard</title>
</head>
<body>
<div id="header-links">
<a href="/">Overview</a>
<!-- a href="server_stats">Server Statistics</a -->
<a href="/pending_tests">In Progress</a>
<a href="/recent_results">Results</a>
<a href="/stats">Statistics</a>
<a href="/admin">Admin</a>
</div>
<div class="content">
@yield('content')
</div>
</body>
</html>

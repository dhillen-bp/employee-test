<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title', 'Employee Web') </title>

<link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">

@vite(['resources/css/app.css', 'resources/js/app.js'])

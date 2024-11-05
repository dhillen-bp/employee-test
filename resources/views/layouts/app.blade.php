<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
</head>

<body>

    @include('layouts.navbar')

    @include('layouts.sidebar')

    <div class="p-4 sm:ml-64">
        <div class="mt-14 dark:bg-gray-700">
            @yield('content')
        </div>
    </div>

    @if (session()->has('success_message'))
        @component('layouts.toastr-success', ['message' => session('success_message')])
        @endcomponent
    @endif

    @if (session()->has('error_message'))
        @component('layouts.toastr-danger', ['message' => session('error_message')])
        @endcomponent
    @endif

    @include('layouts.script')
    @stack('after-script')

</body>

</html>

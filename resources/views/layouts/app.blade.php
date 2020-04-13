<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Desarrollo</title>

    <!-- CSS -->
    @include('layouts.inc.app.css_material_bootstrap')

</head>
<body>
    <div id="app">

        @if (Auth::user() != null)
            <x-nav-bar/>
        @endif

        @include('layouts.inc.mensajes.accion')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
@include('layouts.inc.app.js_material_bootstrap')
</html>

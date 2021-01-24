<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1"
        >
        <title>Invoices</title>
        <link
            rel="stylesheet"
            href="{{ mix('/css/app.css') }}"
        >

        <script src="{{  mix('/js/manifest.js') }}" defer></script>
        <script src="{{  mix('/js/vendor.js') }}" defer></script>
        <script src="{{ mix('/js/app.js') }}" defer></script>
        <meta
            name="csrf-token"
            content="{{ csrf_token() }}"
        >
        @livewireStyles
    </head>

    <body>
        <div
            x-cloak
            x-data="{}"
            class="container flex flex-col mx-auto"
        >
            @include('layouts.nav')

            @include('flash::message')

            @yield('content')
        </div>
        @livewireScripts
    </body>

</html>

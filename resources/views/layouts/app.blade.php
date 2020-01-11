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
        @routes
        <script
            src="{{ mix('/js/app.js') }}"
            defer
        ></script>
        <meta
            name="csrf-token"
            content="{{ csrf_token() }}"
        >
    </head>

    <body>
        <div
            class="container mx-auto flex flex-col"
            id="app"
        >
            @include('flash::message')

            @include('layouts.nav')

            @yield('content')
        </div>
    </body>

</html>
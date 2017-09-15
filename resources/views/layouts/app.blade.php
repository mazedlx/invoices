<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoices</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @include('flash::message')

    <section class="hero is-info">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-vcentered">
                    <div class="column">
                        <p class="title">
                            Invoices
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.nav')
    <section class="section">
        <div class="container">
            @yield('content')
        </div>
    </section>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>

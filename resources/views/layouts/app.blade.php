<!DOCTYPE html>
<html class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <title>Invoices</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >
</head>

<body
    x-data="{
        showSidebar: false,
        showDropdown: false,
    }"
    x-cloak
    class="h-full"
>
    <x-off-canvas-menu />

    <x-sidebar />

    <div class="flex flex-col md:pl-64">
        <x-top-bar />

        <x-main />
    </div>
    </div>

    </div>
    @livewireScripts
</body>

</html>

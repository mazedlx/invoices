@auth
<div
    class="flex items-start justify-around px-4 py-2 mb-4 text-white bg-gray-900 rounded-b-lg"
>
    <x-invoices-dropdown />
    <x-customers-dropdown />
    <x-companies-dropdown />

    <a href=" {{ route('statistics.index') }}">Statistics</a>

    <a
        href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"
    >
        Logout
    </a>
    <form
        id="logout-form"
        action="{{ route('logout') }}"
        method="POST"
        style="display: none;"
    >
        {{ csrf_field() }}
    </form>
</div>
@endauth

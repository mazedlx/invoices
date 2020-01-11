@auth
<div class="flex items-start justify-around px-4 py-2 rounded-b-lg bg-gray-900 text-white mb-4">
    <invoices-drop-down></invoices-drop-down>
    <customers-drop-down></customers-drop-down>
    <companies-drop-down></companies-drop-down>

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
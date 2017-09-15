<nav class="navbar has-shadow" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-tabs">
            <a class="navbar-item is-tab" href="{{ route('invoices.index') }}">Invoices</a>

            @admin
            <a class="navbar-item is-tab" href="{{ route('invoices.create') }}">New</a>
            <a class="navbar-item is-tab" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            @endadmin
            <button class="button navbar-burger">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</nav>


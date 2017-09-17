    <nav class="navbar has-shadow" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar">
            @admin
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Invoices
                </a>
                <div class="navbar-dropdown">
                    <a class="navbar-item" href="{{ route('invoices.create') }}">New Invoice</a>
                    <a class="navbar-item" href="{{ route('invoices.index') }}">All Invoices</a>
                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Customers
                </a>
                <div class="navbar-dropdown">
                    <a class="navbar-item" href="{{ route('customers.create') }}">New Customer</a>
                    <a class="navbar-item" href="{{ route('customers.index') }}">All Customers</a>
                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Companies
                </a>
                <div class="navbar-dropdown">
                    <a class="navbar-item" href="{{ route('companies.create') }}">New Company</a>
                    <a class="navbar-item" href="{{ route('companies.index') }}">All Companies</a>
                </div>
            </div>

            <a class="navbar-item" href="{{ route('statistics.index') }}">Statistics</a>

            <a class="navbar-item"
                href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"
             >
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


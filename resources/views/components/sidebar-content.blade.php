<div class="flex items-center h-16 px-4 bg-gray-900 shrink-0">
    <x-fas-money-bill-alt class="w-auto h-8 text-white" />
    <span class="ml-3 text-xl font-semibold text-white">My Invoices</span>
</div>
<div class="flex flex-col flex-1 overflow-y-auto">
    <nav class="flex-1 px-2 py-4 space-y-1">
        <a
            href="{{ route('invoices.index') }}"
            class="flex items-center px-2 py-2 text-sm font-medium @if (request()->routeIs('invoices.*')) bg-gray-900 text-white @else text-gray-300 @endif hover:bg-gray-700 hover:text-white rounded-md group"
        >
            <x-heroicon-o-document-currency-euro
                class="shrink-0 w-6 h-6 mr-3 @if (request()->routeIs('invoices.*')) text-gray-300 @else text-gray-400 @endif group-hover:text-gray-300"
            />
            Invoices
        </a>

        <a
            href="{{ route('customers.index') }}"
            class="flex items-center px-2 py-2 text-sm font-medium @if (request()->routeIs('customers.*')) bg-gray-900 text-white @else text-gray-300 @endif hover:bg-gray-700 hover:text-white rounded-md group"
        >
            <x-heroicon-o-users
                class="shrink-0 w-6 h-6 mr-3 @if (request()->routeIs('customers.*')) text-gray-300 @else text-gray-400 @endif group-hover:text-gray-300"
            />

            Customers
        </a>

        <a
            href="{{ route('companies.index') }}"
            class="flex items-center px-2 py-2 text-sm font-medium @if (request()->routeIs('companies.*')) bg-gray-900 text-white @else text-gray-300 @endif hover:bg-gray-700 hover:text-white rounded-md group"
        >
            <x-heroicon-o-building-office-2
                class="shrink-0 w-6 h-6 mr-3 @if (request()->routeIs('companies.*')) text-gray-300 @else text-gray-400 @endif group-hover:text-gray-300"
            />

            Companies
        </a>

        <a
            href="{{ route('statistics.index') }}"
            class="flex items-center px-2 py-2 text-sm font-medium @if (request()->routeIs('statistics.*')) bg-gray-900 text-white @else text-gray-300 @endif hover:bg-gray-700 hover:text-white rounded-md group"
        >
            <x-heroicon-o-chart-bar
                class="shrink-0 w-6 h-6 mr-3 @if (request()->routeIs('statistics.*')) text-gray-300 @else text-gray-400 @endif group-hover:text-gray-300"
            />

            Reports
        </a>
    </nav>
</div>

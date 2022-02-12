@extends('layouts.app')

@section('content')
<div class="flex items-start">
    <div class="flex flex-col flex-1 mr-4">
        <h1 class="text-2xl">Yearly Total</h1>
        <div class="w-full border rounded-lg px-4 py-2 border-gray-900 mb-4">
            @foreach ($totals as $year => $total)
            <div class="flex border-b ">
                <div class="w-2/3">
                    {{ $year }}
                </div>
                <div class="w-1/3 text-right">
                    &euro; {{ number_format($total, 2, ',', '.') }}
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="flex flex-col flex-1 mr-4">
        <h1 class="text-2xl">Totals By Customer</h1>
        <div class="w-full border rounded-lg px-4 py-2 border-gray-900 mb-4">
            @foreach ($rankedCustomers as $customer)
            <div class="flex border-b ">
                <div class="w-2/3">
                    {{ $customer->name }}
                </div>
                <div class="w-1/3 text-right">&euro; {{ number_format($customer->total, 2, ',', '.') }}</div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="flex flex-col flex-1 mr-4">
        <h1 class="text-2xl">Totals By Company</h1>
        <div class="w-full border rounded-lg px-4 py-2 border-gray-900 mb-4">
            @foreach ($rankedCompanies as $customer)
            <div class="flex border-b ">
                <div class="w-2/3">
                    {{ $customer->name }}
                </div>
                <div class="w-1/3 text-right">&euro; {{ number_format($customer->total, 2, ',', '.') }}</div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('heading')
<x-heading>
    <x-slot:title>Statistics</x-slot>

    <x-slot:action></x-slot>
</x-heading>
@endsection

@section('content')
<div class="grid grid-cols-3 grid-rows-1 gap-6">
    <div class="">
        <h3 class="text-lg">Yearly Total</h3>
        <div class="">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b border-gray-200 shadow-sm sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody>
                            @foreach ($totals as $year => $total)
                                @if ($loop->index % 2 === 0)
                                <tr class="bg-white">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $year }}</td>
                                    <td class="px-6 py-4 text-sm text-right text-gray-500 whitespace-nowrap">&euro; {{ number_format($total, 2, ',', '.') }}</td>
                                </tr>
                                @else
                                <tr class="bg-gray-50">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $year }}</td>
                                    <td class="px-6 py-4 text-sm text-right text-gray-500 whitespace-nowrap">&euro; {{ number_format($total, 2, ',', '.') }}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="">
        <h3 class="text-lg">Totals by Customer</h3>
        <div class="">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b border-gray-200 shadow-sm sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody>
                            @foreach ($rankedCustomers as $customer)
                                @if ($loop->index % 2 === 0)
                                <tr class="bg-white">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $customer->name }}</td>
                                    <td class="px-6 py-4 text-sm text-right text-gray-500 whitespace-nowrap">&euro; {{ number_format($customer->total, 2, ',', '.') }}</td>
                                </tr>
                                @else
                                <tr class="bg-gray-50">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $customer->name }}</td>
                                    <td class="px-6 py-4 text-sm text-right text-gray-500 whitespace-nowrap">&euro; {{ number_format($customer->total, 2, ',', '.') }}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="">
        <h3 class="text-lg">Totals by Company</h3>
        <div class="">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b border-gray-200 shadow-sm sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody>
                                @foreach ($rankedCompanies as $company)
                                @if ($loop->index % 2 === 0)
                                <tr class="bg-white">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $company->name }}</td>
                                    <td class="px-6 py-4 text-sm text-right text-gray-500 whitespace-nowrap">&euro; {{ number_format($company->total, 2, ',', '.') }}</td>
                                </tr>
                                @else
                                <tr class="bg-gray-50">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $company->name }}</td>
                                    <td class="px-6 py-4 text-sm text-right text-gray-500 whitespace-nowrap">&euro; {{ number_format($company->total, 2, ',', '.') }}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

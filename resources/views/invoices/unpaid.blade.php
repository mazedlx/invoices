@extends('layouts.app')

@section('heading')
<x-heading>
    <x-slot:title>Invoices</x-slot>

    <x-slot:action>
        <a href="{{ route('invoices.index') }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-600 border border-transparent rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">All invoices</a>

        <a href="{{ route('invoices.create') }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-600 border border-transparent rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Create new invoice</a>
    </x-slot>
</x-heading>
@endsection

@section('content')
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Number</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Date</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Customer</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Company</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Paid</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Amount</th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Show</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($invoices as $invoice)
                        @if ($loop->index % 2 === 0)
                        <tr class="bg-white">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $invoice->number }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $invoice->date->format('d.m.Y') }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{optional($invoice->customer)->name ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ optional($invoice->company)->name ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                @if ($invoice->paid)
                                <x-heroicon-o-check-circle class="w-6 h-6 text-green-600" />
                                @else
                                <x-heroicon-o-x-circle class="w-6 h-6 text-red-500" />
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-right text-gray-500 whitespace-nowrap">&euro; {{ $invoice->amount_in_euros }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                <a href="{{ route('invoices.show', $invoice) }}" class="text-gray-600 hover:text-gray-900">Show</a>
                            </td>
                        </tr>
                        @else
                        <tr class="bg-gray-50">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $invoice->number }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $invoice->date->format('d.m.Y') }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{optional($invoice->customer)->name ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ optional($invoice->company)->name ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                @if ($invoice->paid)
                                <x-heroicon-o-check-circle class="w-6 h-6 text-green-600" />
                                @else
                                <x-heroicon-o-x-circle class="w-6 h-6 text-red-500" />
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-right text-gray-500 whitespace-nowrap">&euro; {{ $invoice->amount_in_euros }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                <a href="{{ route('invoices.show', $invoice) }}" class="text-gray-600 hover:text-gray-900">Show</a>
                            </td>
                        </tr>
                        @endif
                    @empty
                        <tr class="bg-white">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap" colspan="7">No entries</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-5">{{ $invoices->links() }}</div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="bg-white">
    <div class="px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:pb-24 lg:px-8">
        <div class="max-w-xl">
            <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">{{ $company->name }}</h1>
        </div>

        <div class="mt-16">
            <div class="space-y-20">
                <div>
                    <table class="w-full mt-4 text-gray-500 sm:mt-6">
                        <thead class="text-sm text-left text-gray-500 sr-only sm:not-sr-only">
                            <tr>
                                <th scope="col" class="py-3 pr-8 font-normal sm:w-2/5 lg:w-1/3">Number</th>
                                <th scope="col" class="hidden w-1/5 py-3 pr-8 font-normal sm:table-cell">Date</th>
                                <th scope="col" class="hidden py-3 pr-8 font-normal sm:table-cell">Company</th>
                                <th scope="col" class="w-0 py-3 font-normal">Amount</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm border-b border-gray-200 divide-y divide-gray-200 sm:border-t">
                            @forelse ($company->invoices as $invoice)
                            <tr>
                                <td class="py-6 pr-8">
                                    <div class="font-medium text-gray-900">{{ $invoice->number }}</div>
                                </td>
                                <td class="py-6 pr-8 sm:table-cell">{{ $invoice->date->format('d.m.Y') }}</td>
                                <td class="py-6 pr-8 sm:table-cell">{{ optional($invoice->company)->name ?? '-' }}</td>
                                <td class="py-6 pr-8 sm:table-cell">
                                    <dd class="sm:mt-1 whitespace-nowrap">&euro; {{ $invoice->amount_in_euros }}</dd></td>
                            </tr>
                            @empty
                            <tr>
                                <td class="py-6 pr-8" colspan="4">No entries</td>
                            </tr>
                            @endforelse
                            <tr>
                                <td class="py-6 pr-8 font-bold">Total</td>
                                <td class="py-6 pr-8 text-right" colspan="3">
                                    &euro; {{ $company->totalInEuros }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-white">
    <div class="px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:pb-24 lg:px-8">
        <div class="max-w-xl">
            <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">Invoice {{ $invoice->number }}</h1>
        </div>

        <div class="mt-16">
            <div class="space-y-20">
                <div>
                    <div class="px-4 py-6 rounded-lg bg-gray-50 sm:px-6 sm:flex sm:items-center sm:justify-between sm:space-x-6 lg:space-x-8">
                        <dl class="flex-auto space-y-6 text-sm text-gray-600 divide-y divide-gray-200 sm:divide-y-0 sm:space-y-0 sm:grid sm:grid-cols-3 sm:gap-x-6 lg:w-1/2 lg:flex-none lg:gap-x-8">
                            <div class="flex justify-between sm:block">
                                <dt class="font-medium text-gray-900">Date placed</dt>
                                <dd class="sm:mt-1">
                                    <time datetime="{{ $invoice->date->format('Y-m-d') }}">{{ $invoice->date->format('d.m.Y') }}</time>
                                </dd>
                            </div>
                            <div class="flex justify-between pt-6 sm:block sm:pt-0">
                                <dt class="font-medium text-gray-900">Invoice number</dt>
                                <dd class="sm:mt-1">{{ $invoice->number }}</dd>
                            </div>
                            <div class="flex justify-between pt-6 font-medium text-gray-900 sm:block sm:pt-0">
                                <dt>Total amount</dt>
                                <dd class="sm:mt-1">&euro; {{ $invoice->amount_in_euros }}</dd>
                            </div>
                        </dl>

                        <div class="flex items-center space-x-2">
                            <a
                                target="_blank"
                                href="{{ route('invoices.print', $invoice) }}"
                                class="flex items-center justify-center w-full px-4 py-2 mt-6 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:w-auto sm:mt-0"
                            >
                                Print
                            </a>
                            <a
                                href="{{ route('invoices.edit', $invoice) }}"
                                class="flex items-center justify-center w-full px-4 py-2 mt-6 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:w-auto sm:mt-0"
                            >
                                Edit
                            </a>
                        </div>
                    </div>

                    <table class="w-full mt-4 text-gray-500 sm:mt-6">
                        <thead class="text-sm text-left text-gray-500 sr-only sm:not-sr-only">
                            <tr>
                                <th scope="col" class="py-3 pr-8 font-normal sm:w-2/5 lg:w-1/3">Task</th>
                                <th scope="col" class="hidden w-1/5 py-3 pr-8 font-normal sm:table-cell">Rate</th>
                                <th scope="col" class="hidden py-3 pr-8 font-normal sm:table-cell">Time</th>
                                <th scope="col" class="w-0 py-3 font-normal text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm border-b border-gray-200 divide-y divide-gray-200 sm:border-t">
                            @forelse ($invoice->lines as $line)
                            <tr>
                                <td class="py-6 pr-8">
                                    <div>
                                        <div class="font-medium text-gray-900">{{ $line->task }}</div>
                                        <div class="mt-1 sm:hidden">&euro; {{ number_format($line->rate, 2, ',', '.') }}</div>
                                    </div>
                                </td>
                                <td class="hidden py-6 pr-8 sm:table-cell">&euro; {{ number_format($line->rate, 2, ',', '.') }}</td>
                                <td class="hidden py-6 pr-8 sm:table-cell">{{ number_format($line->time, 2, ',', '.') }}</td>
                                <td class="py-6 font-medium text-right whitespace-nowrap">
                                    &euro; {{ $line->amount_in_euros }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="py-6 pr-8" colspan="4">No entries</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

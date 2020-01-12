@extends('layouts.app')

@section('content')
<div class="flex flex-col items-start">
    <h1 class="text-2xl">{{ $company->name }}</h1>
    <div class="flex flex-col items-center">
        <table class="border rounded">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Number</th>
                    <th class="border px-4 py-2">Date</th>
                    <th class="border px-4 py-2">Company</th>
                    <th class="border px-4 py-2">Amount</th>
                </tr>
            </thead>
            <tbody>
                @forelse($company->invoices as $invoice)
                <tr>
                    <td class="border px-4 py-2">{{ $invoice->number }}</td>
                    <td class="border px-4 py-2">{{ $invoice->date->format('d.m.Y') }}</td>
                    <td class="border px-4 py-2">{{ optional($invoice->company)->name ?? '-'  }}</td>
                    <td class="border px-4 py-2 text-right">&euro; {{ $invoice->amountInEuros }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">No invoices for this company.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
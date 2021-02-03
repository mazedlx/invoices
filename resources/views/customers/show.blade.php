@extends('layouts.app')

@section('content')
<div class="flex flex-col items-start">
    <h1 class="text-2xl">{{ $customer->name }}</h1>
    <div class="flex flex-col items-center">
        <table class="border rounded">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Number</th>
                    <th class="px-4 py-2 border">Date</th>
                    <th class="px-4 py-2 border">Company</th>
                    <th class="px-4 py-2 border">Amount</th>
                </tr>
            </thead>
            <tbody>
                @forelse($customer->invoices as $invoice)
                <tr>
                    <td class="px-4 py-2 border">{{ $invoice->number }}</td>
                    <td class="px-4 py-2 border">{{ $invoice->date->format('d.m.Y') }}</td>
                    <td class="px-4 py-2 border">{{ optional($invoice->company)->name ?? '-'  }}</td>
                    <td class="px-4 py-2 text-right border">&euro; {{ $invoice->amountInEuros }}</td>
                </tr>
                @empty
                <tr>
                    <td class="px-4 py-2 border" colspan="4">No invoices for this customer.</td>
                </tr>
                @endforelse
                @if ($customer->invoices->count() > 0)
                <tr>
                    <td colspan="3" class="px-4 py-2 text-right border">Gesamt</td>
                    <td class="px-4 py-2 text-right border">&euro; {{ $customer->totalInEuros }}</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection

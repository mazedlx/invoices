@extends('layouts.app')

@section('content')
<div class="flex flex-col items-start">
    <h1 class="text-2xl">{{ $company->name }}</h1>
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
                @forelse($company->invoices as $invoice)
                <tr>
                    <td class="px-4 py-2 border">{{ $invoice->number }}</td>
                    <td class="px-4 py-2 border">{{ $invoice->date->format('d.m.Y') }}</td>
                    <td class="px-4 py-2 border">{{ optional($invoice->company)->name ?? '-'  }}</td>
                    <td class="px-4 py-2 text-right border">&euro; {{ $invoice->amountInEuros }}</td>
                </tr>
                @empty
                <tr>
                    <td class="px-4 py-2 border" colspan="4">No invoices for this company.</td>
                </tr>
                @endforelse
                @if ($company->invoices->count() > 0)
                <tr>
                    <td colspan="3" class="px-4 py-2 text-right border">Gesamt</td>
                    <td class="px-4 py-2 text-right border">&euro; {{ $company->totalInEuros }}</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection

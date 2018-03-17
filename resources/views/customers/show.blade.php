@extends('layouts.app')

@section('content')
<h1 class="title">{{ $customer->name }}</h1>
<table class="table">
    <thead>
        <tr>
            <th>Number</th>
            <th>Date</th>
            <th>Company</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
    @forelse($customer->invoices as $invoice)
        <tr>
            <td>{{ $invoice->number }}</td>
            <td>{{ $invoice->date->format('d.m.Y') }}</td>
            <td>{{ optional($invoice->company)->name ?? '-'  }}</td>
            <td class="has-text-right">&euro; {{ $invoice->amountInEuros }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="4">No invoices for this customer.</td>
        </tr>
    @endforelse
    </tbody>
</table>
@stop

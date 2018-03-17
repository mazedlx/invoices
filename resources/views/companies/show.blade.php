@extends('layouts.app')

@section('content')
<h1 class="title">{{ $company->name }}</h1>
<table class="table">
    <thead>
        <tr>
            <th>Number</th>
            <th>Date</th>
            <th>Customer</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
    @forelse($company->invoices as $invoice)
        <tr>
            <td>{{ $invoice->number }}</td>
            <td>{{ $invoice->date->format('d.m.Y') }}</td>
            <td>{{ $invoice->customer->name }}</td>
            <td class="has-text-right">&euro; {{ $invoice->amountInEuros }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="4">No invoices for this Company.</td>
        </tr>
    @endforelse
    </tbody>
</table>
@stop

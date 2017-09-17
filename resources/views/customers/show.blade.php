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
    @forelse($customer->invoices() as $invoice)
        <tr>
            <td>{{ $invoice->number }}</td>
            <td>{{ $invoice->date }}</td>
            <td>{{ $invoice->company->name }}</td>
            <td>{{ $invoice->amount }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="4">No invoices for this customer.</td>
        </tr>
    @endforelse
    </tbody>
</table>
@stop

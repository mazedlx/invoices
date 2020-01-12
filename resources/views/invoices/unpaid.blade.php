@extends('layouts.app')

@section('content')
<h1 class="title">Unpaid Invoices</h1>

<table class="table">
    <thead>
        <tr>
            <th>Number</th>
            <th>Date</th>
            <th>Customer</th>
            <th>Company</th>
            <th>Paid?</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($invoices as $invoice)
        <tr>
            <td>
                <a href="{{ route('invoices.show', $invoice) }}">
                    {{ $invoice->number }}
                </a>
            </td>
            <td>{{ $invoice->dateFormatted }}</td>
            <td>{{ optional($invoice->customer)->name }}</td>
            <td>{{ optional($invoice->company)->name }}</td>
            <td>{{ $invoice->paid ? 'Yes' : 'No' }}</td>
            <td class="has-text-right">&euro; {{ $invoice->amountInEuros }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="4">No invoices found.</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $invoices->links() }}
@stop
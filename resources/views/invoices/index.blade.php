@extends('layouts.app')

@section('content')
    <h1 class="title">Invoices</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Number</th>
                <th>Date</th>
                <th>Customer</th>
                <th>Company</th>
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
                <td>{{ $invoice->customer }}</td>
                <td>{{ $invoice->company }}</td>
                <td class="has-text-right">&euro; {{ $invoice->amountInEuros }}</td>
            </tr>
    @empty
        <tr>
            <td colspan="4">No invoices found.</td>
        </tr>
    @endforelse
        </tbody>
    </table>

    {{ $invoices->links('vendor.pagination.bulma') }}
@stop

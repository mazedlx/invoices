@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center">
    <table class="border rounded">
        <thead>
            <tr>
                <th class="border px-4 py-2">Number</th>
                <th class="border px-4 py-2">Date</th>
                <th class="border px-4 py-2">Customer</th>
                <th class="border px-4 py-2">Company</th>
                <th class="border px-4 py-2">Paid?</th>
                <th class="border px-4 py-2">Amount</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($invoices as $invoice)
            <tr>
                <td class="border px-4 py-2">
                    <a href="{{ route('invoices.show', $invoice) }}">
                        {{ $invoice->number }}
                    </a>
                </td>
                <td class="border px-4 py-2">{{ $invoice->dateFormatted }}</td>
                <td class="border px-4 py-2">{{ optional($invoice->customer)->name }}</td>
                <td class="border px-4 py-2">{{ optional($invoice->company)->name }}</td>
                <td class="border px-4 py-2">{{ $invoice->paid ? 'Yes' : 'No' }}</td>
                <td class="border px-4 py-2 text-right">&euro; {{ $invoice->amountInEuros }}</td>
            </tr>
            @empty
            <tr>
                <td
                    class="border px-4 py-2"
                    colspan="4"
                >No invoices found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-2">
        {{ $invoices->links() }}

    </div>

</div>
@stop
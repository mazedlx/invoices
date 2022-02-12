@extends('layouts.app')

@section('heading')
Invoices
@endsection

@section('content')
<div class="flex flex-col items-center">
    <table class="border rounded">
        <thead>
            <tr>
                <th class="px-4 py-2 border">Number</th>
                <th class="px-4 py-2 border">Date</th>
                <th class="px-4 py-2 border">Customer</th>
                <th class="px-4 py-2 border">Company</th>
                <th class="px-4 py-2 border">Paid?</th>
                <th class="px-4 py-2 border">Amount</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($invoices as $invoice)
            <tr>
                <td class="px-4 py-2 border">
                    <a
                        class="underline"
                        href="{{ route('invoices.show', $invoice) }}"
                    >
                        {{ $invoice->number }}
                    </a>
                </td>
                <td class="px-4 py-2 border">{{ $invoice->dateFormatted }}</td>
                <td class="px-4 py-2 border">{{ optional($invoice->customer)->name }}</td>
                <td class="px-4 py-2 border">{{ optional($invoice->company)->name }}</td>
                <td class="px-4 py-2 border">{{ $invoice->paid ? 'Yes' : 'No' }}</td>
                <td class="px-4 py-2 text-right border">&euro; {{ $invoice->amountInEuros }}</td>
            </tr>
            @empty
            <tr>
                <td
                    class="px-4 py-2 border"
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

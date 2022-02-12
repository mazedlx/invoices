@extends('layouts.app')

@section('content')
<form
    class="flex items-center"
    action="{{ route('invoices.destroy', $invoice) }}"
    method="POST"
>
    <a
        class="border border-gray-900 px-2 py-1 rounded-lg mr-2"
        href="{{ route('invoices.edit', $invoice) }}"
    >Edit</a>
    <a
        class="border border-gray-900 px-2 py-1 rounded-lg mr-2"
        href="{{ route('invoices.print', $invoice) }}"
    >Print</a>
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button class="">Delete</button>
</form>

<div>
    <div class="flex items-baseline">
        Nr. <div class="text-3xl font-semibold font-mono">{{ $invoice->number }}</div>
    </div>
    <div class="text-xl text-gray-600">{{ $invoice->dateFormatted }}</div>
    <div class="text-sm">{{ $invoice->paid ? 'Bezahlt' : 'Nicht bezahlt' }}</div>
    <div class="border border-gray-900 px-2 py-2 w-1/3 rounded-lg my-2">{!! $invoice->recipient !!}</div>
</div>

<table class="border rounded">
    <thead>
        <tr>
            <th class="border px-4 py-2">Task</th>
            <th class="border px-4 py-2">Time</th>
            <th class="border px-4 py-2">Rate</th>
            <th class="border px-4 py-2">Amount</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($invoice->lines as $line)
        <tr>
            <td class="border px-4 py-2">{{ $line->task }}</td>
            <td class="border px-4 py-2">{{ $line->timeInHours }}</td>
            <td class="border px-4 py-2">{{ $line->rateInEuros }}</td>
            <td class="border px-4 py-2 text-right">&euro; {{ $line->amountInEuros }}</td>
        </tr>
        @empty
        <tr>
            <td
                class="border px-4 py-2"
                colspan="4"
            >No lines for this invoice found.</td>
        </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <th
                colspan="3"
                class="border px-4 py-2 text-right"
            >Total</th>
            <th class="border px-4 py-2 text-right">&euro; {{ $invoice->amountInEuros }}</th>
        </tr>
    </tfoot>
</table>
@endsection

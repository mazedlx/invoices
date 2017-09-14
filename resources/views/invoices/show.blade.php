@extends('layouts.app')

@section('content')
    <a class="button is-info" href="{{ route('invoices.edit', $invoice) }}">Edit</a>
    <div class="card">
        <div class="card-content">
            <div class="content">
                <h3>Invoice number: {{ $invoice->number }}</h3>
                <h4>Recipient</h4>
                {!! $invoice->recipient !!}
                <br>
                Amount: {{ $invoice->amountInEuros }} &euro;<br>
                Date: {{ $invoice->dateFormatted }}
            </div>
        </div>
    </div>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>Task</th>
                <th>Time</th>
                <th>Rate</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($invoice->lines as $line)
                <tr>
                    <td>{{ $line->task }}</td>
                    <td>{{ $line->timeInHours }}</td>
                    <td>{{ $line->rateInEuros }}</td>
                    <td class="has-text-right">&euro; {{ $line->amountInEuros }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No lines for this invoice found.</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3" class="has-text-right">Total</th>
                <th class="has-text-right">&euro; {{ $invoice->amountInEuros }}</th>
            </tr>
        </tfoot>
    </table>
@stop

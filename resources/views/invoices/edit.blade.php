@extends('layouts.app')

@section('content')
<h1 class="title">Edit Invoice {{ $invoice->number }}</h1>
<form method="POST" action="{{ route('invoices.update', $invoice) }}">
    {{ method_field('PATCH') }}
    @include('invoices._form', ['buttonLabel' => 'Save changes'])
</form>
@stop

@extends('layouts.app')

@section('content')

@include('layouts.errors')
<form
    class="w-1/2 mx-auto"
    method="POST"
    action="{{ route('invoices.update', $invoice) }}"
>
    {{ method_field('PATCH') }}
    @include('invoices._form', ['buttonLabel' => 'Save changes'])
</form>
@stop
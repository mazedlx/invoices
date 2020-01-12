@extends('layouts.app')

@section('content')

@include('layouts.errors')
<div class="w-2/3 mx-auto">
    <form
        method="POST"
        action="{{ route('invoices.store') }}"
    >
        @include('invoices._form', ['invoice' => null, 'buttonLabel' => 'Create invoice'])
    </form>
</div>
@stop
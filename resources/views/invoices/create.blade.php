@extends('layouts.app')

@section('content')
<h1 class="title">New Invoice</h1>
@include('layouts.errors')
<form method="POST" action="{{ route('invoices.store') }}">
    @include('invoices._form', ['buttonLabel' => 'Create invoice'])
</form>
@stop

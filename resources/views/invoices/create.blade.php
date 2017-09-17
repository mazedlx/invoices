@extends('layouts.app')

@section('content')
<h1 class="title">New Invoice</h1>
@include('layouts.errors')
<div class="columns">
    <div class="column is-two-thirds">
        <form method="POST" action="{{ route('invoices.store') }}">
            @include('invoices._form', ['invoice' => null, 'buttonLabel' => 'Create invoice'])
        </form>
    </div>
</div>
@stop

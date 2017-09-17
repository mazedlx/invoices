@extends('layouts.app')

@section('content')
<h1 class="title">New Customer</h1>
@include('layouts.errors')
<div class="columns">
    <div class="column is-two-thirds">
        <form method="POST" action="{{ route('customers.store') }}">
            @include('customers._form', ['customer' => null, 'buttonLabel' => 'Create customer'])
        </form>
    </div>
</div>
@stop

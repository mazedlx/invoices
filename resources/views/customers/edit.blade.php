@extends('layouts.app')

@section('content')
<h1 class="title">Edit Customer {{ $customer->name }}</h1>
@include('layouts.errors')
<div class="columns">
    <div class="column is-two-thirds">
        <form method="POST" action="{{ route('customers.update', $customer) }}">
            {{ method_field('PATCH') }}
            @include('customers._form', ['customer' => $customer, 'buttonLabel' => 'Save changes'])
        </form>
    </div>
</div>
@stop

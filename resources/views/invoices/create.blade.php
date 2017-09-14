@extends('layouts.app')

@section('content')
<h1 class="title">New Invoice</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('invoices.store') }}">
    @include('invoices._form', ['buttonLabel' => 'Create invoice'])
</form>
@stop

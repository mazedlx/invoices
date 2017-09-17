@extends('layouts.app')

@section('content')
<h1 class="title">New Company</h1>
@include('layouts.errors')
<div class="columns">
    <div class="column is-two-thirds">
        <form method="POST" action="{{ route('companies.store') }}">
            @include('companies._form', ['company' => null, 'buttonLabel' => 'Create company'])
        </form>
    </div>
</div>
@stop

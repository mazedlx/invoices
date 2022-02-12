@extends('layouts.app')

@section('content')

@include('layouts.errors')
<div class="w-2/3 mx-auto">
    <form
        method="POST"
        action="{{ route('companies.store') }}"
    >
        @include('companies._form', ['company' => null, 'buttonLabel' => 'Create company'])
    </form>
</div>
@endsection

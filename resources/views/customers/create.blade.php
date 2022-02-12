@extends('layouts.app')

@section('content')

@include('layouts.errors')
<div class="w-2/3 mx-auto">
    <form
        method="POST"
        action="{{ route('customers.store') }}"
    >
        @include('customers._form', ['customer' => null, 'buttonLabel' => 'Create customer'])
    </form>
</div>
@endsection

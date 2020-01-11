@extends('layouts.app')

@section('content')
@include('layouts.errors')
<form
    action="{{ route('login') }}"
    method="POST"
    class="flex flex-col mx-auto justify-around h-32 mt-16"
>
    {{ csrf_field() }}

    <input
        type="text"
        name="email"
        class="bg-gray-100 px-4 py-2 focus:bg-white"
        placeholder="Username"
        autofocus
        required
    >
    <input
        type="password"
        name="password"
        class="bg-gray-100 px-4 py-2 focus:bg-white"
        placeholder="Password"
        required
    >
    <button
        type="submit"
        class="bg-gray-300 border border-gray-600 px-4 py-2"
    >Login</button>
</form>
@endsection
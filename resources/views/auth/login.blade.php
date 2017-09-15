@extends('layouts.app')

@section('content')

@include('layouts.errors')
<form action="{{ route('login') }}" method="POST">
    {{ csrf_field() }}
<div class="columns">
    <div class="column is-one-third is-offset-one-third">
        <div class="field">
            <p class="control">
                <input class="input" type="email" placeholder="Email" name="email" value="{{ old('name') }}">
            </p>
        </div>
        <div class="field">
            <p class="control">
                <input class="input" type="password" placeholder="Password" name="password">
            </p>
        </div>
        <div class="field">
            <p class="control">
                <button type="submit" class="button is-success">
                    Login
                </button>
            </p>
        </div>
    </div>
</div>
@stop

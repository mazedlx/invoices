@extends('layouts.app')

@section('content')

    @include('layouts.errors')

    <div class="w-2/3">
        <livewire:invoices.create />
    </div>
@endsection

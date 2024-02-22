@extends('layouts.app')

@section('heading')
<x-heading>
    <x-slot:title>Create Invoice</x-slot>
    <x-slot:action></x-slot>
</x-heading>
@endsection

@section('content')
    <livewire:invoices.create />
@endsection

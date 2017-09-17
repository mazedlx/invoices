@extends('layouts.app')

@section('content')
<h1 class="title">Customers</h1>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
@forelse ($customers as $customer)
        <tr>
            <td>
                <a href="{{ route('customers.show', $customer) }}">
                    {{ $customer->name }}
                </a>
            </td>
        </tr>
@empty
    <tr>
        <td colspan="4">No customers found.</td>
    </tr>
@endforelse
    </tbody>
</table>

{{ $customers->links('vendor.pagination.bulma') }}
@stop

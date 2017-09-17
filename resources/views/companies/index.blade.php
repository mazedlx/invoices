@extends('layouts.app')

@section('content')
<h1 class="title">Companies</h1>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
@forelse ($companies as $company)
        <tr>
            <td>
                <a href="{{ route('companies.show', $company) }}">
                    {{ $company->name }}
                </a>
            </td>
        </tr>
@empty
    <tr>
        <td colspan="4">No companies found.</td>
    </tr>
@endforelse
    </tbody>
</table>

{{ $companies->links('vendor.pagination.bulma') }}
@stop

@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center">
    <table class="border rounded">
        <thead>
            <tr>
                <th class="border px-4 py-2">Name</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($companies as $company)
            <tr>
                <td class="border px-4 py-2">
                    <a
                        class="underline"
                        href="{{ route('companies.show', $company) }}"
                    >
                        {{ $company->name }}
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td
                    class="border px-4 py-2"
                    colspan="1"
                >No companies found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-2">
        {{ $companies->links() }}
    </div>
    @stop
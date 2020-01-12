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
            @forelse ($customers as $customer)
            <tr>
                <td class="border px-4 py-2">
                    <a
                        class="underline"
                        href="{{ route('customers.show', $customer) }}"
                    >
                        {{ $customer->name }}
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td
                    class="border px-4 py-2"
                    colspan="4"
                >No customers found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-2">
        {{ $customers->links() }}
    </div>
    @stop
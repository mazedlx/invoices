@extends('layouts.app')

@section('heading')
<x-heading>
    <x-slot:title>Customers</x-slot>

    <x-slot:action>
        <a href="{{ route('customers.create') }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-600 border border-transparent rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Create new customer</a>
    </x-slot>
</x-heading>
@endsection

@section('content')
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Name</th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Show</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($customers as $customer)
                        @if ($loop->index % 2 === 0)
                        <tr class="bg-white">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $customer->name }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                <a href="{{ route('customers.show', $customer) }}" class="text-indigo-600 hover:text-indigo-900">Show</a>
                            </td>
                        </tr>
                        @else
                        <tr class="bg-gray-50">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $customer->name }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                <a href="{{ route('customers.show', $customer) }}" class="text-indigo-600 hover:text-indigo-900">Show</a>
                            </td>
                        </tr>
                        @endif
                    @empty
                    <tr class="bg-white">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap" colspan="2">No entries</td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-5">{{ $customers->links() }}</div>
</div>
@endsection

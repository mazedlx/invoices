@extends('layouts.app')

@section('content')
<form action="{{ route('companies.store') }}" method="POST">
    @csrf
    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Company</label>
                <div class="mt-1">
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Name"
                        value="{{ optional($company)->name ?: old('name') }}"
                    >
                </div>
                <x-error field="name" />
            </div>
            <div class="flex justify-end mt-2">
                <div class="pt-5">
                    <div class="flex justify-end">
                        <a href="{{ route('invoices.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Cancel</a>

                        <button type="submit" class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-gray-600 border border-transparent rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

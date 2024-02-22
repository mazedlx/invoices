{{ csrf_field() }}

<div class="flex items-center mb-2">
    <label
        class="w-1/6 font-semibold text-right mr-4"
        for="name"
    >Name</label>
    <input
        class="form-input w-1/3"
        type="text"
        name="name"
        placeholder="Name"
        value="{{ optional($company)->name ?: old('name') }}"
        required
    >
</div>


<div class="flex justify-end mt-2">
    <button
        type="submit"
        class="border border-gray-900 px-4 py-2 rounded-lg"
    >
        {{ $buttonLabel }}
    </button>
</div>
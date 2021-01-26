<div>
    <div class="flex items-center mb-2">
        <label
            for="number"
            class="w-1/6 mr-4 font-semibold text-right"
        >Number</label>
        <input
            wire:model="invoice.number"
            class="w-1/3 form-input"
            type="text"
            required
        >
    @error('invoice.number')
        <span class="text-red-500">{{ $message }}</span>
    @enderror
    </div>
    <div class="flex items-center mb-2">
        <label
            for="date"
            class="w-1/6 mr-4 font-semibold text-right"
        >Date</label>
        <input
            wire:model="invoice.date"
            class="w-1/3 form-input"
            type="date"
            required
        >
    </div>

    <div class="flex items-center mb-2">
        <label
            for="customer"
            class="w-1/6 mr-4 font-semibold text-right"
        >Customer</label>
        <select
            class="w-1/3 form-select"
            wire:model="invoice.customer_id"
        >
            <option value="">-</option>
        @foreach($customers as $customer)
            <option
                value="{{ $customer->id }}"
            >
                {{ $customer->name }}
            </option>
        @endforeach
        </select>
    </div>

    <div class="flex items-center mb-2">
        <label
            for="company"
            class="w-1/6 mr-4 font-semibold text-right"
        >Company</label>
        <select
            class="w-1/3 form-select"
            wire:model="invoice.company_id"
        >
            <option value="">-</option>
        @foreach($companies as $company)
            <option
                value="{{ $company->id }}"
            >
                {{ $company->name }}
            </option>
        @endforeach
        </select>
    </div>

    <div class="flex items-center mb-2">
        <label
            for="address"
            class="w-1/6 mr-4 font-semibold text-right"
        >Address</label>
        <input
            class="w-1/3 form-input"
            type="text"
            wire:model="invoice.address"
            placeholder="Some Street 1"
            required
        >
    </div>

    <div class="flex items-center mb-2">
        <label
            for="zip"
            class="w-1/6 mr-4 font-semibold text-right"
        >Zip</label>
        <input
            class="w-1/3 form-input"
            type="text"
            wire:model="invoice.zip"
            placeholder="1230"
            required
        >
    </div>

    <div class="flex items-center mb-2">
        <label
            for="city"
            class="w-1/6 mr-4 font-semibold text-right"
        >City</label>
        <input
            class="w-1/3 form-input"
            type="text"
            wire:model="invoice.city"
            placeholder="Wien"
            required
        >
    </div>

    <div class="flex items-center mb-2">
        <label
            for="country"
            class="w-1/6 mr-4 font-semibold text-right"
        >Country</label>
        <input
            class="w-1/3 form-input"
            type="text"
            wire:model="invoice.country"
            placeholder=""
        >
    </div>

    <div class="flex items-center mb-2">
        <label
            for="paid"
            class="w-1/6 mr-4 font-semibold text-right"
        >Paid?</label>
        <div class="flex items-center justify-between w-1/3">
            <div class="flex items-center justify-start w-1/2">
                <input
                    class="form-checkbox"
                    type="checkbox"
                    wire:model="invoice.paid"
                    value="1"
                >
                <span class="ml-2">Yes</span>
            </div>
        </div>
    </div>

    <x-invoice-lines :lines="$lines"/>

    <div class="flex justify-end mt-2">
        <button
            wire:click="update"
            type="button"
            class="px-4 py-2 border border-gray-900 rounded-lg"
        >
            Update Invoice
        </button>
    </div>
</div>

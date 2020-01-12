{{ csrf_field() }}

<div class="flex items-center mb-2">
    <label
        class="w-1/6 font-semibold text-right mr-4"
        for="date"
    >Date</label>
    <input
        class="form-input w-1/3"
        type="date"
        name="date"
        placeholder="date"
        value="{{ optional($invoice)->date ? $invoice->date->format('Y-m-d') : old('date') }}"
        required
    >
</div>

<div class="flex items-center mb-2">
    <label
        class="w-1/6 font-semibold text-right mr-4"
        for="customer"
    >Customer</label>
    <select
        class="form-select w-1/3"
        name="customer_id"
    >
        <option>-</option>
        @foreach($customers as $customer)
        <option
            value="{{ $customer['id'] }}"
            @if($invoice)
            {{ optional($invoice->customer)->id == $customer['id'] ? 'selected' : ''}}
            @endif
        >
            {{ $customer['name'] }}
        </option>
        @endforeach
    </select>
</div>

<div class="flex items-center mb-2">
    <label
        class="w-1/6 font-semibold text-right mr-4"
        for="company"
    >Company</label>
    <select
        class="form-select w-1/3"
        name="company_id"
    >
        <option value="">-</option>
        @foreach($companies as $company)
        <option
            value="{{ $company['id'] }}"
            @if($invoice)
            {{ optional($invoice->company)->id == $company['id'] ? 'selected' : '' }}
            @endif
        >
            {{ $company['name'] }}
        </option>
        @endforeach
    </select>
</div>

<div class="flex items-center mb-2">
    <label
        class="w-1/6 font-semibold text-right mr-4"
        for="address"
    >Address</label>
    <input
        class="form-input w-1/3"
        type="text"
        name="address"
        placeholder="Address"
        value="{{ optional($invoice)->address ?: old('address') }}"
        required
    >
</div>

<div class="flex items-center mb-2">
    <label
        class="w-1/6 font-semibold text-right mr-4"
        for="zip"
    >Zip</label>
    <input
        class="form-input w-1/3"
        type="text"
        name="zip"
        placeholder="Zip"
        value="{{ optional($invoice)->zip ?: old('zip') }}"
        required
    >
</div>

<div class="flex items-center mb-2">
    <label
        class="w-1/6 font-semibold text-right mr-4"
        for="city"
    >City</label>
    <input
        class="form-input w-1/3"
        type="text"
        name="city"
        placeholder="City"
        value="{{ optional($invoice)->city ?: old('zip') }}"
        required
    >
</div>

<div class="flex items-center mb-2">
    <label
        class="w-1/6 font-semibold text-right mr-4"
        for="country"
    >Country</label>
    <input
        class="form-input w-1/3"
        type="text"
        name="country"
        placeholder="Country"
        value="{{ optional($invoice)->country ?: old('country') }}"
    >
</div>

<div class="flex items-center mb-2">
    <label
        class="w-1/6 font-semibold text-right mr-4"
        for="paid"
    >Paid?</label>
    <div class="flex items-center justify-between w-1/3">
        <div class="flex items-center justify-start w-1/2">
            <input
                class="form-radio"
                type="radio"
                name="paid"
                value="1"
                {{ optional($invoice)->paid ? 'checked' : null }}
            >
            <span class="ml-2">Yes</span>
        </div>
        <div class="flex items-center justify-start w-1/2">
            <input
                class="form-radio"
                type="radio"
                name="paid"
                value="0"
                {{ optional($invoice)->paid ? null : 'checked' }}
            >
            <span class="ml-2">No</span>
        </div>
    </div>
</div>

@if (optional($invoice)->lines)
@foreach ($invoice->lines as $line)
<div class="flex items-center">
    <label
        class="w-1/6 font-semibold text-right mr-4"
        for="tasks"
    >Line {{ $loop->iteration }}</label>
    <div class="flex">
        <input
            class="form-input w-2/3"
            type="text"
            placeholder="Task"
            name="tasks[]"
            value="{{ $line->task }}"
        >
        <div class="form-input border-r-0">
            &euro;
        </div>

        <input
            class="form-input border-l-0 -ml-2 w-1/6"
            type="number"
            step="0.01"
            placeholder="90,00"
            name="rates[]"
            value="{{ $line->rateAsFloat }}"
        >
        <input
            class="form-input w-1/6"
            type="number"
            step="0.01"
            placeholder="Time"
            name="times[]"
            value="{{ $line->timeAsFloat }}"
        >
    </div>
</div>
@endforeach
@endif

<div class="flex items-center">
    <label
        class="w-1/6 font-semibold text-right mr-4"
        for="tasks"
    >Tasks</label>
    <div class="flex">
        <input
            class="form-input w-2/3"
            type="text"
            placeholder="Task"
            name="tasks[]"
        >
        <div class="form-input border-r-0">
            &euro;
        </div>

        <input
            class="form-input border-l-0 -ml-2 w-1/6"
            type="number"
            step="0.01"
            placeholder="90,00"
            name="rates[]"
            value="95.00"
        >
        <input
            class="form-input w-1/6"
            type="number"
            step="0.01"
            placeholder="Time"
            name="times[]"
        >
    </div>
</div>

@for($i = 0; $i <=
    3;
    $i++)
    <div
    class="flex items-center mt-2"
>
    <label
        class="w-1/6 font-semibold text-right mr-4"
        for="tasks"
    ></label>
    <div class="flex">
        <input
            class="form-input w-2/3"
            type="text"
            placeholder="Task"
            name="tasks[]"
        >
        <div class="form-input border-r-0">
            &euro;
        </div>

        <input
            class="form-input border-l-0 -ml-2 w-1/6"
            type="number"
            step="0.01"
            placeholder="90,00"
            name="rates[]"
            value="95.00"
        >
        <input
            class="form-input w-1/6"
            type="number"
            step="0.01"
            placeholder="Time"
            name="times[]"
        >
    </div>
    </div>
    @endfor

    <div class="flex justify-end mt-2">
        <button
            type="submit"
            class="border border-gray-900 px-4 py-2 rounded-lg"
        >
            {{ $buttonLabel }}
        </button>
    </div>
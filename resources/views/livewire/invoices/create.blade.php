<form
    action="#"
    method="POST"
>
    <div class="shadow-sm sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
            <x-input
                for="number"
                label="Number"
                model="invoice.number"
            />
            <x-date
                for="date"
                label="Date"
                model="invoice.date"
            />
            <x-select
                model="invoice.customer_id"
                for="customer_id"
                label="Customer"
                :values="$customers"
                key="id"
                show="name"
            />
            <x-select
                model="invoice.company_id"
                for="company_id"
                label="Company"
                :values="$companies"
                key="id"
                show="name"
            />
            <x-input
                for="address"
                label="Address"
                model="invoice.address"
            />
            <x-input
                for="zip"
                label="Zip"
                model="invoice.zip"
            />
            <x-input
                for="city"
                label="City"
                model="invoice.city"
            />
            <x-input
                for="country"
                label="Country"
                model="invoice.country"
            />
            <x-checkbox
                for="paid"
                value="1"
                label="Paid?"
                model="invoice.paid"
            />

            <x-invoice-lines />

            <div class="flex justify-end mt-2">
                <div class="pt-5">
                    <div class="flex justify-end">
                        <a
                            href="{{ route('invoices.index') }}"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-xs hover:bg-gray-50 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                        >Cancel</a>

                        <button
                            wire:click.prevent="save"
                            type="button"
                            class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-gray-600 border border-transparent rounded-md shadow-xs hover:bg-gray-700 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                        >Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

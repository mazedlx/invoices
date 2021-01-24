<div
    x-cloak
    x-data="{
        isVisible: false,
    }"
    class="flex flex-col"
>
    <button x-on:click="isVisible = !isVisible">Customers</button>
    <button
        x-show="isVisible"
        x-on:click="isVisible = false"
        tabindex="-1"
        class="fixed inset-0 z-10 w-full h-full bg-black opacity-25 cursor-default"
    ></button>
    <div
        x-show="isVisible"
        class="absolute z-20 flex flex-col mt-6 bg-white border-2 border-gray-900 rounded-lg"
    >
        <a
            class="block px-4 py-2 text-gray-900 rounded-t hover:bg-gray-900 hover:text-white"
            href="{{ route('customers.create') }}"
        >New Customer</a>
        <a
            class="block px-4 py-2 text-gray-900 rounded-b hover:bg-gray-900 hover:text-white"
            href="{{ route('customers.index') }}"
        >All Customers</a>
    </div>
</div>

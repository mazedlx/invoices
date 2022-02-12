@for ($i = 0; $i < 4; $i++)
<div class="flex items-center space-x-2">
    <div class="flex mt-1 rounded-md shadow-sm grow">
        <input
            wire:model="lines.{{ $i }}.task"
            type="text"
            class="flex-1 block w-full border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-500 sm:text-sm"
            placeholder="Task"
        >
    </div>
    <div class="flex mt-1 rounded-md shadow-sm">
        <span class="inline-flex items-center px-3 text-sm text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50">&euro;</span>
        <input
            wire:model="lines.{{ $i }}.rate"
            type="text"
            type="number"
            step="0.01"
            placeholder="95,00"
            class="flex-1 block w-full border-gray-300 rounded-none rounded-r-md focus:ring-gray-500 focus:border-gray-500 sm:text-sm"
        >
    </div>
    <div class="flex mt-1 rounded-md shadow-sm">
        <input
            wire:model="lines.{{ $i }}.time"
            type="number"
            step="0.01"
            placeholder="1,00"
            class="flex-1 block w-full border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-500 sm:text-sm"
            placeholder="Task"
        >
    </div>
</div>
@endfor

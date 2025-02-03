<div>
    <div class="grid grid-cols-4 gap-6">
        <div class="col-span-2 sm:col-span-2">
            <label for="{{ $for }}" class="block text-sm font-medium @error($model) text-red-700 @else text-gray-700 @enderror">{{ $label }}</label>

            <div class="flex mt-1 rounded-md shadow-xs">
                <input
                    wire:model.live="{{ $model }}"
                    type="text"
                    name="{{ $for }}"
                    id="{{ $for }}"
                    class="flex-1 block w-full @error($model) border-red-300  @else border-gray-300 @enderror rounded-md focus:ring-gray-500 focus:border-gray-500 sm:text-sm"
                >
            </div>
        </div>
    </div>
    <x-error :field="$model" />
</div>

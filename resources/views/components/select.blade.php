<div>
    <div class="grid grid-cols-4 gap-6">
        <div class="col-span-2 sm:col-span-2">
            <label for="{{ $for }}" class="block text-sm font-medium @error($model) text-red-700 @else text-gray-700 @enderror">{{ $label }}</label>

            <select
                wire:model="{{ $model }}"
                id="{{ $for }}"
                name="{{ $for }}"
                class="block w-full px-3 py-2 mt-1 bg-white border @error($model) border-red-300  @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm"
            >
                <option value>-</option>
            @foreach ($values as $value)
                <option value="{{ $value->{$key} }}">{{ $value->{$show} }}</option>
            @endforeach
            </select>
        </div>
    </div>
    <x-error :field="$model" />
</div>

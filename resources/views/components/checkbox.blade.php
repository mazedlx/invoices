<div>
    <div class="grid grid-cols-4 gap-6">
        <div class="col-span-2 sm:col-span-2">
            <div class="mt-4 space-y-4">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input
                            wire:model.live="{{ $model }}"
                            id="{{ $for }}"
                            name="{{ $for }}"
                            type="checkbox"
                            value="{{ $value }}"
                            class="w-4 h-4 text-gray-600 @error($model) border-red-300  @else border-gray-300 @enderror rounded-sm focus:ring-gray-500">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="{{ $for }}" class="block text-sm font-medium @error($model) text-red-700 @else text-gray-700 @enderror">{{ $label }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-error :field="$model" />
</div>

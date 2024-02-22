@error($field)
<div class="flex items-center mt-1 space-x-2">
    <x-heroicon-s-x-circle class="w-4 h-4 text-red-700" />
    <span class="text-sm text-red-700">{{ $message }}</span>
</div>
@enderror

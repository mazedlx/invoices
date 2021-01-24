@for ($i = 0; $i < 4; $i++)
<div class="flex items-center">
    <label
        for="tasks"
        class="w-1/6 mr-4 font-semibold text-right"
    >Tasks</label>
    <div class="flex">
        <input
            class="w-2/3 form-input"
            type="text"
            placeholder="Task"
            wire:model="lines.{{ $i }}.task"
        >
        <div class="border-r-0 form-input">
            &euro;
        </div>

        <input
            class="w-1/6 -ml-2 border-l-0 form-input"
            type="number"
            step="0.01"
            placeholder="90,00"
            wire:model="lines.{{ $i }}.rate"
            value="95.00"
        >
        <input
            class="w-1/6 form-input"
            type="number"
            step="0.01"
            placeholder="Time"
            wire:model="lines.{{ $i }}.time"
        >
    </div>
</div>
@endfor

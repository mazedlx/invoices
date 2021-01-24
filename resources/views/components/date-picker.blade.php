<div>
    <input type="text" id="date" wire:model="invoice.date">
    @push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    @endpush
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <script>
        new Pikaday({ field: document.getElementById('date'), format: 'DD.MM.YYYY', })
    </script>
    @endpush
</div>

{{ csrf_field() }}

<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label">Name</label>
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control is-expanded">
                <input class="input" type="text" name="name" placeholder="" value="{{ optional($customer)->name ?: old('date') }}" required>
            </p>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label"></div>
    <p class="control">
        <button type="submit" class="button is-primary">
            {{ $buttonLabel }}
        </button>
    </p>
</div>

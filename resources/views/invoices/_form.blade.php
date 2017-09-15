{{ csrf_field() }}

<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label">Date</label>
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control is-expanded has-icons-left">
                <input class="input" type="date" name="date" placeholder="" value="{{ optional($invoice)->date ? $invoice->date->format('Y-m-d') : old('date') }}">
                <span class="icon is-small is-left">
                    <i class="fa fa-user"></i>
                </span>
            </p>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label">Customer</label>
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control is-expanded has-icons-left">
                <input class="input" type="text" name="customer" placeholder="Customer" value="{{ optional($invoice)->customer ?: old('customer') }}">
                <span class="icon is-small is-left">
                    <i class="fa fa-user"></i>
                </span>
            </p>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label">Company</label>
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control is-expanded has-icons-left">
                <input class="input" type="text" name="company" placeholder="Company" value="{{ optional($invoice)->company ?: old('company') }}">
                <span class="icon is-small is-left">
                    <i class="fa fa-user"></i>
                </span>
            </p>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label">Address</label>
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control is-expanded has-icons-left">
                <input class="input" type="text" name="address" placeholder="Address" value="{{ optional($invoice)->address ?: old('address') }}">
                <span class="icon is-small is-left">
                    <i class="fa fa-user"></i>
                </span>
            </p>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label">Zip</label>
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control is-expanded has-icons-left">
                <input class="input" type="text" name="zip" placeholder="Zip" value="{{ optional($invoice)->zip ?: old('zip') }}">
                <span class="icon is-small is-left">
                    <i class="fa fa-user"></i>
                </span>
            </p>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label">City</label>
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control is-expanded has-icons-left">
                <input class="input" type="text" name="city" placeholder="City" value="{{ optional($invoice)->city ?: old('zip') }}">
                <span class="icon is-small is-left">
                    <i class="fa fa-user"></i>
                </span>
            </p>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label">Country</label>
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control is-expanded has-icons-left">
                <input class="input" type="text" name="country" placeholder="Country" value="{{ optional($invoice)->country ?: old('country') }}">
                <span class="icon is-small is-left">
                    <i class="fa fa-user"></i>
                </span>
            </p>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label">
        <label class="label">Paid?</label>
    </div>
    <div class="field-body">
        <div class="field is-narrow">
            <div class="control">
                <label class="radio">
                    <input type="radio" name="paid" value="1" {{ optional($invoice)->paid ? 'checked' : null }}>
                    Yes
                </label>
                <label class="radio">
                    <input type="radio" name="paid" value="0" {{ optional($invoice)->paid ? null : 'checked' }}>
                    No
                </label>
            </div>
        </div>
    </div>
</div>
@if (optional($invoice)->lines)
@forelse ($invoice->lines as $line)
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label">Line</label>
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control is-expanded has-icons-left">
                <input class="input" type="text" placeholder="Task" name="tasks[]" value="{{ $line->task }}">
                <span class="icon is-small is-left">
                    <i class="fa fa-user"></i>
                </span>
            </p>
        </div>
        <div class="field has-addons">
            <p class="control">
                <a class="button is-static">
                    &euro;
                </a>
            </p>
            <p class="control is-expanded has-icons-left has-icons-right">
                <input class="input" type="number" step="0.01" placeholder="90,00" name="rates[]" value="{{ $line->rateAsFloat }}">
            </p>
        </div>
        <div class="field">
            <p class="control is-expanded has-icons-left has-icons-right">
                <input class="input" type="number" step="0.01" placeholder="Time" name="times[]" value="{{ $line->timeAsFloat }}">
            </p>
        </div>
    </div>
</div>
@empty
@endforelse
@endif
<div class="lines-container">
    <div class="field is-horizontal" data-rel="line">
        <div class="field-label is-normal">
            <label class="label">Line</label>
        </div>
        <div class="field-body">
            <div class="field">
                <p class="control is-expanded has-icons-left">
                    <input class="input" type="text" placeholder="Task" name="tasks[]">
                    <span class="icon is-small is-left">
                        <i class="fa fa-user"></i>
                    </span>
                </p>
            </div>
            <div class="field has-addons">
                <p class="control">
                    <a class="button is-static">
                        &euro;
                    </a>
                </p>
                <p class="control is-expanded has-icons-left has-icons-right">
                    <input class="input" type="number" step="0.01" placeholder="90,00" name="rates[]" value="90.00">
                </p>
            </div>
            <div class="field">
                <p class="control is-expanded has-icons-left has-icons-right">
                    <input class="input" type="number" step="0.01" placeholder="Time" name="times[]">
                </p>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="field is-grouped">
    <div class="field-label"></div>
    <p class="control">
        <button type="button" class="button is-info" data-rel="add-line-button">
            Add a Line
        </button>
    </p>
    <p class="control">
        <button type="submit" class="button is-primary">
            {{ $buttonLabel }}
        </button>
    </p>
</div>

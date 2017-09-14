{{ csrf_field() }}

<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label">Date</label>
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control is-expanded has-icons-left">
                <input class="input" type="date" name="date" placeholder="" value="{{ optional($invoice)->date ? $invoice->date->format('Y-m-d') : null }}">
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
                <input class="input" type="text" name="customer" placeholder="Customer" value="{{ optional($invoice)->customer }}">
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
                <input class="input" type="text" name="company" placeholder="Company" value="{{ optional($invoice)->company }}">
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
                <input class="input" type="text" name="address" placeholder="Address" value="{{ optional($invoice)->address }}">
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
                <input class="input" type="text" name="zip" placeholder="Zip" value="{{ optional($invoice)->zip }}">
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
                <input class="input" type="text" name="city" placeholder="City" value="{{ optional($invoice)->city }}">
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
                <input class="input" type="text" name="country" placeholder="Country" value="{{ optional($invoice)->country }}">
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

<div class="field is-horizontal">
    <div class="field-label"></div>
    <div class="field-body">
        <div class="field">
            <div class="control">
                <button class="button is-primary">
                    {{ $buttonLabel }}
                </button>
            </div>
        </div>
    </div>
</div>

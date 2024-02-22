<?php

namespace App\Http\Livewire\Invoices;

use App\Company;
use App\Customer;
use App\Invoice;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
    public Invoice $invoice;
    public array $lines;

    public function mount(Invoice $invoice)
    {
        $this->invoice = $invoice;
        $this->lines = $invoice->lines->toArray();
    }

    public function render()
    {
        return view('livewire.invoices.edit', [
            'customers' => Customer::all(),
            'companies' => Company::all(),
        ]);
    }

    public function update()
    {
        $this->validate();

        $this->invoice->save();

        $this->invoice->lines->each->delete();

        collect($this->lines)->each(function ($line) {
            $this->invoice->lines()->create([
                'time' => $line['time'],
                'task' => $line['task'],
                'rate' => $line['rate'],
            ]);
        });

        flash('Inovice updated successfully!')->success();

        return redirect(route('invoices.show', $this->invoice));
    }

    protected function rules()
    {
        return [
            'invoice.address' => 'required',
            'invoice.city' => 'required',
            'invoice.company_id' => 'nullable',
            'invoice.customer_id' => [
                'required_unless:company_id,null',
            ],
            'invoice.date' => 'date',
            'invoice.country' => 'nullable',
            'invoice.number' => [
                'required',
                Rule::unique('invoices', 'number')->ignore($this->invoice),
            ],
            'invoice.paid' => 'boolean',
            'invoice.zip' => 'required',
            'lines.*.rate' => 'numeric',
            'lines.*.task' => 'required',
            'lines.*.time' => 'numeric',
        ];
    }
}

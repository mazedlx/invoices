<?php

namespace App\Livewire\Invoices;

use App\Company;
use App\Customer;
use App\Invoice;
use Livewire\Component;

class Create extends Component
{
    public Invoice $invoice;
    public array $lines;

    public function mount()
    {
        $this->invoice = new Invoice(['paid' => false]);
        $this->lines = [];
    }

    public function save()
    {
        $this->validate();

        $this->invoice->save();

        collect($this->lines)->each(function ($line) {
            $this->invoice->lines()->create([
                'time' => $line['time'],
                'task' => $line['task'],
                'rate' => $line['rate'],
            ]);
        });

        flash('Inovice created successfully!')->success();

        return redirect(route('invoices.show', $this->invoice));
    }

    public function render()
    {
        return view('livewire.invoices.create', [
            'customers' => Customer::all(),
            'companies' => Company::all(),
        ]);
    }

    protected function rules()
    {
        return [
            'invoice.address' => 'required',
            'invoice.city' => 'required',
            'invoice.company_id' => 'nullable',
            'invoice.country' => 'nullable',
            'invoice.customer_id' => 'nullable',
            'invoice.date' => [
                'required',
                'date',
            ],
            'invoice.number' => [
                'required',
                'unique:invoices,number',
            ],
            'invoice.paid' => 'boolean',
            'invoice.zip' => 'required',
            'lines.*.rate' => 'numeric',
            'lines.*.task' => 'required',
            'lines.*.time' => 'numeric',
        ];
    }
}

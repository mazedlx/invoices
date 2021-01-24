<?php

namespace App\Http\Livewire\Invoices;

use App\Company;
use App\Customer;
use App\Invoice;
use Livewire\Component;

class Create extends Component
{
    public Invoice $invoice;
    public array $lines;

    protected $rules = [
        'invoice.address' => 'required',
        'invoice.city' => 'required',
        'invoice.company_id' => 'nullable',
        'invoice.customer_id' => 'nullable',
        'invoice.date' => 'date',
        'invoice.nation' => 'nullable',
        'invoice.paid' => 'boolean',
        'invoice.zip' => 'required',
        'lines.*.rate' => 'numeric',
        'lines.*.task' => 'required',
        'lines.*.time' => 'numeric',
    ];

    public function mount()
    {
        $this->invoice = new Invoice;
        $this->lines = [];
    }

    public function save()
    {
        $this->validate();

        $this->invoice->save();
    }

    public function render()
    {
        return view('livewire.invoices.create', [
            'customers' => Customer::all(),
            'companies' => Company::all(),
        ]);
    }
}

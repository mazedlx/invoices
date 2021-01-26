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
        'invoice.country' => 'nullable',
        'invoice.number' => 'required',
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

        $lines = collect($this->lines)->each(function ($line) {
            $this->invoice->lines()->create([
                'time' => $line['time'],
                'task' => $line['task'],
                'rate' => $line['rate'],
            ]);
        });
    }

    public function render()
    {
        return view('livewire.invoices.create', [
            'customers' => Customer::all(),
            'companies' => Company::all(),
        ]);
    }
}

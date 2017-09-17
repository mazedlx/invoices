<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use App\Invoice;
use App\Line;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function index()
    {
        return view('invoices.index')
            ->with('invoices', Invoice::orderBy('date', 'desc')->paginate(5));
    }

    public function show(Invoice $invoice)
    {
        return view('invoices.show')
            ->with('invoice', $invoice);
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'city' => 'required',
            'date' => 'required',
            'paid' => 'required',
            'zip' => 'required',
        ]);

        $invoice = Invoice::create([
            'address' => request('address'),
            'city' => request('city'),
            'company_id' => request('company_id'),
            'country' => request('country'),
            'customer_id' => request('customer_id'),
            'date' => request('date'),
            'number' => Invoice::generateNumber(request('date')),
            'paid' => request('paid'),
            'zip' => request('zip'),
        ]);

        $invoice->lines()->saveMany(Line::transpose($request));

        flash('Inovice created successfully!')->success();

        return redirect('/invoices');
    }

    public function create()
    {
        return view('invoices.create')
            ->with('customers', Customer::orderBy('name')->get())
            ->with('companies', Company::orderBy('name')->get());
    }

    public function edit(Invoice $invoice)
    {
        return view('invoices.edit')
            ->with('invoice', $invoice)
            ->with('customers', Customer::orderBy('name')->get())
            ->with('companies', Company::orderBy('name')->get());
    }

    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'address' => 'required',
            'city' => 'required',
            'date' => 'required',
            'paid' => 'required',
            'zip' => 'required',
        ]);

        $invoice->update([
            'address' => request('address'),
            'city' => request('city'),
            'company_id' => request('company_id'),
            'country' => request('country'),
            'customer_id' => request('customer_id'),
            'date' => request('date'),
            'paid' => request('paid'),
            'zip' => request('zip'),
        ]);

        $invoice->lines->each->delete();

        $invoice->lines()->saveMany(Line::transpose($request));

        flash('Changes saved!')->success();

        return redirect('/invoices/' . $invoice->id);
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->lines->each->delete();
        $invoice->delete();

        flash('Inovice deleted!')->success();

        return redirect('/invoices');
    }
}

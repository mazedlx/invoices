<?php

namespace App\Http\Controllers;

use App\Line;
use App\Company;
use App\Invoice;
use App\Customer;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function index()
    {
        return view('invoices.index', [
            'invoices' => Invoice::orderBy('date', 'desc')->paginate(5),
        ]);
    }

    public function create()
    {
        return view('invoices.create', [
            'customers' => Customer::orderBy('name')->get(),
            'companies' => Company::orderBy('name')->get(),
        ]);
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

    public function show(Invoice $invoice)
    {
        return view('invoices.show', [
            'invoice' => $invoice,
        ]);
    }

    public function edit(Invoice $invoice)
    {
        return view('invoices.edit', [
            'invoice' => $invoice,
            'customers' => Customer::orderBy('name')->get(),
            'companies' => Company::orderBy('name')->get(),
        ]);
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

        return redirect(route('invoices.show', $invoice));
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->lines->each->delete();
        $invoice->delete();

        flash('Inovice deleted!')->success();

        return redirect('/invoices');
    }
}

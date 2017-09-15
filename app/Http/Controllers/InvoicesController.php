<?php

namespace App\Http\Controllers;

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
            'company' => request('company'),
            'country' => request('country'),
            'customer' => request('customer'),
            'date' => request('date'),
            'number' => Invoice::generateNumber(request('date')),
            'paid' => request('paid'),
            'zip' => request('zip'),
        ]);

        $invoice->lines()->saveMany(Line::transpose($request));

        return redirect('/invoices');
    }

    public function create()
    {
        return view('invoices.create')
            ->with('invoice', null);
    }

    public function edit(Invoice $invoice)
    {
        return view('invoices.edit')
            ->with('invoice', $invoice);
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
            'company' => request('company'),
            'country' => request('country'),
            'customer' => request('customer'),
            'date' => request('date'),
            'paid' => request('paid'),
            'zip' => request('zip'),
        ]);

        $invoice->lines->each->delete();

        $invoice->lines()->saveMany(Line::transpose($request));

        return redirect('/invoices/' . $invoice->id);
    }
}

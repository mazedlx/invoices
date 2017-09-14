<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;

class LinesController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'time' => 'required',
            'rate' => 'required',
            'task' => 'required',
        ]);

        $invoice = Invoice::findOrFail(request('invoice_id'));
        $invoice->lines()->create([
            'time' => request('time') / 100,
            'rate' => request('rate') * 100,
            'task' => request('task'),
        ]);

        return redirect('/invoices/' . $invoice->id);
    }
}

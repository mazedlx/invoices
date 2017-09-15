<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;
use PDF;

class PrintController extends Controller
{
    public function index(Invoice $invoice)
    {
        return PDF::loadView('pdf.invoice', ['invoice' => $invoice])
            ->download($invoice->number . '.pdf');
    }
}

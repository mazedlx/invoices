<?php

namespace App\Http\Controllers;

use App\Invoice;
use PDF;

class PrintController extends Controller
{
    public function __invoke(Invoice $invoice)
    {
        return PDF::loadView('pdf.invoice', ['invoice' => $invoice])
            ->download($invoice->number . '.pdf');
    }
}

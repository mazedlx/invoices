<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;

class UnpaidInvoicesController extends Controller
{
    public function __invoke()
    {
        return view('invoices.unpaid')
            ->with('invoices', Invoice::unpaid()->orderBy('date', 'desc')->paginate(5));
    }
}

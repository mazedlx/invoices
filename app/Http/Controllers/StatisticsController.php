<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        return view('statistics.index')
            ->with('totals', Invoice::totalsByYear());
    }
}

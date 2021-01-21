<?php

namespace App\Http\Controllers;

use App\Invoice;

class StatisticsController extends Controller
{
    public function __invoke()
    {
        return view('statistics.index', [
            'totals' => Invoice::totalsByYear(),
            'rankedCustomers' => Invoice::rankedCustomers(),
            'rankedCompanies' => Invoice::rankedCompanies(),
        ]);
    }
}

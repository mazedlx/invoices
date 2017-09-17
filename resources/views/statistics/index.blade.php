@extends('layouts.app')

@section('content')
<h1 class="title">Yearly Totals</h1>
<ul>
@forelse ($totals as $year => $total)
    <li>{{ $year }}: &euro; {{ number_format($total, 2, ',', '.') }}</li>
@empty
@endforelse
</ul>
<br>
<h1 class="title">Totals By Customer</h1>
<ul>
@forelse ($rankedCustomers as $customer_id => $total)
    <li>{{ App\Customer::find($customer_id)->name }}: &euro; {{ number_format($total, 2, ',', '.') }}</li>
@empty
    <li>No invoices for any customers.</li>
@endforelse
</ul>
<br>
<h1 class="title">Totals By Company</h1>
<ul>
@forelse ($rankedCompanies as $company_id => $total)
    <li>{{ App\Company::find($company_id)->name }}: &euro; {{ number_format($total, 2, ',', '.') }}</li>
@empty
    <li>No invoices for any companies.</li>
@endforelse
</ul>
@stop

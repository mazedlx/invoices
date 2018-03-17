<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        return view('customers.index')
            ->with('customers', Customer::orderBy('name')->paginate(5));
    }

    public function show(Customer $customer)
    {
        return view('customers.show')
            ->with('customer', $customer->load('invoices'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Customer::create(['name' => request('name')]);

        flash('Customer created successfully!')->success();

        return redirect('/customers');
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit')
            ->with('customer', $customer);
    }

    public function update(Request $request, Customer $customer)
    {
        $customer->update(['name' => request('name')]);

        flash('Changes saved!');

        return redirect('/customers');
    }
}

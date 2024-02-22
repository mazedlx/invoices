<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customers.index', [
            'customers' => Customer::orderBy('name')->paginate(5),
        ]);
    }

    public function create()
    {
        return view('customers.create', [
            'customer' => null,
        ]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
        ]);

        Customer::create(['name' => request('name')]);

        flash('Customer created successfully!')->success();

        return redirect(route('customers.index'));
    }

    public function show(Customer $customer)
    {
        return view('customers.show', [
            'customer' => $customer->load('invoices'),
        ]);
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', [
            'customer' => $customer,
        ]);
    }

    public function update(Request $request, Customer $customer)
    {
        request()->validate([
            'name' => 'required',
        ]);

        $customer->update(['name' => request('name')]);

        flash('Changes saved!');

        return redirect(route('customers.index'));
    }
}

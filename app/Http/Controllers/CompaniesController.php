<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index()
    {
        return view('companies.index')
            ->with('companies', Company::orderBy('name')->paginate(5));
    }

    public function show(Company $company)
    {
        return view('companies.show')
            ->with('company', $company->load('invoices'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Company::create(['name' => request('name')]);

        flash('Company saved successfully!');

        return redirect('/companies');
    }

    public function edit(Company $company)
    {
        return view('companies.edit')
            ->with('company', $company);
    }

    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $company->update([
            'name' => request('name'),
        ]);

        flash('Changes saved!');

        return redirect('/companies');
    }
}

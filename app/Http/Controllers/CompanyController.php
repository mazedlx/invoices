<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return view('companies.index', [
            'companies' => Company::orderBy('name')->paginate(5),
        ]);
    }

    public function create()
    {
        return view('companies.create', [
            'company' => null,
        ]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
        ]);

        Company::create([
            'name' => request('name'),
        ]);

        flash('Company saved successfully!');

        return redirect(route('companies.index'));
    }

    public function show(Company $company)
    {
        return view('companies.show', [
            'company' => $company->load('invoices'),
        ]);
    }

    public function edit(Company $company)
    {
        return view('companies.edit', [
            'company' => $company,
        ]);
    }

    public function update(Request $request, Company $company)
    {
        request()->validate([
            'name' => 'required',
        ]);

        $company->update([
            'name' => request('name'),
        ]);

        flash('Changes saved!');

        return redirect(route('companies.index'));
    }
}

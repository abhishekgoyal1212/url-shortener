<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::latest()->paginate(10);

        return view('superadmin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.companies.create')->with('success', 'Company created successfully!');;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest  $request)
    {
        Company::create($request->validated());
        return redirect()->route('superadmin.companies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::findOrFail($id);
        return view('superadmin.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update($request->validated());

        return redirect()->route('superadmin.companies.index')->with('success', 'Company updated successfully!');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('superadmin.companies.index')
            ->with('success', 'Company deleted successfully!');
    }
}

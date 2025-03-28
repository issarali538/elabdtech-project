<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('company-list', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email',
            'address' => 'required|string|max:255',
            'website' => 'nullable|url',
            'logo' => 'nullable|extensions:jpeg,png,jpg,gif|max:2048|dimensions:min_width=100,min_height=100',
            ]);
    
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }
    
        Company::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'address' => $request->input('address'),
            'logo' => $logoPath,
        ]);
        return redirect()->route('company.index')->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $company)
    {
        $company = Company::findOrFail($company);
        return view('company-details', compact('company'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $company)
    {
        $company = Company::findOrFail($company);
        return view('edit-company-form', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $company)
    {
        $company = Company::findOrFail($company);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'website' => 'nullable|url',
            'logo' => 'extensions:jpeg,png,jpg,gif|max:2048|dimensions:min_width=100,min_height=100',
            ]);
        $logoPath = $company->logo;

        if ($request->hasFile('logo')) {
            // Delete the old logo if it exists
            if ($logoPath) {
            $oldLogoPath = public_path('storage/' . $logoPath);
                if (file_exists($oldLogoPath)) {
                    unlink($oldLogoPath);
                }
            }
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        $company->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'address' => $request->input('address'),
            'logo' => $logoPath,
        ]);

        return redirect()->route('company.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::find($id);

        if ($company) {
            if ($company->logo) {
                $logoPath = public_path('storage/' . $company->logo);
                if (file_exists($logoPath)) {
                    unlink($logoPath);
                }
            }
            $company->delete();
            return redirect()->route('company.index')->with('success', 'Company deleted successfully.');
        }

        return redirect()->route('company.index')->with('error', 'Company not found.');
    }
}

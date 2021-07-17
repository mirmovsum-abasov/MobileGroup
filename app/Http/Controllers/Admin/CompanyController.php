<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompaniesRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CompaniesRequest $request, Company $company)
    {
        if ($request->validated()) {
            if ($request->hasFile('logo')) {
                $logo = $request->logo->hashName();
                $request->logo->storeAs('/', $logo, 'public');
                $request = new Request($request->all());
                $request->merge(['logo' => $logo]);
            }
            $company::create($request->all());
            return Redirect::route('companies.index')->with('message', 'Item created successfully!');
        }

        return Redirect::route('companies.create');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('admin.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CompaniesRequest $request, Company $company)
    {
        if ($request->validated()) {
            if ($request->hasFile('logo')) {
                $logo = $request->logo->hashName();
                if ($logo) unlink(public_path() . '/storage/' . $company->logo);
                $request->logo->storeAs('/', $logo, 'public');
                $request = new Request($request->all());
                $request->merge(['logo' => $logo]);
            }
            $company->update($request->all());
            return Redirect::route('companies.index')->with('message', 'Item created successfully!');
        }
        return Redirect::route('companies.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Company $company)
    {
        $message = $company->name . " successfully deleted!";
        if ($company->logo) unlink(public_path() . '/storage/' . $company->logo);
        $company->delete();

        return Redirect::route('companies.index')->with('message', $message);
    }
}

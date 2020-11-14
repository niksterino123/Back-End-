<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $companies = Company::all();
        $employees = Employee::all();

        return view('main', compact(['companies', 'employees']));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $company = new Company();
        $company->create($request->except('_token'));

        return redirect()->back();
    }

    /**
     * @param Company $company
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Company $company)
    {

        return view('company_edit', compact('company'));
    }

    /***
     * @param Request $request
     * @param Company $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Company $company)
    {
        $company->update($request->except('_token'));

        return redirect()->route('company.index');
    }

    /**
     * @param Company $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Company $company)
    {
        $company->destroy($company->id);

        return redirect()->back();
    }
}

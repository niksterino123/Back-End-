<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $employee = new Employee();
        $employee->create($request->except('_token'));

        return redirect()->back();
    }

    /**
     * @param Employee $employee
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Employee $employee)
    {

        return view('employee_edit', compact('employee'));
    }


    /**
     * @param Request $request
     * @param Employee $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->except('_token'));

        return redirect()->route('company.index');
    }

    /**
     * @param Employee $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Employee $employee)
    {

        $employee->destroy($employee->id);

        return redirect()->back();
    }
}

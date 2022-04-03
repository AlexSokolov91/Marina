<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeCategory;
use App\Models\Service;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('admin.employee.index', [
            'employees' => Employee::with(['employeeCategorie', 'service'])->paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.employee.create', [
            'services'   => Service::all(),
            'categories' => EmployeeCategory::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|integer',
            'employee_category_id' => 'required|integer',
            'price' => 'required|integer',
        ]);
        $newEmployee = new Employee();
        $newEmployee->service_id = $request->service_id;
        $newEmployee->employee_category_id = $request->employee_category_id;
        $newEmployee->price = $request->price;
        $newEmployee->save();
        return redirect()->route('admin-management.employee');
    }

    public function edit(Employee $employee)
    {
        return view('admin.employee.edit', [
           'employee' => $employee,
           'categories' => EmployeeCategory::all(),
           'services' => Service::all(),
        ]);
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'service_id' => 'required|integer',
            'employee_category_id' => 'required|integer',
            'price' => 'required|integer',
        ]);

        $employee->update(
            [
                'service_id' => $request->service_id,
                'employee_category_id' => $request->employee_category_id,
                'price' => $request->price,
            ],
        );
        return redirect()->route('admin-management.employee');
    }

    public function delete(Employee $employee)
    {
        $employee->delete();
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmployeeCategory;
use Illuminate\Http\Request;

class EmployeeCategoryController extends Controller
{
    public function index()
    {
        return view('admin.employee-category.index',
        [
            'employees' => EmployeeCategory::all()
        ]);
    }

    public function create()
    {
        return view('admin.employee-category.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:employee_categories|max:255',
            'description' => 'required|min:3|max:255'
        ]);

        $newEmployeeCategory = new EmployeeCategory();
        $newEmployeeCategory->name = $request->name;
        $newEmployeeCategory->description = $request->description;
        $newEmployeeCategory->save();
        return redirect()->route('admin-management.employee-category');
    }

    public function edit(EmployeeCategory $employeeCategory)
    {
        return view('admin.employee-category.edit',
        [
            'employeeCategory' => $employeeCategory
        ]);
    }

    public function update(Request $request, EmployeeCategory $employeeCategory)
    {
        $validated = $request->validate([
            'name' => 'required|unique:employee_categories,id,$employeeCategory->id|max:255',
            'description' => 'required|min:3|max:255'
        ]);

        $employeeCategory->update(
            [
                'name' => $request->name,
                'description' => $request->description,
            ],
        );

        return redirect()->route('admin-management.employee-category');
    }

    public function delete(EmployeeCategory $employeeCategory)
    {
        $employeeCategory->delete();
        return redirect()->back();
    }
}

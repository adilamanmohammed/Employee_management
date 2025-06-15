<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    // Show the single manage page
    public function manage()
    {
        return view('employees.manage');
    }

    // Create employee
    public function createAction(Request $request)
    {
        $request->validate([
            'FirstName' => 'required|string|max:50',
            'LastName' => 'required|string|max:50',
            'Email' => 'required|email|max:100',
            'Department' => 'nullable|string|max:50',
            'Salary' => 'nullable|numeric',
            'HireDate' => 'nullable|date',
        ]);

        Employee::create($request->all());

        return response()->json(['message' => 'Employee created successfully.']);
    }

    // Update employee
    public function updateAction(Request $request)
    {
        $request->validate([
            'EmployeeID' => 'required|integer|exists:Employees,EmployeeID',
            'FirstName' => 'nullable|string|max:50',
            'LastName' => 'nullable|string|max:50',
            'Email' => 'nullable|email|max:100',
            'Department' => 'nullable|string|max:50',
            'Salary' => 'nullable|numeric',
            'HireDate' => 'nullable|date',
        ]);

        $employee = Employee::findOrFail($request->EmployeeID);

        $data = $request->only(['FirstName', 'LastName', 'Email', 'Department', 'Salary', 'HireDate']);
        $data = array_filter($data, function($value) {
            return !is_null($value);
        });

        $employee->update($data);

        return response()->json(['message' => 'Employee updated successfully.']);
    }

    // Fetch all employees
    public function fetchAllAction()
    {
        $employees = Employee::all();
        return response()->json(['employees' => $employees]);
    }

    // Delete employee
    public function deleteAction(Request $request)
    {
        $request->validate([
            'EmployeeID' => 'required|integer|exists:Employees,EmployeeID',
        ]);

        $employee = Employee::findOrFail($request->EmployeeID);
        $employee->delete();

        return response()->json(['message' => 'Employee deleted successfully.']);
    }
}

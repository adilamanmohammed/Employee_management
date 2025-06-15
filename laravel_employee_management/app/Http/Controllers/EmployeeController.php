<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    // Show the single manage page
    // This method returns the view for managing employees
    public function manage()
    {
        return view('employees.manage');
    }

    // Create employee
    // This method handles the creation of a new employee record
    public function createAction(Request $request)
    {
        // Validate the incoming request data for creating an employee
        $request->validate([
            'FirstName' => 'required|string|max:50',
            'LastName' => 'required|string|max:50',
            'Email' => 'required|email|max:100',
            'Department' => 'nullable|string|max:50',
            'Salary' => 'nullable|numeric',
            'HireDate' => 'nullable|date',
        ]);

        // Create a new employee record using mass assignment
        Employee::create($request->all());

        // Return a JSON response indicating success
        return response()->json(['message' => 'Employee created successfully.']);
    }

    // Update employee
    // This method handles updating an existing employee record
    public function updateAction(Request $request)
    {
        // Validate the incoming request data for updating an employee
        $request->validate([
            'EmployeeID' => 'required|integer|exists:Employees,EmployeeID',
            'FirstName' => 'nullable|string|max:50',
            'LastName' => 'nullable|string|max:50',
            'Email' => 'nullable|email|max:100',
            'Department' => 'nullable|string|max:50',
            'Salary' => 'nullable|numeric',
            'HireDate' => 'nullable|date',
        ]);

        // Find the employee record by ID or fail with 404
        $employee = Employee::findOrFail($request->EmployeeID);

        // Extract only the fields that are present in the request
        $data = $request->only(['FirstName', 'LastName', 'Email', 'Department', 'Salary', 'HireDate']);
        // Remove any null values to avoid overwriting existing data with null
        $data = array_filter($data, function($value) {
            return !is_null($value);
        });

        // Update the employee record with the filtered data
        $employee->update($data);

        // Return a JSON response indicating success
        return response()->json(['message' => 'Employee updated successfully.']);
    }

    // Fetch all employees
    // This method retrieves all employee records from the database
    public function fetchAllAction()
    {
        // Get all employees using Eloquent ORM
        $employees = Employee::all();
        // Return the employees as a JSON response
        return response()->json(['employees' => $employees]);
    }

    // Delete employee
    // This method handles deleting an employee record
    public function deleteAction(Request $request)
    {
        // Validate the incoming request data for deleting an employee
        $request->validate([
            'EmployeeID' => 'required|integer|exists:Employees,EmployeeID',
        ]);

        // Find the employee record by ID or fail with 404
        $employee = Employee::findOrFail($request->EmployeeID);
        // Delete the employee record
        $employee->delete();

        // Return a JSON response indicating success
        return response()->json(['message' => 'Employee deleted successfully.']);
    }
}

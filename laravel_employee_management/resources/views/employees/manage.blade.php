@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Manage Employees</h1>

    <div class="mb-4">
        <label for="actionSelect" class="block mb-2 font-semibold">Select Action:</label>
        <select id="actionSelect" class="border border-gray-300 rounded px-3 py-2 w-full max-w-xs">
            <option value="">-- Choose an action --</option>
            <option value="create">Create Employee</option>
            <option value="update">Update Employee</option>
            <option value="fetch">Fetch All Employees</option>
            <option value="delete">Delete Employee</option>
        </select>
    </div>

    <div id="formContainer" class="mt-6">
        <!-- Forms will be dynamically shown here -->
    </div>

    <div id="resultContainer" class="mt-6">
        <!-- Results or messages will be shown here -->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Setup CSRF token for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });

    $('#actionSelect').change(function() {
        const action = $(this).val();
        $('#formContainer').empty();
        $('#resultContainer').empty();

        if (action === 'create') {
            $('#formContainer').html(`
                <h2 class="text-xl font-semibold mb-2">Create Employee</h2>
                <form id="createForm">
                    <input type="text" name="FirstName" placeholder="First Name" required class="border p-2 mb-2 w-full max-w-xs" />
                    <input type="text" name="LastName" placeholder="Last Name" required class="border p-2 mb-2 w-full max-w-xs" />
                    <input type="email" name="Email" placeholder="Email" required class="border p-2 mb-2 w-full max-w-xs" />
                    <input type="text" name="Department" placeholder="Department" class="border p-2 mb-2 w-full max-w-xs" />
                    <input type="number" step="0.01" name="Salary" placeholder="Salary" class="border p-2 mb-2 w-full max-w-xs" />
                    <input type="date" name="HireDate" placeholder="Hire Date" class="border p-2 mb-2 w-full max-w-xs" />
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Create</button>
                </form>
            `);
        } else if (action === 'update') {
            $('#formContainer').html(`
                <h2 class="text-xl font-semibold mb-2">Update Employee</h2>
                <form id="updateForm">
                    <input type="number" name="EmployeeID" placeholder="Employee ID" required class="border p-2 mb-2 w-full max-w-xs" />
                    <input type="text" name="FirstName" placeholder="First Name" class="border p-2 mb-2 w-full max-w-xs" />
                    <input type="text" name="LastName" placeholder="Last Name" class="border p-2 mb-2 w-full max-w-xs" />
                    <input type="email" name="Email" placeholder="Email" class="border p-2 mb-2 w-full max-w-xs" />
                    <input type="text" name="Department" placeholder="Department" class="border p-2 mb-2 w-full max-w-xs" />
                    <input type="number" step="0.01" name="Salary" placeholder="Salary" class="border p-2 mb-2 w-full max-w-xs" />
                    <input type="date" name="HireDate" placeholder="Hire Date" class="border p-2 mb-2 w-full max-w-xs" />
                    <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded">Update</button>
                </form>
            `);
        } else if (action === 'fetch') {
            $('#formContainer').html(`
                <h2 class="text-xl font-semibold mb-2">All Employees</h2>
                <button id="fetchAllBtn" class="bg-green-600 text-white px-4 py-2 rounded">Fetch Employees</button>
                <div id="employeesList" class="mt-4"></div>
            `);
        } else if (action === 'delete') {
            $('#formContainer').html(`
                <h2 class="text-xl font-semibold mb-2">Delete Employee</h2>
                <form id="deleteForm">
                    <input type="number" name="EmployeeID" placeholder="Employee ID" required class="border p-2 mb-2 w-full max-w-xs" />
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Delete</button>
                </form>
            `);
        }
    });

    // Handle Create
    $(document).on('submit', '#createForm', function(e) {
        e.preventDefault();
        const data = $(this).serialize();
        $.post('{{ route("employees.createAction") }}', data, function(response) {
            $('#resultContainer').html('<div class="bg-green-100 p-4 rounded">' + response.message + '</div>');
        }).fail(function(xhr) {
            $('#resultContainer').html('<div class="bg-red-100 p-4 rounded">Error: ' + xhr.responseJSON.message + '</div>');
        });
    });

    // Handle Update
    $(document).on('submit', '#updateForm', function(e) {
        e.preventDefault();
        const data = $(this).serialize();
        $.post('{{ route("employees.updateAction") }}', data, function(response) {
            $('#resultContainer').html('<div class="bg-green-100 p-4 rounded">' + response.message + '</div>');
        }).fail(function(xhr) {
            $('#resultContainer').html('<div class="bg-red-100 p-4 rounded">Error: ' + xhr.responseJSON.message + '</div>');
        });
    });

    // Handle Fetch All
    $(document).on('click', '#fetchAllBtn', function() {
        $.get('{{ route("employees.fetchAllAction") }}', function(response) {
            if (response.employees && response.employees.length > 0) {
                let html = '<table class="min-w-full bg-white border border-gray-200"><thead><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Department</th><th>Salary</th><th>Hire Date</th></tr></thead><tbody>';
                response.employees.forEach(emp => {
                    html += `<tr>
                        <td>${emp.EmployeeID}</td>
                        <td>${emp.FirstName}</td>
                        <td>${emp.LastName}</td>
                        <td>${emp.Email}</td>
                        <td>${emp.Department}</td>
                        <td>${emp.Salary}</td>
                        <td>${emp.HireDate}</td>
                    </tr>`;
                });
                html += '</tbody></table>';
                $('#employeesList').html(html);
            } else {
                $('#employeesList').html('<p>No employees found.</p>');
            }
        }).fail(function(xhr) {
            $('#resultContainer').html('<div class="bg-red-100 p-4 rounded">Error: ' + xhr.responseJSON.message + '</div>');
        });
    });

    // Handle Delete
    $(document).on('submit', '#deleteForm', function(e) {
        e.preventDefault();
        const data = $(this).serialize();
        $.post('{{ route("employees.deleteAction") }}', data, function(response) {
            $('#resultContainer').html('<div class="bg-green-100 p-4 rounded">' + response.message + '</div>');
        }).fail(function(xhr) {
            $('#resultContainer').html('<div class="bg-red-100 p-4 rounded">Error: ' + xhr.responseJSON.message + '</div>');
        });
    });
});
</script>
@endsection

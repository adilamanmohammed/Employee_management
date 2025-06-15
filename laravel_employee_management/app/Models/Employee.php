<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // Disable timestamps management (created_at, updated_at)
    public $timestamps = false;

    // Specify the table associated with the model
    protected $table = 'employees';

    // Specify the primary key column
    protected $primaryKey = 'EmployeeID';

    // Specify the fillable fields for mass assignment
    protected $fillable = [
        'FirstName',
        'LastName',
        'Email',
        'Department',
        'Salary',
        'HireDate',
    ];
}

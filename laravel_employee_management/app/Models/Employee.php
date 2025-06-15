<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps = false;

    protected $table = 'employees';

    protected $primaryKey = 'EmployeeID';

    protected $fillable = [
        'FirstName',
        'LastName',
        'Email',
        'Department',
        'Salary',
        'HireDate',
    ];
}

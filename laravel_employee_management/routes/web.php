<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('employees/manage', [EmployeeController::class, 'manage'])->name('employees.manage');

Route::post('employees/create-action', [EmployeeController::class, 'createAction'])->name('employees.createAction');
Route::post('employees/update-action', [EmployeeController::class, 'updateAction'])->name('employees.updateAction');
Route::get('employees/fetch-all-action', [EmployeeController::class, 'fetchAllAction'])->name('employees.fetchAllAction');
Route::post('employees/delete-action', [EmployeeController::class, 'deleteAction'])->name('employees.deleteAction');

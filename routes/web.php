<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/employees', [EmployeeController::class, 'index']);
Route::resource('employees', EmployeeController::class);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/departments', [DashboardController::class, 'index']);

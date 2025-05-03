<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
class DashboardController extends Controller
{
    //
    public function index() {
        $departments = Department::withCount('employees')->get();
        return view('dashboard.index', compact('departments'));
    }
    
}

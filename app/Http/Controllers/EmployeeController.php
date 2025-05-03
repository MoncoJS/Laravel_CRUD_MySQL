<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Department;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $departments = Department::where('depStatus', 1)->get();
        return view('employees.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'empNo' => 'required|string',
            'empName' => 'required|string',
            'empDepID' => 'required|integer',
            'empSalary' => 'required|integer',
            'empManager' => 'nullable|integer',
            'empStatus' => 'required|integer',
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'เพิ่มพนักงานเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
        $departments = Department::where('depStatus', 1)->get();
        return view('employees.edit', compact('employee', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
        $request->validate([
            'empNo' => 'required|string',
            'empName' => 'required|string',
            'empDepID' => 'required|integer',
            'empSalary' => 'required|integer',
            'empManager' => 'nullable|integer',
            'empStatus' => 'required|integer',
        ]);

        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'อัปเดตพนักงานเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'ลบพนักงานเรียบร้อยแล้ว');
    }
}

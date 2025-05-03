<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'depName' => 'required|string',
            'depStatus' => 'required|integer',
        ]);

        Department::create($request->all());
        return redirect()->route('departments.index')->with('success', 'เพิ่มแผนกเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $department)
    {
        //
        return view('departments.edit', compact('department'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $department)
    {
        //
        $request->validate([
            'depName' => 'required|string',
            'depStatus' => 'required|integer',
        ]);

        $department->update($request->all());
        return redirect()->route('departments.index')->with('success', 'อัปเดตแผนกเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $department): RedirectResponse
    {
        //
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'ลบแผนกเรียบร้อยแล้ว');
    }
}

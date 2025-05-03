@extends('layouts.index')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">เพิ่มพนักงาน</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">รหัสพนักงาน</label>
                    <input type="text" name="empNo" class="form-control" placeholder="EMP0000" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">ชื่อพนักงาน</label>
                    <input type="text" name="empName" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">แผนก</label>
                    <select name="empDepID" class="form-select">
                        @foreach ($departments as $dep)
                            <option value="{{ $dep->id }}">{{ $dep->depName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">เงินเดือน</label>
                    <input type="number" name="empSalary" class="form-control" placeholder="0฿" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">รหัสผู้จัดการ</label>
                    <input type="number" name="empManager" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">สถานะ</label>
                    <select name="empStatus" class="form-select">
                        <option value="1">ทำงาน</option>
                        <option value="0">ลาออก</option>
                    </select>
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary">บันทึก</button>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">ยกเลิก</a>
            </div>
        </form>
    </div>
</div>
@endsection

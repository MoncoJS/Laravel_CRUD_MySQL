@extends('layouts.index')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">รายชื่อพนักงาน</h4>
    <a href="{{ route('employees.create') }}" class="btn btn-primary">เพิ่มพนักงาน</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>รหัส</th>
                    <th>ชื่อ</th>
                    <th>แผนก</th>
                    <th>เงินเดือน</th>
                    <th>ผู้จัดการ</th>
                    <th>สถานะ</th>
                    <th width="150">การจัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $emp)
                <tr>
                    <td>{{ $emp->empNo }}</td>
                    <td>{{ $emp->empName }}</td>
                    <td>{{ $emp->empDepID }}</td>
                    <td>{{ number_format($emp->empSalary, 2) }}</td>
                    <td>{{ $emp->empManager }}</td>
                    <td>{!! $emp->empStatus ? '<span class="badge bg-success">ทำงาน</span>' : '<span class="badge bg-danger">ลาออก</span>' !!}</td>
                    <td>
                        <a href="{{ route('employees.edit', $emp->id) }}" class="btn btn-sm btn-warning">แก้ไข</a>
                        <form action="{{ route('employees.destroy', $emp->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('ยืนยันการลบ?')">ลบ</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

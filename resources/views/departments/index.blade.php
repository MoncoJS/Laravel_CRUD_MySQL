@extends('layouts.index')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">รายชื่อแผนก</h4>
    <a href="{{ route('departments.create') }}" class="btn btn-primary">เพิ่มแผนก</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>รหัส</th>
                    <th>ชื่อแผนก</th>
                    <th>สถานะ</th>
                    <th width="150">การจัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $dep)
                    <tr>
                        <td>{{ $dep->id }}</td>
                        <td>{{ $dep->depName }}</td>
                        <td>{!! $dep->depStatus ? '<span class="badge bg-success">เปิด</span>' : '<span class="badge bg-danger">ปิด</span>' !!}</td>
                        <td>
                            <a href="{{ route('departments.edit', $dep->id) }}" class="btn btn-sm btn-warning">แก้ไข</a>
                            <form action="{{ route('departments.destroy', $dep->id) }}" method="POST" class="d-inline">
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

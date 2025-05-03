@extends('layouts.index')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">เพิ่มแผนก</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('departments.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">ชื่อแผนก</label>
                <input type="text" name="depName" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">สถานะ</label>
                <select name="depStatus" class="form-select">
                    <option value="1">เปิด</option>
                    <option value="0">ปิด</option>
                </select>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary">บันทึก</button>
                <a href="{{ route('departments.index') }}" class="btn btn-secondary">ยกเลิก</a>
            </div>
        </form>
    </div>
</div>
@endsection

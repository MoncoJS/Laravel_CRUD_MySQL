
<h1>แก้ไขพนักงาน</h1>
<form action="{{ route('employees.update', $employee->id) }}" method="POST">
    @csrf
    @method('PUT')
    รหัสพนักงาน: <input type="text" name="empNo" value="{{ $employee->empNo }}"><br>
    ชื่อพนักงาน: <input type="text" name="empName" value="{{ $employee->empName }}"><br>
    แผนก:
    <select name="empDepID">
        @foreach ($departments as $dep)
            <option value="{{ $dep->id }}" {{ $employee->empDepID == $dep->id ? 'selected' : '' }}>
                {{ $dep->depName }}
            </option>
        @endforeach
    </select><br>
    เงินเดือน: <input type="number" name="empSalary" value="{{ $employee->empSalary }}"><br>
    รหัสผู้จัดการ (ใส่เลขหรือเว้นว่าง): <input type="number" name="empManager" value="{{ $employee->empManager }}"><br>
    สถานะ (1=เปิด, 0=ปิด): <input type="number" name="empStatus" value="{{ $employee->empStatus }}"><br>
    <button type="submit">อัปเดต</button>
</form>

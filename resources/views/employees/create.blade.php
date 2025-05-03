<h1>เพิ่มพนักงาน</h1>
<form action="{{ route('employees.store') }}" method="POST">
    @csrf
    รหัสพนักงาน: <input type="text" name="empNo"><br>
    ชื่อพนักงาน: <input type="text" name="empName"><br>
    แผนก:
    <select name="empDepID">
        @foreach ($departments as $dep)
            <option value="{{ $dep->id }}">{{ $dep->depName }}</option>
        @endforeach
    </select><br>
    เงินเดือน: <input type="number" name="empSalary"><br>
    รหัสผู้จัดการ (ใส่เลขหรือเว้นว่าง): <input type="number" name="empManager"><br>
    สถานะ (1=เปิด, 0=ปิด): <input type="number" name="empStatus"><br>
    <button type="submit">บันทึก</button>
</form>

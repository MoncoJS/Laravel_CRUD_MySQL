<h1>รายชื่อพนักงาน</h1>
<a href="{{ route('employees.create') }}">เพิ่มพนักงาน</a>
<table border="1" cellpadding="5">
    <tr>
        <th>รหัส</th>
        <th>ชื่อ</th>
        <th>แผนก</th>
        <th>เงินเดือน</th>
        <th>ผู้จัดการ</th>
        <th>สถานะ</th>
        <th>การจัดการ</th>
    </tr>
    @foreach ($employees as $emp)
    <tr>
        <td>{{ $emp->empNo }}</td>
        <td>{{ $emp->empName }}</td>
        <td>{{ $emp->empDepID }}</td>
        <td>{{ $emp->empSalary }}</td>
        <td>{{ $emp->empManager }}</td>
        <td>{{ $emp->empStatus }}</td>
        <td>
            <a href="{{ route('employees.edit', $emp->id) }}">แก้ไข</a>
            <form action="{{ route('employees.destroy', $emp->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">ลบ</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

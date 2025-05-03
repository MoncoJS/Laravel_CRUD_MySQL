<h1>เพิ่มแผนก</h1>
<form action="{{ route('departments.store') }}" method="POST">
    @csrf
    ชื่อแผนก: <input type="text" name="depName"><br>
    สถานะ (1=เปิด, 0=ปิด): <input type="number" name="depStatus"><br>
    <button type="submit">บันทึก</button>
</form>

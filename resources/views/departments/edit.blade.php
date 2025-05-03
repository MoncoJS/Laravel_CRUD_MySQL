<h1>แก้ไขแผนก</h1>
<form action="{{ route('departments.update', $department->id) }}" method="POST">
    @csrf
    @method('PUT')
    ชื่อแผนก: <input type="text" name="depName" value="{{ $department->depName }}"><br>
    สถานะ (1=เปิด, 0=ปิด): <input type="number" name="depStatus" value="{{ $department->depStatus }}"><br>
    <button type="submit">อัปเดต</button>
</form>

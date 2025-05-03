<h1>รายชื่อแผนก</h1>
<a href="{{ route('departments.create') }}">เพิ่มแผนก</a>
<table border="1" cellpadding="5">
    <tr>
        <th>รหัส</th>
        <th>ชื่อแผนก</th>
        <th>สถานะ</th>
        <th>การจัดการ</th>
    </tr>
    @foreach ($departments as $dep)
    <tr>
        <td>{{ $dep->id }}</td>
        <td>{{ $dep->depName }}</td>
        <td>{{ $dep->depStatus }}</td>
        <td>
            <a href="{{ route('departments.edit', $dep->id) }}">แก้ไข</a>
            <form action="{{ route('departments.destroy', $dep->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">ลบ</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<h1>Dashboard</h1>
<table>
    @foreach ($departments as $dep)
    <tr>
        <td>{{ $dep->depName }}</td>
        <td>{{ $dep->employees_count }} คน</td>
    </tr>
    @endforeach
</table>
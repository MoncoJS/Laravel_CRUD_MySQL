@extends('layouts.index')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">Dashboard</h4>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>แผนก</th>
                    <th>จำนวนพนักงาน</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $dep)
                    <tr>
                        <td>{{ $dep->depName }}</td>
                        <td>{{ $dep->employees_count }} คน</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

<!-- resources/views/students/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Danh sách Sinh viên</h1>
    <a href="{{ route('students.create') }}" class="btn btn-success">Thêm mới</a>

    @if(count($students) > 0)
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Ngày sinh</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->dob }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Sửa</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>Không có sinh viên nào.</p>
    @endif
@endsection

<!-- resources/views/students/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Sửa Sinh viên</h1>

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Tên:</label>
            <input type="text" name="name" class="form-control" value="{{ $student->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $student->email }}" required>
        </div>
        <div class="form-group">
            <label for="dob">Ngày sinh:</label>
            <input type="date" name="dob" class="form-control" value="{{ $student->dob }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
    </form>
@endsection

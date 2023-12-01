<!-- resources/views/students/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Thêm mới Sinh viên</h1>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Tên:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="dob">Ngày sinh:</label>
            <input type="date" name="dob" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Thêm mới</button>
    </form>
@endsection

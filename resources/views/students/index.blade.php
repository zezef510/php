<!-- resources/views/students/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Danh sách Sinh viên</h1>
    <!-- Hiển thị danh sách sinh viên -->
    @foreach($students as $student)
        {{ $student->name }} - {{ $student->email }} - {{ $student->dob }}<br>
    @endforeach
@endsection

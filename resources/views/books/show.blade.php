@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Chi tiết sách</h1>
        <table class="table table-bordered">
            <tr>
                <th>Tên sách</th>
                <td>{{ $book->name }}</td>
            </tr>
            <tr>
                <th>Tác giả</th>
                <td>{{ $book->author }}</td>
            </tr>
            <tr>
                <th>Thể loại</th>
                <td>{{ $book->category }}</td>
            </tr>
            <tr>
                <th>Năm xuất bản</th>
                <td>{{ $book->year }}</td>
            </tr>
            <tr>
                <th>Số lượng</th>
                <td>{{ $book->quantity }}</td>
            </tr>
        </table>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Quay lại</a>
    </div>
@endsection

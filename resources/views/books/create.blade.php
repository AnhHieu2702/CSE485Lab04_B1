@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Thêm sách mới</h1>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên sách</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Tác giả</label>
                <input type="text" name="author" id="author" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Thể loại</label>
                <input type="text" name="category" id="category" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Năm xuất bản</label>
                <input type="number" name="year" id="year" class="form-control" min="1900" max="{{ date('Y') }}" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Số lượng</label>
                <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
            </div>
            <button type="submit" class="btn btn-success">Thêm sách</button>
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Chỉnh sửa bản ghi mượn</h1>

        <!-- Hiển thị lỗi nếu có -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('borrows.update', $borrow->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Trường ẩn cho book_id và reader_id -->
            <input type="hidden" name="book_id" value="{{ $borrow->book_id }}">
            <input type="hidden" name="reader_id" value="{{ $borrow->reader_id }}">

            <!-- Hiển thị thông tin người mượn -->
            <div class="form-group">
                <label for="reader_id">Người mượn</label>
                <input type="text" class="form-control" value="{{ $borrow->reader->name }}" disabled>
            </div>

            <!-- Hiển thị thông tin quyển sách -->
            <div class="form-group">
                <label for="book_id">Quyển sách</label>
                <input type="text" class="form-control" value="{{ $borrow->book->name }}" disabled>
            </div>

            <!-- Ngày mượn -->
            <div class="form-group">
                <label for="borrow_date">Ngày mượn</label>
                <input type="date" class="form-control" name="borrow_date" value="{{ $borrow->borrow_date }}" required>
            </div>

            <!-- Ngày trả -->
            <div class="form-group">
                <label for="return_date">Ngày trả</label>
                <input type="date" class="form-control" name="return_date" value="{{ $borrow->return_date }}">
            </div>

            <!-- Trạng thái mượn trả -->
            <div class="form-group">
                <label for="status">Trạng thái</label>
                <select class="form-control" name="status" id="status" required>
                    <option value="1" {{ $borrow->status == 1 ? 'selected' : '' }}>Đang mượn</option>
                    <option value="0" {{ $borrow->status == 0 ? 'selected' : '' }}>Đã trả</option>
                </select>
            </div>

            <!-- Nút hành động -->
            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            <a href="{{ route('borrows.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
@endsection

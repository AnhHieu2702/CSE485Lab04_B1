@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Chỉnh sửa bản ghi mượn</h1>
        <form action="{{ route('borrows.update', $borrow->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="book_id">Quyển sách</label>
                <select name="book_id" id="book_id" class="form-control" required>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}" {{ $borrow->book_id == $book->id ? 'selected' : '' }}>{{ $book->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="reader_id">Người mượn</label>
                <select name="reader_id" id="reader_id" class="form-control" required>
                    @foreach($readers as $reader)
                        <option value="{{ $reader->id }}" {{ $borrow->reader_id == $reader->id ? 'selected' : '' }}>{{ $reader->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="borrow_date">Ngày mượn</label>
                <input type="date" name="borrow_date" id="borrow_date" class="form-control" value="{{ $borrow->borrow_date }}" required>
            </div>

            <div class="form-group">
                <label for="return_date">Ngày trả</label>
                <input type="date" name="return_date" id="return_date" class="form-control" value="{{ $borrow->return_date }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
@endsection
//
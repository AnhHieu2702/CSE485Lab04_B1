
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tạo mới bản ghi mượn</h1>

        <form action="{{ route('borrows.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="book_id">Quyển sách</label>
                <select name="book_id" id="book_id" class="form-control">
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->name }}</option>
                    @endforeach
                </select>
                @error('book_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="user_id">Người mượn</label>
                <select name="reader_id" id="reader_id" class="form-control">
                @foreach($readers as $reader)
                        <option value="{{ $reader->id }}">{{ $reader->name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="borrow_date">Ngày mượn</label>
                <input type="date" name="borrow_date" id="borrow_date" class="form-control" value="{{ old('borrow_date') }}">
                @error('borrow_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="return_date">Ngày trả</label>
                <input type="date" name="return_date" id="return_date" class="form-control" value="{{ old('return_date') }}">
                @error('return_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Lưu</button>
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Chỉnh sửa bản ghi mượn</h1>

        <form action="{{ route('borrows.update', $borrow->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="book_id">Quyển sách</label>
                <select name="book_id" id="book_id" class="form-control">
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}" {{ $book->id == $borrow->book_id ? 'selected' : '' }}>
                            {{ $book->title }}
                        </option>
                    @endforeach
                </select>
                @error('book_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="user_id">Người mượn</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $borrow->user_id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="borrow_date">Ngày mượn</label>
                <input type="date" name="borrow_date" id="borrow_date" class="form-control" value="{{ $borrow->borrow_date }}">
                @error('borrow_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="return_date">Ngày trả</label>
                <input type="date" name="return_date" id="return_date" class="form-control" value="{{ $borrow->return_date }}">
                @error('return_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Cập nhật</button>
        </form>
    </div>
@endsection

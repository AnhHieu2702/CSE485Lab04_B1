@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sửa Độc giả</h1>
        <form action="{{ route('readers.update', $reader->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Tên:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $reader->name }}" required>
            </div>
            <div class="form-group">
                <label for="birthday">Ngày sinh:</label>
                <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $reader->birthday }}" required>
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $reader->address }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $reader->phone }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection

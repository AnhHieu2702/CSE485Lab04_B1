<!-- resources/views/borrows/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Danh sách các bản ghi mượn</h1>
        <a href="{{ route('borrows.create') }}" class="btn btn-primary">Tạo mới bản ghi mượn</a>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Quyển sách</th>
                    <th>Người mượn</th>
                    <th>Ngày mượn</th>
                    <th>Ngày trả</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrows as $borrow)
                    <tr>
                        <td>{{ $borrow->id }}</td>
                        <td>{{ $borrow->book->name }}</td>
                        <td>{{ $borrow->reader->name }}</td>
                        <td>{{ $borrow->borrow_date }}</td>
                        <td>{{ $borrow->return_date }}</td>
                        <td>
                            <a href="{{ route('borrows.show', $borrow->id) }}" class="btn btn-info">Xem</a>
                            <a href="{{ route('borrows.edit', $borrow->id) }}" class="btn btn-warning">Chỉnh sửa</a>
                            <form action="{{ route('borrows.destroy', $borrow->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Danh sách Độc giả</h1>
        <a href="{{ route('readers.create') }}" class="btn btn-primary mb-3">Thêm mới</a>
        @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Ngày sinh</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($readers as $reader)
                    <tr>
                        <td>{{ $reader->id }}</td>
                        <td>{{ $reader->name }}</td>
                        <td>{{ $reader->birthday }}</td>
                        <td>{{ $reader->address }}</td>
                        <td>{{ $reader->phone }}</td>
                        <td>
                            <a href="{{ route('readers.show', $reader->id) }}" class="btn btn-info btn-sm">Xem</a>
                            <a href="{{ route('readers.edit', $reader->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('readers.destroy', $reader->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Không có độc giả nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-3">
        {{ $readers->onEachSide(1)->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection

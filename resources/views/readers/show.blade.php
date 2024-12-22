@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Chi tiết Độc giả</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>Tên:</strong> {{ $reader->name }}</p>
                <p><strong>Ngày sinh:</strong> {{ $reader->birthday }}</p>
                <p><strong>Địa chỉ:</strong> {{ $reader->address }}</p>
                <p><strong>Số điện thoại:</strong> {{ $reader->phone }}</p>
            </div>

            
        </div>
        <a href="{{ route('readers.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
    </div>
@endsection

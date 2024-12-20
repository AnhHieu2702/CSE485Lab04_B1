@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Chi tiết bản ghi mượn</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Quyển sách: {{ $borrow->book->title }}</h5>
                <p class="card-text"><strong>Người mượn:</strong> {{ $borrow->user->name }}</p>
                <p class="card-text"><strong>Ngày mượn:</strong> {{ $borrow->borrow_date }}</p>
                <p class="card-text"><strong>Ngày trả:</strong> {{ $borrow->return_date }}</p>
            </div>
        </div>

        <a href="{{ route('borrows.index') }}" class="btn btn-primary mt-3">Quay lại danh sách</a>
    </div>
@endsection

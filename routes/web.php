<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BorrowController;
Route::get('/', function () {
    return view('layouts.app');
});
Route::resource('borrows', BorrowController::class);

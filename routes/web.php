<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BorrowController;
Route::get('/', function () {
    return view('welcome');
});
Route::resource('borrows', BorrowController::class);

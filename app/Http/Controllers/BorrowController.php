<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Book;
use App\Models\Reader;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrows = Borrow::all();
        return view('borrows.index', compact('borrows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::all();
        $readers = Reader::all();
        return view('borrows.create', compact('books', 'readers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'reader_id' => 'required|exists:readers,id',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date',
            'status' => 'required|boolean',
        ]);

        // Lưu vào cơ sở dữ liệu
        Borrow::create([
            'book_id' => $request->book_id,
            'reader_id' => $request->reader_id,
            'borrow_date' => $request->borrow_date,
            'return_date' => $request->return_date,
            'status' => $request->status,
        ]);

        return redirect()->route('borrows.index')->with('success', 'Mượn sách thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $borrow = Borrow::findOrFail($id);
        return view('borrows.show', compact('borrow'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $borrow = Borrow::findOrFail($id);
        $books = Book::all();
        $readers = Reader::all();
        return view('borrows.edit', compact('borrow', 'books', 'readers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'reader_id' => 'required|exists:readers,id',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date',
            'status' => 'required|boolean',
        ]);


        $borrow = Borrow::findOrFail($id);
        $borrow->update([
            'book_id' => $request->book_id,
            'reader_id' => $request->reader_id,
            'borrow_date' => $request->borrow_date,
            'return_date' => $request->return_date,
            'status' => $request->status,
        ]);

        return redirect()->route('borrows.index')->with('success', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $borrow = Borrow::findOrFail($id);
        $borrow->delete();
        return redirect()->route('borrows.index')->with('success', 'Đã xóa bản ghi mượn!');
    }
    //
}

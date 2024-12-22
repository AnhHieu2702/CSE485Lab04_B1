<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('id', 'desc')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'quantity' => 'required|integer|min:1',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Thêm sách thành công.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'quantity' => 'required|integer|min:1',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Cập nhật sách thành công.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        $book->borrows()->delete();

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Xóa sách thành công.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        #eval(\Psy\sh());
        $books = Book::all();

        return view('book/index',compact('books'));

    }
    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return view('book/edit',compact('book'));
    }
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->name = $request->name;
        $book->price = $request->price;
        $book->author = $request->author;
        $book->save();

        return redirect("/book");
    }
    public function create()
{
    // 空の$bookを渡す
    $book = new Book();
    return view('book/create', compact('book'));
}

public function store(Request $request)
{
    $book = new Book();
    $book->name = $request->name;
    $book->price = $request->price;
    $book->author = $request->author;
    $book->save();

    return redirect("/book");
}
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect("/book");
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Policies\BookPolicy;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('title', 'asc')->paginate(10);
        return view('books.index', compact('books'));
    }
    public function create()
    {
        $this->authorize('create', Book::class);
        return view('books.create');
    }
    public function store()
    {
        $this->authorize('create', Book::class);
        $data = request()->validate([
            'title' => 'required',
            'author' => 'required|string',
            'room' => 'required|integer',
            'bookshelf' => 'required|integer',
            'shelf' => 'required|integer',
            'position' => 'required|integer',
        ]);
        $book = new Book();
        $book->title = $data['title'];
        $book->room = $data['room'];
        $book->bookshelf = $data['bookshelf'];
        $book->shelf = $data['shelf'];
        $book->position = $data['position'];
        $book->save();
        $author = new Author();
        $author->name = $data['author'];
        $author->save();
        $book->authors()->attach($author);
        return redirect('/books');
    }
    public function search()
    {
        
    }
}

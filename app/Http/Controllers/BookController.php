<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
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
        //dd(auth()->user());
        $this->authorize('create', Book::class);
        return view('books.create');
    }
    public function store()
    {
        $this->authorize('create', Book::class);
    }
    public function search()
    {
        
    }
}

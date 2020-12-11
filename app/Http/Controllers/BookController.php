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
            'title' => 'required|string',
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
        //dodawanie nowego autora lub autorów
        $authors = explode(',', $data['author']);
        foreach($authors as $author) {
            $author = trim($author);
            $existing = Author::where('name', $author);
            //sprawdzanie czy juz taki istnieje
            if($existing->count()) {
                $book->authors()->attach($existing->first());
            } else {
                $newauthor = new Author();
                $newauthor->name = $author;
                $newauthor->save();
                $book->authors()->attach($newauthor);
            }
        }
        return redirect('/books');
    }
    public function search()
    {
        $data = request()->validate([
            'query' => 'required|string'
        ]);
        $query = $data['query'];
        //szukanie wg wzoru
        if(preg_match('/^[0-9]*-[0-9]*$/', $query)) {
            $query = explode('-', $query);
            $books = Book::where('room', $query[0])->where('bookshelf', $query[1])->get();
        } elseif(preg_match('/^[0-9]*-[0-9]*-[0-9]*$/', $query)) {
            $query = explode('-', $query);
            $books = Book::where('room', $query[0])->where('bookshelf', $query[1])->where('shelf', $query[2])->get();
        } elseif(preg_match('/^[0-9]*-[0-9]*-[0-9]*-[0-9]*$/', $query)) {
            $query = explode('-', $query);
            $books = Book::where('room', $query[0])->where('bookshelf', $query[1])->where('shelf', $query[2])->where('position', $query[3])->get();
        } else {
            //szukanie po autorze
            $author = Author::where('name', 'like', "%$query%")->first();
            $books = $author ? $author->books()->get() : [];
        }
        return view('books.index', compact('books'));
    }
}

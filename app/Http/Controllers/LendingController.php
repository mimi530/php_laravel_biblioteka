<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Lending;

class LendingController extends Controller
{
    public function create(Book $book)
    {
        $book = Book::findOrFail($_GET['id']);
        return view('lendings.create', compact('book'));
    }
    public function store()
    {
        $book = Book::findOrFail($_GET['book_id']);
        $todayDate = date('Y-m-d');
        $data = request()->validate([
            'lend_start' => 'required|date|after_or_equal:'.$todayDate,
            'lend_end' => 'required|date|after_or_equal:lend_start',
        ]);
        $lending = new Lending();
        $lending['user_id'] = auth()->user()->id;
        $lending['book_id'] = $book->id;
        $lending['lend_start'] = $data['lend_start'];
        $lending['lend_end'] = $data['lend_end'];
        $lending->save();
        return redirect('/books');
    }
    public function index()
    {
        if(auth()->user()->role==='librarian') {
            $lendings = Lending::orderBy('lend_end')->get();
            return view('lendings.index', compact('lendings'));
        } else {
            $lendings = auth()->user()->lendings()->orderBy('lend_end')->get();
            return view('lendings.index', compact('lendings'));
        }
    }
    public function destroy(Lending $lending)
    {
        $this->authorize('delete', $lending);
        $lending->delete();
        return redirect('/lendings');
    }
}

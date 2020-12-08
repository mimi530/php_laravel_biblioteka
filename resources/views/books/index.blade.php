@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="get" action="{{ route('books.search') }}">
                <div class="row">
                    <div class="col-10 pr-1">
                        <input type="text" name="query" placeholder="Wyszukaj książkę" class="form-control">
                    </div>
                    <div class="col-2 pl-0">
                        <input type="submit" value="Szukaj" class="form-control btn btn-primary">
                    </div>
                </div>
            </form>
            <table class="table mt-5">
                <thead class="thead-dark text-center align-middle">
                    <tr>
                        <th scope="col">Autor</th>
                        <th scope="col">Tytuł</th>
                        <th scope="col">Pokój</th>
                        <th scope="col">Szafa</th>
                        <th scope="col">Półka</th>
                        <th scope="col">Pozycja</th>
                        <th scope="col">Dostępność</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr class="text-center align-middle">
                        <th scope="row" class="align-middle">
                            @foreach($book->authors as $author)
                                {{ $loop->first ? '' : ', ' }}
                                {{ $author->name }}
                            @endforeach
                        </th>
                        <td class="align-middle">{{ $book->title }}</td>
                        <td class="align-middle">{{ $book->room }}</td>
                        <td class="align-middle">{{ $book->bookshelf }}</td>
                        <td class="align-middle">{{ $book->shelf }}</td>
                        <td class="align-middle">{{ $book->position }}</td>
                        <td class="align-middle">
                            <button class="btn btn-primary m-0 p-1">Wypożycz!</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

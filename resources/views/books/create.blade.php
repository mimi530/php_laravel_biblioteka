@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('books.store') }}">
                @csrf
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-right">Tytuł książki</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autofocus>

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="author" class="col-md-4 col-form-label text-md-right">Autor/zy</label>

                    <div class="col-md-6">
                        <input id="author" type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ old('author') }}" required>
                        <small>Jeśli jest wielu, oddzielić przecinkiem</small>
                        @error('author')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="room" class="col-md-4 col-form-label text-md-right">Numer pokoju</label>

                    <div class="col-md-6">
                        <input id="room" type="number" class="form-control @error('room') is-invalid @enderror" name="room" required>

                        @error('room')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="bookshelf" class="col-md-4 col-form-label text-md-right">Numer szafki</label>

                    <div class="col-md-6">
                        <input id="bookshelf" type="number" class="form-control @error('bookshelf') is-invalid @enderror" name="bookshelf" required>

                        @error('bookshelf')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="shelf" class="col-md-4 col-form-label text-md-right">Numer półki</label>

                    <div class="col-md-6">
                        <input id="shelf" type="number" class="form-control @error('shelf') is-invalid @enderror" name="shelf" required>

                        @error('shelf')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="position" class="col-md-4 col-form-label text-md-right">Numer pozycji</label>

                    <div class="col-md-6">
                        <input id="position" type="number" class="form-control @error('position') is-invalid @enderror" name="position" required>

                        @error('position')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-3 text-center">
                        <button type="submit" class="btn btn-primary w-50">
                            Dodaj
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

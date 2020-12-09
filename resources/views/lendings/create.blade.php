@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
                Wypożycz książkę: <h5 class="d-inline-block mb-4">{{ $book->title }}</h5>
            <form method="POST" action="{{ route('lendings.store', ['book_id' => $book->id]) }}">
                @csrf
                <div class="form-group row">
                    <label for="lend_start" class="col-md-4 col-form-label text-md-right">Wypożycz od:</label>

                    <div class="col-md-6">
                        <input id="lend_start" type="date" class="form-control @error('lend_start') is-invalid @enderror" name="lend_start" value="{{ old('lend_start') }}" required>

                        @error('lend_start')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lend_end" class="col-md-4 col-form-label text-md-right">Wypożycz do:</label>

                    <div class="col-md-6">
                        <input id="lend_end" type="date" class="form-control @error('lend_end') is-invalid @enderror" name="lend_end" value="{{ old('lend_end') }}" required>

                        @error('lend_end')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-3">
                        <button type="submit" class="btn btn-primary">
                            Wypożycz
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

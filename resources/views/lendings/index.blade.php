@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table mt-5">
                <thead class="thead-dark text-center align-middle">
                    <tr>
                        @can('viewAll', App\Models\Lending::class)
                            <th scope="col" class="align-middle">Czytelnik</th>
                        @endcan
                        <th scope="col" class="align-middle">Autor</th>
                        <th scope="col" class="align-middle">Tytuł</th>
                        <th scope="col" class="align-middle">Data wypożyczenia</th>
                        <th scope="col" class="align-middle">Data końca wypożyczenia</th>
                        @can('delete', App\Models\Lending::class)
                        <th class="align-middle">Zwrot</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                @foreach($lendings as $lending)
                <tr class="text-center align-middle">
                    @can('viewAll', App\Models\Lending::class)
                        <th class="align-middle">{{ $lending->user->name }}</th>
                    @endcan
                    <td scope="row" class="align-middle">
                    @foreach($lending->book->authors as $author)
                        {{ $loop->first ? '' : ', ' }}
                        {{ $author->name }}
                    @endforeach
                    </td>
                    <td class="align-middle">{{ $lending->book->title }}</td>
                    <td class="align-middle">{{ $lending->lend_start }}</td>
                    <td class="align-middle {{ date('Y-m-d')>$lending->lend_end ? 'text-danger' : ''}}">
                        {{ $lending->lend_end }}
                    </td>
                    @can('delete', App\Models\Lending::class)
                        <td class="align-middle">
                            <form method="post" action="{{route('lendings.destroy', $lending->id)}}">
                            @method('delete')
                            @csrf
                            <input type="submit" value="Oddana" class="btn btn-primary">
                            </form>
                        </td>
                    @endcan
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

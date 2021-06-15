@extends('layout.main')

@section('content')

    <div class="container">
        <h1 class="mb-5">COMICS</h1>

        @if (session('deleted'))
            <div class="alert alert-success">
                <strong>{{ session('deleted') }}</strong>
                Secuccesfylly deleted.
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($comics as $comic)
                    <tr>
                        <td>{{ $comic->id }}</td>
                        <td>{{ $comic->title }}</td>
                        <td>{{ $comic->price }} €</td>
                        <td>
                            <a class="btn btn-success"
                                href=" {{ route ('comics.show', $comic->id) }}">
                            SHOW
                            </a>
                        </td>
                        <td>
                             <a class="btn btn-primary"
                                href=" {{ route ('comics.edit', $comic->id) }}">
                            EDIT
                            </a>
                        </td>
                        <td>
                            <form action="{{route ('comics.destroy', $comic->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <input class="btn btn-danger" type="submit" value="DELETE" />
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

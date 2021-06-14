@extends('layout.main')

@section('content')

    <div class="container">
        <h1>{{ $comic->title }}</h1>

        <div class="mb-5">
            <span class="badge bg-primary">{{ $comic->type }}</span>
        </div>

        <div class="row mb-5">
            <div class="col-md-6 text-center">
                <img class="img-responsive " src="{{ $comic->thumb}}" alt="{{ $comic->title }}">
            </div>
            <div class="col-md-6">
                <div class="description mb-2">
                    <h2>Prezzo: {{ $comic->price }} €</h2>
                    <h4>Serie: {{ $comic->series }}</h4>
                    <span>Data di vendita: {{ $comic->sale_date }}</span>
                </div>
                <p>{!! $comic->description !!}</p>
            </div>
        </div>

        <a href="{{ route('comics.index') }}">Back to archive</a>
    </div>
@endsection

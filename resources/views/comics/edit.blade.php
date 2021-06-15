@extends('layout.main')

@section('content')
    <div class="container">
        <h1 class="mb-5">
            EDIT COMIC
            <a href="{{ route('comics.show', $comic->id) }}"> {{ $comic->title }}</a>
        </h1>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action=" {{ route('comics.update', $comic->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="title" class="control-label">Title</label>
                        <input for="text" class="form-control" name="title" id="title"
                                value="{{ $comic->title }}">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="control-label">Description</label>
                        <textarea  class="form-control" name="description" id="description" rows="6">{{ $comic->description}}</textarea>
                    </div>


                    <div class="mb-3">
                        <label for="image" class="control-label">Thumb</label>
                        <input  type="text" class="form-control" name="thumb" id="thumb" value="{{ $comic->thumb }}">
                    </div>

                    <div class="mb-3">
                        <label for="price" class="control-label">Price</label>
                        <input  type="text" class="form-control" name="price" id="price" value="{{ $comic->price }}">
                    </div>

                    <div class="mb-3">
                        <label for="series" class="control-label">Series</label>
                        <input for="series" class="form-control" name="series" id="series" value="{{ $comic->series }}">
                    </div>

                    <div class="mb-3">
                        <label for="sale_date" class="control-label">Sale Date</label>
                        <input
                            class="form-control"
                            for="sale_date"
                            type="date"
                            data-date-format="yyyy-mm-dd"
                            value="{{ $comic->sale_date }}"
                            name="sale_date"
                            id="dale_date"
                        >
                    </div>

                    <div class="mb-3">
                        <label for="type" class="control-label">Type</label>
                        <select  class="form-control" name="type" id="type">
                            <option
                                value="comic book"
                                @if($comic->type =='comic book') selected @endif>
                                comic book
                            </option>
                            <option
                                value="graphic novel"
                                 @if($comic->type =='graphic novel') selected @endif>
                                 graphic novel
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('comics.index') }}">Back to archive</a>

                </form>
            </div>
        </div>
    </div>
@endsection

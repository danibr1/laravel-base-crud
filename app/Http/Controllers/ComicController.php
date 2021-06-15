<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;
use Illuminate\Support\Str;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get comics from DB
        $comics = Comic::orderBy('id', 'desc')->get();

        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        dump($data);

        // VALIDAZIONE

        // INSERT DB_DATABASE
        $new_comic = new Comic();

        // A
        // $new_comic->title = $data['title'];
        // $new_comic->slug =  Str::slug( $new_comic->title, '-');
        // $new_comic->description = $data['description'];
        // $new_comic->thumb = $data['thumb'];
        // $new_comic->price = $data['price'];
        // $new_comic->series = $data['series'];
        // $new_comic->sale_date = $data['sale_date'];
        // $new_comic->type = $data['type'];

        // B MASS ASSIGN
        $data['slug'] = Str::slug( $data['title'], '-');
        $new_comic->fill($data); // <--!!  Nel MODEL dichiarare i fillable !!


        $new_comic-> save();

        // REDIRECT TO COMIC DETAIL (SHOW)
        return redirect()->route('comics.show',$new_comic->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /**
         * GET COMIC BY ID
         */
        $comic = Comic::find($id);

         if($comic) {
            return view('comics.show', compact('comic'));
        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        if($comic) {
            return view('comics.edit', compact('comic'));
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Get data from data
        $data = $request->all();

        // Get comic by id
        $comic = Comic::find($id);

        $comic['slug'] = Str::slug( $comic['title'], '-');

        $comic->update($data); // !!! Fillable nel model !!!

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        // $comic = Comic::find($id);
        $comic->delete();

        return redirect()->route('comics.index')->with('deleted', $comic->title);
    }
}

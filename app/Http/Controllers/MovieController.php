<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Http\Resources\MovieResoruce;
use App\Http\Resources\MoviesResource;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $count = Movie::get()->count();
        $term = request()->input('term');
        $skip = request()->input('skip', 0);
        $take = request()->input('take', 10);

        $metadata = [
            'total' => $count
        ];

        if ($term) {
            return response()->json([
                'data' => Movie::search($term, $skip, $take),
                'metadata' => $metadata
            ]);
        } else {
            return response()->json([
                'data' => Movie::skip($skip)->take($take)->get(),
                'metadata' => $metadata
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
        $data = $request->validated();

        $movie = Movie::create($data);
        return new MovieResoruce($movie);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new MovieResoruce(Movie::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, $id)
    {
        $data = $request->validated();
        $movie = Movie::findOrFail($id);
        $movie->update($data);
        return new MovieResoruce($movie);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
            $movie = Movie::findOrFail($id);
            return $movie->delete();
    }
}

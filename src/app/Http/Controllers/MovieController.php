<?php

namespace App\Http\Controllers;

use App\Repositories\Movies\MovieRepository;
use App\Http\Requests\StoreMovie;
use App\Http\Resources\Movie as MovieResource;
use App\Http\Resources\MovieCollection;
use App\Http\Services\Movies\MovieService;
use App\Movie;
use App\Showtime;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Service instance
     */
    private $movieService;

    
    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new MovieCollection(MovieRepository::getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovie $request)
    {
        $movie = $this->movieService->saveMovie($request->all());

        return new MovieResource($movie);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return new MovieResource($movie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        if (! $this->movieService->deleteMovie($movie)) {
            return response()->json([
                'message' => 'Abort deletion. This movie has showtimes assigned.'
            ], 400);   
        }

        return response()->json(null, 204);
    }

    public function assignShowtime(Movie $movie, Request $request)
    {
        $showTime = Showtime::findOrFail($request->get('showtime_id'));

        try {

            $movie = $this->movieService->assignShowtime($movie, $showTime);

        } catch (\Exception $e) {

            return response([
                'message' => $e->getMessage()
            ], 400);
        }

        return new MovieResource($movie);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShowtime;
use App\Http\Resources\Showtime as ShowtimeResource;
use App\Http\Resources\ShowtimeCollection;
use App\Repositories\Movies\ShowtimeRepository;
use App\Services\Showtimes\ShowtimeFactory;
use App\Showtime;

class ShowtimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ShowtimeCollection(ShowtimeRepository::getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShowtime $request)
    {
        $showTime = ShowtimeFactory::createObj($request->all());

        return new ShowtimeResource($showTime);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Showtime  $showtime
     * @return \Illuminate\Http\Response
     */
    public function show(Showtime $showtime)
    {
        return new ShowtimeResource($showtime);
    }
}

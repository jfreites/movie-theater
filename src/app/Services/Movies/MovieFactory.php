<?php

namespace App\Http\Services\Movies;

use App\Movie;

class MovieFactory
{
    /**
     * Create a new instance of the Movie class
     */
    public static function createObj(array $data) : Movie
    {
        return Movie::create([
            'title' => $data['title'],
            'poster' => $data['poster'],
            'published_at' => $data['published_at'],
        ]) ?? new Movie();

    }
}
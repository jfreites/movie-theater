<?php

namespace App\Repositories\Movies;

use App\Movie;
use Illuminate\Database\Eloquent\Collection;

class MovieRepository
{
    /**
     * Get all the movie orderd by ID desc
     */
    public static function getAll(array $search = []) : Collection
    {
        // Use search for something
        return Movie::latest()->get();
    }
}
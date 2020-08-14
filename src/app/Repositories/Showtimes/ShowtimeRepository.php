<?php

namespace App\Repositories\Movies;

use App\Showtime;
use Illuminate\Database\Eloquent\Collection;

class ShowtimeRepository
{
    /**
     * Get all the records
     */
    public static function getAll(array $search = []) : Collection
    {
        // UTODO: a search funcionality can be implemented here...
        return Showtime::all();
    }
}
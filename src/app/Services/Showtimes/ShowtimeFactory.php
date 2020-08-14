<?php

namespace App\Services\Showtimes;

use App\Showtime;

class ShowtimeFactory
{
    /**
     * Create a new instance of the Showtime class
     */
    public static function createObj(array $data) : Showtime
    {
        return Showtime::create([
            'started_at' => $data['started_at'],
            'active' => $data['active'],
        ]) ?? new Showtime();

    }
}
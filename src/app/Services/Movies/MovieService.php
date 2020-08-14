<?php

namespace App\Http\Services\Movies;

use App\Movie;
use App\Showtime;
use JD\Cloudder\Facades\Cloudder;

/**
 * MovieService class
 */
class MovieService
{
    /**
     * Upload the poster to Cloudinary, return the public url and create a new record...
     */
    public function saveMovie(array $data) : Movie
    {
        $imageName = $data['poster']->getRealPath();
        
        $cloudder = Cloudder::upload($imageName, null)->getResult();

        $data['poster'] = $cloudder['url'];

        return MovieFactory::createObj($data);
    }

    /**
     * Assign a showtime to a Movie
     */
    public function assignShowtime(Movie $movie, Showtime $showTime) : Movie
    {
        if (! (bool) $showTime->active) {
            throw new \Exception('This showtime is not active');
        }

        $exists = $movie->showtimes->contains($showTime);

        if ($exists) {
            throw new \Exception('This showtime was already assigned to this movie');
        }

        // assign the showtime
        $movie->showtimes()->attach($showTime);

        return $movie->refresh();
    }


    /**
     * Delete a movie
     */
    public function deleteMovie(Movie $movie) : bool
    {
        if ($movie->showtimes->count() > 0) {
            return false;
        }

        return $movie->delete();
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
{
    protected $fillable = ['title', 'published_at', 'poster'];

    protected $dates = ['published_at'];


    /**
     * The showtimes for a Movie
     */
    public function showtimes() : BelongsToMany
    {
        return $this->belongsToMany(Showtime::class);
    }
}

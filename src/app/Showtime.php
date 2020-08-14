<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Showtime extends Model
{
    protected $fillable = ['started_at', 'active'];


    /**
     * The movies with this showtime
     */
    public function showtimes() : BelongsToMany
    {
        return $this->belongsToMany(Movie::class);
    }
}

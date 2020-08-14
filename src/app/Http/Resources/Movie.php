<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Showtime as ShowtimeResource;

class Movie extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'published_at' => $this->published_at->format('Y-m-d'),
            'poster' => $this->poster,
            'showtimes' => ShowtimeResource::collection($this->showtimes)
        ];
    }
}

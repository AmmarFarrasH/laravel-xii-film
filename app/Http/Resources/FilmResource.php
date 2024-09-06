<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'title'     => $this->title,
            'sinopsis'  => $this->sinopsis,
            'year'      => $this->year,
            'poster'    => $this->poster,
            'genre_id'  => $this->genre->name,
            'komentar'  => $this->kritik()->pluck('comment'),
            'actor'     => $this->peran->map(function($peran){
                return [
                    'actor'=>$peran->actor,
                    'cast'=>$peran->cast->name,
                ];
            })
        ];
    }
}

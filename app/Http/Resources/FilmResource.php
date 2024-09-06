<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'sinopsis' => $this->sinopsis,
            'poster' => $this->poster,
            'year' => $this->year,
            'genre_id' => $this->genre->name,
            'komentar'=> $this-> kritik()->pluck('comment'),
            'actor'=> $this->peran->map(function($peran){
                return [
                    'actor'=>$peran->actor,
                    'cast' =>$peran->cast->name,
                ];
            }),
        ];
    }
}
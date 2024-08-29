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
            'genre_id' => $this->genre_id,
            'komentar'=> $this-> kritiks->pluck('comment'),
            'actor'=> $this->perans->map(function($peran){
                return [
                    'actor'=>$peran->actor,
                    'cast' =>$peran->cast->name,
                ];
            }),
        ];
    }
}
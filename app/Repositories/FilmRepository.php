<?php

namespace App\Repositories;
use App\Models\Film;
use App\Interfaces\FilmRepositoryInterface;
class FilmRepository implements FilmRepositoryInterface
{
    public function index(){ //nampilin data
        return Film::all();
    }

    public function store(array $data) { //nampilin data
        return Film::create($data);
    }

    public function getById($id, $relations = [])
    {
        return Film::with($relations)->find($id);
    }
}


<?php

namespace App\Interfaces;
// use App\Models\Film;

use App\Interfaces\FilmRepositoryInterface;

interface FilmRepositoryInterface
{
    //
    public function index();
    public function getById($id);
    public function store(array $data);
}

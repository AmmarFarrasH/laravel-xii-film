<?php

namespace App\Interfaces;

interface FilmRepositoryInterface
{
    public function index();
    public function getById($id, $relations = []);
    public function store(array $data);
    
}


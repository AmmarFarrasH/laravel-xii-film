<?php

namespace App\Http\Controllers\Api;
use App\Repositories\FilmRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\ApiResponseClass;
use App\Http\Resources\FilmResource;
use App\Http\Requests\Api\StoreFilmRequest;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    private FilmRepository $filmRepositoryInterface;
    
    public function __construct(FilmRepository $filmRepositoryInterface)
    {
        $this->filmRepositoryInterface = $filmRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->filmRepositoryInterface->index();

        return ApiResponseClass::sendResponse(FilmResource::collection($data),'',200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFilmRequest $request)
    {
        $posterPath = $request->file('poster')->store('images');

        $details =[
            'title' => $request->title,
            'sinopsis' => $request->sinopsis,
            'year' => $request->year,
            'poster' => $posterPath,
            'genre_id' => $request->genre_id,

        ];
        DB::beginTransaction();
        try{
             $film = $this->filmRepositoryInterface->store($details);

             DB::commit();
             return ApiResponseClass::sendResponse(new FilmResource($film),'Film has been Created Successfully',201);

            } catch(\Exception $ex) {
                DB::rollback();
                return ApiResponseClass::rollback($ex);
            }
            
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $film = $this->filmRepositoryInterface->getById($id);
        return ApiResponseClass::sendResponse(new FilmResource($film), '', 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateDetails =[
            'title' => $request->title,
            'sinopsis' => $request->sinopsis,
            'year' => $request->year,
            'poster' => $request->poster,
            'genres_id' => $request->genres_id
        ];
        DB::beginTransaction();
        try{
             $film = $this->filmRepositoryInterface->update($updateDetails, $id);

             DB::commit();
             return ApiResponseClass::sendResponse('Film Updated Successfully',201);

        } catch(\Exception $ex) {
    DB::rollback();
    return ApiResponseClass::rollback($ex);
}

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->FilmRepositoryInterface->delete($id);

        return ApiResponseClass::sendResponse('Film Deleted Successfully','',204);
    }
}

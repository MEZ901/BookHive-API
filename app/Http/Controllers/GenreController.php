<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use App\Http\Resources\Genres\GenreResource;
use App\Http\Resources\Genres\GenreCollection;

class GenreController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:api','can:show genres'])->only(['index', 'show']);
        $this->middleware(['auth:api','can:show genre'])->only('show');
        $this->middleware(['auth:api','can:add genre'])->only('store');
        $this->middleware(['auth:api','can:edit genre'])->only('update');
        $this->middleware(['auth:api','can:delete genre'])->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        $genres = Genre::all();
        return response()->json([
            "status" => true,
            "results" => new GenreCollection($genres)
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGenreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGenreRequest $request): \Illuminate\Http\JsonResponse
    {
        $genre = Genre::create($request->all());
        return response()->json([
            "status" => true,
            "message" => "genre added successfully",
            "results" => new GenreResource($genre)
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            "status" => true,
            "results" => new GenreResource($genre)
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGenreRequest  $request
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGenreRequest $request, Genre $genre): \Illuminate\Http\JsonResponse
    {
        $genre->update($request->all());
        return response()->json([
            "status" => true,
            "message" => "Genre has been updated successfully",
            "results" => new GenreResource($genre)
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre): \Illuminate\Http\JsonResponse
    {
        $genre->delete();
        return response()->json([
            'status' => true,
            'message' => 'Genre deleted successfully'
        ], 200);
    }
}

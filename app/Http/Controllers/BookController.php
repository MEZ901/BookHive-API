<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\Book\BookResource;
use App\Http\Resources\Book\BookCollection;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $books = null;
        if($request->has('genre')){
            $books = Book::whereHas('genre', function ($query) use ($request) {
                $query->where('name', $request->genre);
            })->get();
        }else{
            $books = Book::all();
        }
        return response()->json([
            "message" => true,
            "results" => new BookCollection($books)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request): \Illuminate\Http\JsonResponse
    {
        $books = Book::create($request->all());
        return response()->json([
            "status" => true,
            "message" => "Book has been added !",
            "results" => new BookResource($books)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($isbn): \Illuminate\Http\JsonResponse
    {
        $book = Book::where('isbn', $isbn)->first();
        return response()->json([
            "status" => true,
            "results" => new BookResource($book)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($isbn): \Illuminate\Http\JsonResponse
    {
        $book = Book::where('isbn', $isbn)->first();
        if ($book) {
            $book->delete();
            return response()->json([
                "status" => true,
                "message" => "Book has been deleted !"
            ]);
        } 
        return response()->json([
            "status" => false,
            "message" => "Book not found !"
        ]);
    }
}

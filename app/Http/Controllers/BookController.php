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

    public function __construct(){
        $this->middleware(['auth:api','can:show books'])->only(['index', 'show']);
        $this->middleware(['auth:api','can:show book'])->only('show');
        $this->middleware(['auth:api','can:add book'])->only('store');
        $this->middleware(['auth:api','can:edit book'])->only('update');
        $this->middleware(['auth:api','can:delete book'])->only('destroy');
    }
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
    public function update(UpdateBookRequest $request, $isbn): \Illuminate\Http\JsonResponse
    {
        $book = Book::where('isbn', $isbn)->first();
        $book->update($request->all());
        return response()->json([
            "status" => true,
            "message" => "Book has been updated!",
            "results" => new BookResource($book)
        ]);
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

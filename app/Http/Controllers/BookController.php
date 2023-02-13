<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::latest()->paginate(10);
        return [
            "data"=>$books
        ];
    }

    // public function getAllBook(Request $request)
    // {
    //     // if ($request->has("where"))
    //     $books = Book::latest()->paginate(10);
    //     return [
    //         "data"=>$books
    //     ];
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|string|max:255|unique:books',
            'body' => 'required|string',
            'rating' => 'required|numeric|between:1,5'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        $book = Book::create($request->all());
        return [
            "data"=>$book
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return [
            "data"=>$book
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        // $request->validate([

        // ]);
        $validator = Validator::make($request->all(),[
            'title' => 'string|max:255|unique:books',
            'body' => 'string',
            'rating' => 'numeric|between:1,5'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        $book->update($request->all());
        return [
            "msg"=>"Book's info successfully updated",
            "data"=>$book,
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return [
            "msg"=>"Book successfully deleted",
            "data"=>$book,
        ];
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book=DB::select('select * from books;');

        return response()->json(['Books' => $book], 200);
    }

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
        $book= new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->year= $request->year;
        $book->price = $request->price;
        if($book->save()){
            return response()->json([
                'added'=> 'book added'
            ]);
        }
        return response()->json([
            'message' => 'ERROR'
        ], 401);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Book::where('id', $id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $res = Book::where('id', $id)->update(["title"=>$request->title, "author"=>$request->author, "year"=>$request->year, "price"=>$request->price]);
       if($res == 1){
          return response()->json([
            'Update' => 'updated'
        ], 200);
       }
       return response()->json([
            'Message' => 'Error'
        ], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Book::where('id', $id)->delete();
        if($res == 1){
            return response()->json([
                'message' => 'Deleted'
            ], 200);
        }return response()->json([
            'message' => 'ERROR'
        ], 401);
    }
}

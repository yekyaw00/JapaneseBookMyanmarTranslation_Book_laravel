<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; 

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        
        return view('Book.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Book.addbook');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $extension = $request->file('book_photo')->getClientOriginalExtension();
        $filename = $request->book_name.Str::random(9).'.'.$extension;

        $request->file('book_photo')->storeAs(
            'public/image', //path
            $filename
        );

        $filepath = '/storage/image/'.$filename;

        $book = Book::create(['book_name'=>$request->book_name,'book_photo'=>$filepath, 'level'=>$request->level]);
    
        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {   
        
        $chapters = $book->chapters->sortBy('chapter_name');
      return view('Book.detailbook', compact('book','chapters')); 
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('Book.editbook',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {   
        if (!$request->hasFile('book_photo')) {
            $book->update([
                "book_name" => $request->book_name,
                "book_photo" => $request->oldphoto,
                "level" => $request->level
            ]);
        } else {
            $extension = $request->file('book_photo')->getClientOriginalExtension();
            $filename = $request->book_name . Str::random(9) . '.' . $extension;

            $request->file('book_photo')->storeAs(
                'public/image', //path
                $filename
            );

            $filepath = '/storage/image/' . $filename;

            $book = $book->update(['book_name' => $request->book_name, 'book_photo' => $filepath, 'level' => $request->level]);

           
        } return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserBookController extends Controller
{
    public function index() {
        $books = Book::all();
        return view('User.index',compact('books'));
    }

    public function userBookDetail(Book $book){
        
        $chapters = $book->chapters->load('vocabularies');
        return view('User.userbookdetail',compact('book','chapters'));
    }

    public function searchBook(Request $request){
        $name = $request->book_name;
        $books = DB::table('books')->where('book_name', 'LIKE', '%' . $name . '%')
            ->get();
        return view('User.search',compact('books'));
    }

}

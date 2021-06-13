<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){

        if (\request()->ajax()){
            $books = Book::whenSearch(\request()->search)->get();
            return $books;
        }
        if (\request()->category_name != null) {
            $books = Book::whenCategory(request()->category_name)
                ->whenSearch(\request()->search)->paginate(5);

        }
        if (\request()->publishing_house_name != null) {
            $books = Book::whenPublishingHouse(request()->publishing_house_name)
                ->paginate(5);

        }
        if (\request()->author_name != null) {
            $books = Book::whenAuthor(request()->author_name)
                ->paginate(5);

        }



        return view('site.books.index',compact('books'));
    }

    public function show(Book $book){

        $related_books = Book::where('id','!=',$book->id)
            ->whereHas('category',function ($query) use ($book){
                return $query->whereIn('category_id',$book->category->pluck('id')->toArray());
            })->get();
        return view('site.books.show',compact('book','related_books'));
    }
}

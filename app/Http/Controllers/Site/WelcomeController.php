<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\PublishingHouse;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $latest_books = Book::latest()->limit(2)->get();
        $categories = Category::with('books')->get();
        $publishing_houses = PublishingHouse::with('books')->get();
        $authors = Author::with('books')->get();
        return view('site.welcome',compact('latest_books','categories','publishing_houses','authors'));
    }
}

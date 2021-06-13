<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\PublishingHouse;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $books_count = Book::count();
        $categories_count = Category::count();
        $authors_count = Author::count();
        $publishing_houses_count = PublishingHouse::count();
        return view("dashboard.welcome",compact('books_count','categories_count','authors_count','publishing_houses_count'));
    }
}

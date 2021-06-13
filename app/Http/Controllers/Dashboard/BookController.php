<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\PublishingHouse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::select('id','name')->get();
        $books = Book::whenSearch(\request()->search)->whenCategory(request()->category)->paginate(5);

        return view('dashboard.books.index',compact('books','categories','publishing_houses','authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::select('id','name')->get();
        $categories = Category::select('id','name')->get();
        $publishing_houses = PublishingHouse::select('id','name')->get();
        return view('dashboard.books.create',compact('authors','categories','publishing_houses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {

        $request_data = $request->except(['image', 'poster','authors','type']);
        if ($request->poster) {

            $poster = Image::make($request->poster)
                ->resize(255, 378)
                ->encode('jpg');
            Storage::disk('local')->put('public/images/' . $request->poster->hashName(), (string)$poster, 'public');
            $request_data['poster'] = $request->poster->hashName();
        }
        if ($request->image) {

            $image = Image::make($request->image)
                ->encode('jpg', 50);

            Storage::disk('local')->put('public/images/' . $request->image->hashName(), (string)$image, 'public');
            $request_data['image'] = $request->image->hashName();
        }

        $book = Book::create($request_data);
        $book->authors()->attach($request->input('authors'));
        session()->flash('success','Book added successfully');
        return redirect()->route('dashboard.books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {

        $categories = Category::select('id','name')->get();
        $publishing_houses = PublishingHouse::select('id','name')->get();
        $authors = Author::select('id','name')->get();
        return view('dashboard.books.edit',compact('book','categories','publishing_houses','authors'));
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
        $request_data = $request->except(['image', 'poster','authors']);
        if ($request->poster) {
            $poster = Image::make($request->poster)
                ->resize(255, 378)
                ->encode('jpg');
            Storage::disk('local')->put('public/images/' . $request->poster->hashName(), (string)$poster, 'public');
            $request_data['poster'] = $request->poster->hashName();
        }
        if ($request->image) {

            $image = Image::make($request->image)
                ->encode('jpg', 50);

            Storage::disk('local')->put('public/images/' . $request->image->hashName(), (string)$image, 'public');
            $request_data['image'] = $request->image->hashName();
        }

        $book->update($request_data);
        $book->authors()->sync($request->input('authors'));
        session()->flash('success','Book updated successfully');
        return redirect()->route('dashboard.books.index');
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
        session()->flash('success','Book deleted successfully');
        return redirect()->route('dashboard.books.index');
    }
}

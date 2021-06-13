<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Author;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(){
        $authors = Author::withCount('books')->whenSearch(request()->search)->paginate(5);
        return view('dashboard.authors.index',compact('authors'));
    }
    public function create(){
        return view('dashboard.authors.create');
    }

    public function store(AuthorRequest $request)
    {
        $author = Author::Create($request->all());

        session()->flash('success','Author added successfully');

        return redirect()->route('dashboard.authors.index');

    }

    public function edit(Author $author){
        return view('dashboard.authors.edit',compact('author'));
    }

    public function update(AuthorRequest $request,Author $author){

        $author->update($request->all());
        session()->flash('success','Author updated successfully');
        return redirect()->route('dashboard.authors.index');
    }

    public function destroy(Author $author){
        $author->delete();
        session()->flash('success','Author deleted successfully');
        return redirect()->route('dashboard.authors.index');
    }
}

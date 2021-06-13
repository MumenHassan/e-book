<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $categories = Category::withCount('books')->whenSearch(request()->search)->paginate(2);
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create(){
        return view('dashboard.categories.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|unique:categories,name'
        ]);
        Category::create($request->all());
        session()->flash('success','Category added successfully');
        return redirect()->route('dashboard.categories.index');

    }

    public  function edit(Category $category){
        return view('dashboard.categories.edit',compact('category'));
    }

    public function update(Request $request,Category $category){
        $request->validate([
            'name'=>'required|unique:categories,name,'.$category->id,
        ]);
        $category->update($request->all());
        session()->flash('success','Category updated successfully');
        return redirect()->route('dashboard.categories.index');
    }

    public function destroy(Category $category){
        $category->delete();
        session()->flash('success','Category deleted successfully');
        return redirect()->route('dashboard.categories.index');

    }
}

@extends('layouts.dashboard.app')
@section('content')
    <h2>Books</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
{{--            @if(auth()->user()->hasPermission('books_read'))--}}
            <li class="breadcrumb-item"><a href="{{route('dashboard.books.index')}}"> Books</a></li>
{{--            @endif--}}
            <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </nav>

    <div class="tile mb-4">
        <form action="{{route('dashboard.books.store',['type'=> 'store'])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            @include('dashboard.partials._errors')
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Author</label>
                <select name="authors[]" id="" class="form-control select2" multiple>
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">{{$author->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Poster</label>
                <input type="file" name="poster"  class="form-control">
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image"  class="form-control">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">select Category</option>

                    @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Publishing house</label>
                    <select name="publishing_house_id" class="form-control">
                        <option value="">select Publishing house</option>
                        @foreach($publishing_houses as $publishing_house)
                            <option value="{{$publishing_house->id}}">{{$publishing_house->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Version</label>
                    <select name="version" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Date version</label>
                    <input type="text" name="version_date" class="form-control" id="demoDate">
                </div>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="3" name="description" placeholder="Enter your address"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add</button>
            </div>
        </form>
    </div>
@endsection

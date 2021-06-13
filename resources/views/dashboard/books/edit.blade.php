@extends('layouts.dashboard.app')
@section('content')
    <h2>Books</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.books.index')}}"> Books</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <div class="tile mb-4">
        <form action="{{route('dashboard.books.update',$book->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('dashboard.partials._errors')
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{old('name',$book->name)}}">
            </div>
            <div class="form-group">
                <label>Author</label>
                <select name="authors[]" id="" class="form-control select2" multiple>
                    @foreach($authors as $author)
                        <option value="{{$author->id}}" {{in_array($author->id,$book->authors->pluck('id')->toArray()) ? 'selected' :''}}>{{$author->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Poster</label>
                <input type="file" name="poster" class="form-control">
                <img src="{{$book->poster_path}}"  style="width: 150px;height: 200px; margin-top: 10px" alt="s">
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
                <img src="{{$book->image_path}}"  style="width: 150px;height: 200px; margin-top: 10px" alt="s">
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">select Category</option>

                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{in_array($category->id,$book->category->pluck('id')->toArray()) ? 'selected' :''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Publishing house</label>
                    <select name="publishing_house_id" class="form-control">
                        <option value="">select Publishing house</option>
                        @foreach($publishing_houses as $publishing_house)
                            <option value="{{$publishing_house->id}}" {{in_array($publishing_house->id,$book->publishing_house->pluck('id')->toArray()) ? 'selected' :''}}>{{$publishing_house->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Version</label>
                    <select name="version" class="form-control" disabled>
                        <option value="1">1</option>

                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Date version</label>
                    <input type="text" name="version_date" class="form-control" id="demoDate" value="{{old('version_date',$book->version_date)}}" >
                </div>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="3" name="description" > {{old('description',$book->description)}}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</button>
            </div>
        </form>
    </div>
@endsection


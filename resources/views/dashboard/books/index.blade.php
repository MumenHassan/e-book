@extends('layouts.dashboard.app')

@section('content')
    <h2>Books</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Books</li>
        </ol>
    </nav>

    <div class="tile mb-4">
        <div class="row" >
            <div class="col-12">

                <form action="">
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" autofocus placeholder="search"  value="{{request()->search}}">
                        </div>
                    </div> <!-- end of column -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <select name="category" class="form-control">
                                    <option value="">All Categories</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{request()->category == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div> <!-- end of column -->
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Search</button>
{{--                        @if(auth()->user()->hasPermission('books_create'))--}}
                        <a href="{{route('dashboard.books.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
{{--                        @else--}}
{{--                            <a disabled href="#" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>--}}

{{--                        @endif--}}
                    </div> <!-- end of column -->
                    </div><!-- end of row -->
                </form>
            </div> <!-- end of column 12 -->
        </div><!-- end of row -->

        <div class="row" >
            <div class="col-md-12">
                @if($books->count()>0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Version</th>
                            <th>Version Date</th>
                            <th>Authors</th>
                            <th>Category</th>
                            <th>Publishing House</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $index=>$book)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$book->name}}</td>
                                <td>{{Str::limit($book->description,30)}}</td>
                                <td>{{$book->version}}</td>
                                <td>{{$book->version_date}}</td>
                                <td>
                                    @foreach($book->authors as $author)
                                        <p><span class="badge badge-primary">{{$author->name}}</span></p>
                                    @endforeach
                                </td>

                                <td>{{$book->category->name}}</td>
                                <td>{{$book->publishing_house->name}}</td>

                                <td>
{{--                                    @if(auth()->user()->hasPermission('books_update'))--}}
                                    <a href="{{route('dashboard.books.edit',$book->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Edit</a>
{{--                                    @else--}}
{{--                                        <a href="#" disabled class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Edit</a>--}}

{{--                                    @endif--}}
{{--                                        @if(auth()->user()->hasPermission('books_delete'))--}}
                                    <form action="{{route('dashboard.books.destroy',$book->id)}}" method="post" style="display: inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete </button>

                                    </form>
{{--                                        @else--}}
{{--                                            <a href="#" disabled class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete </a>--}}
{{--                                        @endif--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    {{ $books->appends(request()->query())->links() }}
                @else
                    <h3>Sorry,No book found</h3>
                @endif
            </div>
        </div><!-- end of row -->
    </div><!-- end of tile -->
@endsection

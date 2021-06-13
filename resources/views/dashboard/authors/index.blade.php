@extends('layouts.dashboard.app')

@section('content')
    <h2>Authors</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Authors</li>
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
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Search</button>
                        <a href="{{route('dashboard.authors.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                    </div> <!-- end of column -->
                    </div><!-- end of row -->
                </form>
            </div> <!-- end of column 12 -->
        </div><!-- end of row -->

        <div class="row" >
            <div class="col-md-12">
                @if($authors->count()>0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Biography</th>
                            <th>Books Count</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($authors as $index=>$author)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$author->name}}</td>
                                <td>{{$author->email}}</td>
                                <td>{{Str::limit($author->biography,50)}}</td>
                                <td>{{$author->books_count}}</td>

                               {{-- <td>{{ implode(' , ',$author->roles->pluck('name')->toArray()) }}</td>--}}

                                <td>

                                        <a href="{{route('dashboard.authors.edit',$author->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Edit</a>

                                    <form action="{{route('dashboard.authors.destroy',$author->id)}}" method="post" style="display: inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete </button>

                                    </form>

                                </td>

                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    {{ $authors->appends(request()->query())->links() }}
                @else
                    <h3>Sorry,No author found</h3>
                @endif
            </div>
        </div><!-- end of row -->
    </div><!-- end of tile -->
@endsection

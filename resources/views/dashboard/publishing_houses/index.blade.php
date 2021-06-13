@extends('layouts.dashboard.app')

@section('content')
    <h2>Publishing Houses</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Publishing Houses</li>
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
                        <a href="{{route('dashboard.publishing-houses.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                    </div> <!-- end of column -->
                    </div><!-- end of row -->
                </form>
            </div> <!-- end of column 12 -->
        </div><!-- end of row -->

        <div class="row" >
            <div class="col-md-12">
                @if($publishing_houses->count()>0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>Address</th>
                            <th>Books count</th>

                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($publishing_houses as $index=>$publishing_house)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$publishing_house->name}}</td>
                                <td>{{$publishing_house->email}}</td>
                                <td>{{$publishing_house->country}}</td>
                                <td>{{$publishing_house->address}}</td>
                                <td>{{$publishing_house->books_count}}</td>

                               {{-- <td>{{ implode(' , ',$publishing_house->roles->pluck('name')->toArray()) }}</td>--}}

                                <td>

                                        <a href="{{route('dashboard.publishing-houses.edit',$publishing_house->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Edit</a>

                                    <form action="{{route('dashboard.publishing-houses.destroy',$publishing_house->id)}}" method="post" style="display: inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete </button>

                                    </form>

                                </td>

                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    {{ $publishing_houses->appends(request()->query())->links() }}
                @else
                    <h3>Sorry,No publishing house found</h3>
                @endif
            </div>
        </div><!-- end of row -->
    </div><!-- end of tile -->
@endsection

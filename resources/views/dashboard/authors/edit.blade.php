@extends('layouts.dashboard.app')
@section('content')
    <h2>Authors</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.authors.index')}}">Authors</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <div class="tile mb-4">
        <form action="{{route('dashboard.authors.update',$author->id)}}" method="post">
            @csrf
            @method('put')
            @include('dashboard.partials._errors')
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" class="form-control" value="{{old('name',$author->name)}}">

                @error('name')
                <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{old('email',$author->email)}}">
                @error('email')
                <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Biography</label>
                <textarea class="form-control" rows="3" name="biography" > {{old('biography',$author->biography)}}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</button>
            </div>
        </form>
    </div>
@endsection


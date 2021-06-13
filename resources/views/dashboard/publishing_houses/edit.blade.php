@extends('layouts.dashboard.app')
@section('content')
    <h2>Publishing House</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.publishing-houses.index')}}">Publishing House</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <div class="tile mb-4">
        <form action="{{route('dashboard.publishing-houses.update',$publishing_house->id)}}" method="post">
            @csrf
            @method('put')
            @include('dashboard.partials._errors')
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{old('name',$publishing_house->name)}}">

                @error('name')
                <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{old('email',$publishing_house->email)}}">
            </div>
            <div class="form-group">
                <label>Country</label>
                <input type="text" name="country" class="form-control" value="{{old('country',$publishing_house->country)}}">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" value="{{old('address',$publishing_house->address)}}">
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</button>
            </div>
        </form>
    </div>
@endsection


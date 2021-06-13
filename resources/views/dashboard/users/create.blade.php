@extends('layouts.dashboard.app')
@section('content')
    <h2>Users</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>

            <li class="breadcrumb-item"><a href="{{route('dashboard.users.index')}}">Users</a></li>

            <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </nav>

    <div class="tile mb-4">
        <form action="{{route('dashboard.users.store',['type'=> 'store'])}}" method="post">
            @csrf
            @method('post')
            @include('dashboard.partials._errors')
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label>Password Confirmation</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>





            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add</button>
            </div>

        </form>

    </div>
@endsection

@extends('layouts.dashboard.app')
@section('content')


    <h2>Dashboard</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-pencil fa-3x"></i>
                <div class="info">
                    <h4>Authors</h4>
                    <p><b>{{$authors_count}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-list"></i>
                <div class="info">
                    <h4>Categories</h4>
                    <p><b>{{$categories_count}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-book"></i>
                <div class="info">
                    <h4>Books</h4>
                    <p><b>{{$books_count}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon"><i class="icon fa fa-university fa-3x"></i>
                <div class="info">
                    <h4>Publishing Houses</h4>
                    <p><b>{{$publishing_houses_count}}</b></p>
                </div>
            </div>
        </div>
    </div>
@endsection

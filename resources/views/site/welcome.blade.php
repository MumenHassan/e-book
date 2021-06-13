@extends('layouts.front.app')
@section('content')
    <section id="banner">

        @include('layouts.front._nav')

        <div class="movies owl-carousel owl-theme">
            @foreach($latest_books as $latest_book)
            <div class="movie text-white d-flex justify-content-center align-items-center">

                <div class="movie__bg" style="background: linear-gradient(rgba(0,0,0, 0.6), rgba(0,0,0, 0.6)), url({{$latest_book->image_path}}) center/cover no-repeat;"></div>

                <div class="container">

                    <div class="row">

                        <div class="col-md-6">

                            <div class="d-flex justify-content-between">
                                <h1 class="movie__name fw-300">{{$latest_book->name}}</h1>
                                <span class="movie__year align-self-center">version : {{$latest_book->version}}   -   {{$latest_book->version_date}}</span>
                            </div>

                            <div class="d-flex movie__rating my-1">
                                <h5> <i class="fas fa-pencil-alt" aria-hidden="true"></i> {{ implode(' , ',$latest_book->authors->pluck('name')->toArray()) }}</h5>
{{--                                @foreach($latest_book->authors as $author)--}}

{{--                                    <h5 style="display: inline-block">Authors : <span>{{$author->name}} </span></h5>--}}
{{--                                @endforeach--}}

                            </div>



                            <div class="movie__cta my-4">
                                <a href="{{route('books.show',$latest_book->id)}}" class="btn btn-primary text-capitalize mr-0 mr-md-2"><span class="fas fa-eye"></span> read more now</a>
                                <a href="#" class="btn btn-outline-light text-capitalize"><span class="fas fa-heart"></span> add to favorite</a>
                            </div>
                        </div><!-- end of col -->

                        <div class="col-6 mt-2 mx-auto col-md-4 col-lg-3  ml-md-auto mr-md-0">
                            <img src="{{$latest_book->poster_path}}" class="img-fluid" alt="">
                        </div>
                    </div><!-- end of row -->

                </div><!-- end of container -->

            </div><!-- end of book -->
            @endforeach


        </div><!-- end of movies -->

    </section><!-- end of banner section-->
    @if($categories->count()>0)
    <div class="hr-css" id="categories_section">
        <h1 class="liner text-primary">Categories</h1>
    </div>
    @endif
    @foreach($categories as $category)
        @if($category->books->count()>0)
    <section class="listing py-2">

        <div class="container">

            <div class="row my-4">
                <div class="col-12 d-flex justify-content-between">
                    <h3 class="listing__title text-white fw-300">{{$category->name}}</h3>
                    <a href="{{route('books.index',['category_name'=>$category->name])}}" class="align-self-center text-capitalize text-primary">see all</a>
                </div>
            </div><!-- end of row -->

            <div class="movies owl-carousel owl-theme">
                @foreach($category->books as $book)
                <div class="movie p-0">
                    <img src="{{$book->poster_path}}" class="img-fluid" alt="">

                    <div class="movie__details text-white">

                        <div class="d-flex justify-content-between">
                            <p class="mb-0 movie__name">{{$book->name}}</p>
                            <p class="mb-0 movie__year align-self-center">{{$book->version_date}}</p>
                        </div>

                        <div class="d-flex movie__rating">
                            <div class="mr-2">
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i> {{ implode(' , ',$book->authors->pluck('name')->toArray()) }}
                            </div>

                        </div>



                        <div class="d-flex movie__cta">
                            <a href="{{route('books.show',$latest_book->id)}}" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-eye"></i> read now</a>
                            <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                        </div>

                    </div><!-- end of movie details -->

                </div><!-- end of col -->
                @endforeach

            </div><!-- end of row -->

        </div><!-- end of container -->

    </section><!-- end of listing section -->
    @endif
    @endforeach


    @if($authors->count()>0)
        <div class="hr-css" id="authors_section">
            <h1 class="liner text-primary">Authors</h1>
        </div>
    @endif
    @foreach($authors as $author)
        @if($author->books->count() >0)
        <section class="listing py-2">

            <div class="container">

                <div class="row my-4">
                    <div class="col-12 d-flex justify-content-between">
                        <h3 class="listing__title text-white fw-300">{{$author->name}}</h3>
                        <a href="{{route('books.index',['author_name'=>$author->name])}}" class="align-self-center text-capitalize text-primary">see all</a>
                    </div>
                </div><!-- end of row -->

                <div class="movies owl-carousel owl-theme">
                    @foreach($author->books as $book)
                        <div class="movie p-0">
                            <img src="{{$book->poster_path}}" class="img-fluid" alt="">

                            <div class="movie__details text-white">

                                <div class="d-flex justify-content-between">
                                    <p class="mb-0 movie__name">{{$book->name}}</p>
                                    <p class="mb-0 movie__year align-self-center">{{$book->version_date}}</p>
                                </div>





                                <div class="d-flex movie__cta">
                                    <a href="{{route('books.show',$latest_book->id)}}" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-eye"></i> read now</a>
                                    <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                                </div>

                            </div><!-- end of movie details -->

                        </div><!-- end of col -->
                    @endforeach

                </div><!-- end of row -->

            </div><!-- end of container -->

        </section><!-- end of listing section -->
        @endif
    @endforeach


    @if($publishing_houses->count()>0)
        <div class="hr-css" id="publishing_houses_section">
            <h1 class="liner text-primary">Publishing Houses</h1>
        </div>
    @endif
    @foreach($publishing_houses as $publishing_house)
        @if($publishing_house->books->count() >0)
        <section class="listing py-2">

            <div class="container">

                <div class="row my-4">
                    <div class="col-12 d-flex justify-content-between">
                        <h3 class="listing__title text-white fw-300">{{$publishing_house->name}}</h3>
                        <a href="{{route('books.index',['publishing_house_name'=>$publishing_house->name])}}" class="align-self-center text-capitalize text-primary">see all</a>
                    </div>
                </div><!-- end of row -->

                <div class="movies owl-carousel owl-theme">
                    @foreach($publishing_house->books as $book)
                        <div class="movie p-0">
                            <img src="{{$book->poster_path}}" class="img-fluid" alt="">

                            <div class="movie__details text-white">

                                <div class="d-flex justify-content-between">
                                    <p class="mb-0 movie__name">{{$book->name}}</p>
                                    <p class="mb-0 movie__year align-self-center">{{$book->version_date}}</p>
                                </div>





                                <div class="d-flex movie__cta">
                                    <a href="{{route('books.show',$latest_book->id)}}" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-eye"></i> read now</a>
                                    <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                                </div>

                            </div><!-- end of movie details -->

                        </div><!-- end of col -->
                    @endforeach

                </div><!-- end of row -->

            </div><!-- end of container -->

        </section><!-- end of listing section -->
        @endif
    @endforeach

    @include('layouts.front._footer')
@endsection


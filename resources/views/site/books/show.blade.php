@extends('layouts.front.app')
@section('content')
    <section id="show">

     @include('layouts.front._nav')

        <div class="movie">

            <div class="movie__bg" style="background: linear-gradient(rgba(0,0,0, 0.6), rgba(0,0,0, 0.6)), url({{$book->image_path}}) center/cover no-repeat;"></div>

            <div class="container">

                <div class="row">

                    <div class="col-md-8 text-white">
                        <h4>{{$book->description}} </h4>
                    </div><!-- end of col -->

                    <div class="col-md-4 text-white">
                        <h3 class="movie__name fw-300">{{$book->name}}</h3>

                        <div class="d-flex movie__rating my-1">
                            <div class="d-flex mr-2">
                                <h5> <i class="fas fa-pencil-alt" aria-hidden="true"></i> {{ implode(' , ',$book->authors->pluck('name')->toArray()) }}</h5>

                            </div>

                        </div>
                        <p>Version : <span id="movie__views" >{{$book->version}}</span></p>
                        <p class="movie__description my-3">Version date : {{$book->version_date}}</p>


                        <a href="" class="btn btn-primary text-capitalize my-3"><i class="far fa-heart"></i> add to favorites</a>

                    </div><!-- end of col -->

                </div><!-- end of row -->

            </div><!-- end of container -->

        </div><!-- end of movie -->


    </section><!-- end of banner section-->

    <section class="listing py-2">

        <div class="container">

            <div class="row my-4">
                <div class="col-12 d-flex justify-content-between">
                    <h3 class="listing__title text-white fw-300">Related Books</h3>
                </div>
            </div><!-- end of row -->

            <div class="movies owl-carousel owl-theme">

                @foreach($related_books as $related_book)
                <div class="movie p-0">
                    <img src="{{$related_book->poster_path}}" class="img-fluid" alt="">

                    <div class="movie__details text-white">

                        <div class="d-flex justify-content-between">
                            <p class="mb-0 movie__name">{{$related_book->name}}</p>
                            <p class="mb-0 movie__year align-self-center">{{$related_book->version_date}}</p>
                        </div>



                        <div class="movie___views">
                            <p>Version: {{$related_book->version}}</p>
                        </div>

                        <div class="d-flex movie__cta">
                            <a href="{{route('books.show',$related_book->id)}}" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-eye"></i> Read more now</a>
                            <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                        </div>

                    </div><!-- end of movie details -->

                </div><!-- end of col -->
                @endforeach


            </div><!-- end of row -->

        </div><!-- end of container -->

    </section><!-- end of listing section -->
    @include('layouts.front._footer')

@endsection



<nav class="navbar navbar-expand-lg navbar-dark fixed-top">

    <div class="container">

        <a class="navbar-brand" href="{{route('welcome')}}"><span class="text-primary font-weight-bold">E - </span>Bo<span class="text-primary font-weight-bold">OK</span></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <form action="" class="col-12 col-md-6 p-0 mt-1">
                <div class="input-group">
                    <input type="search" class="form-control bg-transparent border-0" placeholder="Search for books" aria-label="Search for your favorite movies" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-white border-0" id="basic-addon2"><i class="fas fa-search"></i></span>
                    </div>
                </div>
            </form><!-- end of form -->

            <ul class="navbar-nav ml-auto">

                    <a href="{{route('welcome')}}#categories_section" class="btn btn-primary mr-md-2 btn btn-outline-light">Categories</a>
                    <a href="{{route('welcome')}}#authors_section" class="btn btn-primary mr-md-2 btn btn-outline-light">Authors</a>
                    <a href="{{route('welcome')}}#publishing_houses_section" class="btn btn-primary mr-md-2 btn btn-outline-light">Publishing Houses</a>
            </ul>

        </div><!-- end of collapse -->

    </div><!-- end of container fluid-->

</nav><!-- end of nav -->

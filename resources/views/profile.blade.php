@extends('layouts.app_website')

@section('content')

@include('layouts.navbar')
        <!-----------------------------------Banner/img Starts-------------------->


        <div class="banner">
            <div class="banner-title d-flex flex-column justify-content-center align-items-center">
                <img src="{{asset('assets/upload/user/'.auth()->user()->profile_image)}}" alt="img" class="rounded-circle" width="80px" height="80px">
                <h3 class="text-light">{{auth()->user()->name}}</h3>
                <p class="text-light">{{auth()->user()->information}}</p>

            </div>



            <div class="banner-end d-flex justify-content-center align-items-end">
                <ul class="nav text-light">
                    <li class="nav-item nav-link active"><a href="#photos">Photos</a></li>
                    <li class="nav-item nav-link"><a href="#posts">Posts</a></li>
                    <li class="nav-item nav-link"><a href="#videos">Videos</a></li>

                </ul>

            </div>




        </div>

        <!--------------------Image Portfolio----------------->

        <div class="grid-template container my-4 " id="photos">

            @foreach ($user_posts as $post)

                @foreach ($post->photo as $key=>$photo)
                    <div class="item-".{{$key}}>
                        <a href="portfolio/img1.jpg" data-lightbox="id"><img src="{{asset('assets/upload/photo/'.$photo->title)}}" alt="" class="img-fluid" style="width:455px; height: 255px;"></a>
                    </div>
                @endforeach

            @endforeach
        </div>
<hr>
        <div class="grid-template container my-4 " id="videos">
            @foreach ($user_posts as $post)

                @foreach ($post->video as $key=>$video)
                    <div class="item-".{{$key}}>
                        <a href="portfolio/img1.jpg" data-lightbox="id">
                            <video width="250" height="200" controls>
                                <source src="{{asset('assets/upload/video/'.$video->title)}}" type="video/mp4" >

                              </video>
                        </a>
                    </div>
                @endforeach

            @endforeach
        </div>
<hr>
           <div class="row " id="posts">

                    @foreach ($user_posts as $post)
                        <div class="col-4">
                            <div class="card-body">

                            <div class="media" id="posts">
                                <img src="{{$post->user->profile_image_for_web}}" alt="img" width="55px" height="55px" class="rounded-circle mr-3">

                                <div class="media-body">
                                    <h5>{{$post->user->name}}</h5>

                                    <p class="card-text text-justify">{{$post->description}}</p>



                                    <div class="row no-gutters mb-3">

                                            @foreach ($post->photo as $photo)
                                                <div class="col-6 p-1 text-center">
                                                    <img src="{{asset('assets/upload/photo/'.$photo->title)}}" alt="" class="img-fluid mb-2">
                                                </div>
                                            @endforeach

                                            @foreach ($post->video as $video)
                                                <div class="col-6 p-1 text-center">
                                                    <video width="250" height="200" controls>
                                                        <source src="{{asset('assets/upload/video/'.$video->title)}}" type="video/mp4" >

                                                      </video>
                                                </div>
                                            @endforeach
                                    </div>
                                </div>
                                <small>{{$post->created_at->diffForHumans()}}</small>
                            </div>

                            </div>
                        </div>
                    @endforeach

            </div>

@endsection

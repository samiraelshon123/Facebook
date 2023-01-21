@extends('layouts.app_website')

@section('content')

   @include('layouts.navbar')
   @include('layouts.post_form_modal')
   @include('layouts.edit_profile_modal')
    <!-------------------------------------------Start Grids layout for lg-xl-3 columns and (xs-lg 1 columns)--------------------------------->


    <div class="container">
        <div class="row">


            <!--------------------------left columns  start-->

            <div class="col-12 col-lg-3">

                <div class="left-column">


                    <div class="card card-left1 mb-4" >
                        <img src="{{auth()->user()->cover_image_for_web}}" alt="" class="card-img-top img-fluid">
                        <div class="card-body text-center ">
                            <img src="{{auth()->user()->profile_image_for_web}}" alt="img" width="120px" height="120px" class="rounded-circle mt-n5">
                            <h5 class="card-title">{{auth()->user()->name}}</h5>
                            <p class="card-text text-justify mb-2">{{auth()->user()->information}}</p>

                        </div>

                    </div>

                    <div class="card shadow-sm card-left2 mb-4">

                        <div class="card-body">

                                <h5 class="mb-3 card-title">About <small><a href="#profileEdit" data-toggle="modal" class="ml-1">Edit</a></small></h5>
                                <p class="card-text"> <i class="far fa-building mr-2"></i> Work at {{auth()->user()->work_place}}</p>
                                <p class="card-text"> <i class="fas fa-home mr-2"></i> Live in {{auth()->user()->address_live}}</p>
                                <p class="card-text"> <i class="fas fa-map-marker mr-2"></i> From {{auth()->user()->address_from}}</p>
                        </div>

                    </div>



                    <div class="card shadow-sm card-left3 mb-4">

                        <div class="card-body">
                            <h5 class="card-title">Photos<small class="ml-2"></small></h5>

                            <div class="row">
                                @foreach ($user_posts as $post)
                                    @foreach ($post->photo as $photo)

                                        <div class="col-6 p-1">
                                            <a href="img/left1.jpg" data-lightbox="id" ><img src="{{asset('assets/upload/photo/'.$photo->title)}}" alt="img" class="img-fluid my-2"></a>

                                        </div>

                                    @endforeach
                                @endforeach

                            </div>

                        </div>

                    </div>

                </div>
            </div>
 <!--------------------------Ends Left columns-->
 <!---------------------------------------Middle columns  start---------------->
            <div class="col-12 col-lg-6" >


                <div class="middle-column">


                    <div class="card" >


                        <div class="card-header bg-transparent">
                            <form action="{{route('home.store')}}" method="post">

                                @csrf
                                <div class="input-group w-100">
                                   
                                    <input type="text" name="description" id="description" placeholder="Write Post" class="form-control form-control-md">

                                 <div class="input-group-append">
                                        <div class="input-group-text">

                                                <a href="#postForm" data-toggle="modal"><i class="fas fa-camera"></i></a>
                                            </div>

                                 </div>

                                </div>

                            </form>

                        </div>


<div id="posts">
@foreach ($posts as $post)

@if (in_array($post->user_id, $friendsId))
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

            <form action="{{route('home.update', $post->id)}}" method="POST" id="submitForm">
                @csrf
                @method("put")
                <div class="row">
                    <div class="col-11">
                        <input type="text" name="comment" id="comment" placeholder="Comment" class="form-control form-control-md">
                    </div>

                    <div class="col-1">

                        <button type="submit"> <a href=""><i class="fa-regular fa-paper-plane"></i></a></button>
                    </div>

                </div>
            </form>
            <br>
            <h5>Comments</h5>

            {{-- comments --}}
           <div id="comment-block">
            @foreach ($post->comment as $comment)


            <div  class="media mb-3">
                    <img src="{{$comment->user->profile_image_for_web}}" alt="img" width="45px" height="45px" class="rounded-circle mr-2">
                    <div class="media-body">
                            <p class="card-text text-justify"> {{$comment->comment}}</p>

                    </div>


            </div>
            @endforeach
           </div>



        </div>
        <small>{{$post->created_at->diffForHumans()}}</small>
    </div>
   </div>

@endif

@endforeach
</div>
@if (count($posts) > 3)

<button class="see-more" data-page="2" data-div="#posts">See more</button>
@endif

</div>


 </div>

  </div>

  <br> <br> <br><br> <br> <br>

<!------------------------Middle column Ends---------------->

<!---------------------------Statrs Right Columns----------------->



<div class="col-12 col-lg-3">


    <div class="right-column">



        @if (count($search_users) > 0)

        <div class="card shadow-sm mb-4">

            <div class="card-body">

                    <h6 class="card-title "><p class="ml-1">People you search about</p> </h6>
                    <div class="row no-gutters d-none d-lg-flex" id="follow_search">
                        @foreach ($search_users as $user)
                        @if (!in_array($user->id, $friendsId))
                            <div class="col-6 p-1">
                                <img src="{{$user->profile_image_for_web}}" alt="img" width="80px" height="80px" class="rounded-circle mb-4">

                            </div>
                            <div class="col-6 p-1 text-left">

                                <h6>{{$user->name}}</h6>

                                <form action="{{route('follow', $user->id)}}" method="GET" class="submitSearchForm" >
                                    @csrf
                                    <button type="submit"><i class="fas fa-user-friends"></i>Follow</button>
                                </form>
                            </div>
                        @endif
                        @endforeach
                    </div>
            </div>

        </div>
        @else
        <div class="card shadow-sm mb-4">

            <div class="card-body">

                    <h6 class="card-title "><p class="ml-1">People you search about</p> </h6>
                    <div class="row no-gutters d-none d-lg-flex">
                       <h6>No Users Found</h6>
                    </div>
            </div>

        </div>
        @endif
        <div class="card shadow-sm mb-4">

            <div class="card-body">

                    <h6 class="card-title "><p class="ml-1">People you may know</p> </h6>
                    <div id="contain">
                        <div class="row no-gutters d-none d-lg-flex" id="follow">
                            @foreach ($users as $user)
                            @if (!in_array($user->id, $friendsId))
                                <div class="col-6 p-1">
                                    <img src="{{$user->profile_image_for_web}}" alt="img" width="80px" height="80px" class="rounded-circle mb-4">

                                </div>
                                <div class="col-6 p-1 text-left">

                                    <h6>{{$user->name}}</h6>

                                    <form action="{{route('follow', $user->id)}}" method="GET" class="submitFollowForm" >
                                        @csrf
                                        <button type="submit"><i class="fas fa-user-friends"></i>Follow</button>
                                    </form>
                                </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
            </div>

        </div>

    </div>
            </div>
</div>
@endsection

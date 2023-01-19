
         <!---------------------------MOdal Section  satrts------------------->

         <div class="modal fade" id="profileEdit" >
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">

                <div class="modal-content">


                    <div class="modal-header">
                        <div class="modal-title h4">Edit Profile</div>

                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>


                    <div class="modal-body">
                        <form action="{{route('edit_profile')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <ul class="list-unstyled">



                            <li class="media hover-media">

                                    <label for="" class="form-label me-4">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{auth()->user()->name}}">
                                    @if($errors->has('name'))
                                        <div class="text-danger">{{ $errors->first('name') }}</div>
                                    @endif

                            </li>

                        <hr class="my-3">

                            <li class="media hover-media">

                                    <label for="" class="form-label me-4">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{auth()->user()->email}}">
                                    @if($errors->has('email'))
                                        <div class="text-danger">{{ $errors->first('email') }}</div>
                                    @endif
                            </li>

                            <hr class="my-3">

                            <li class="media hover-media">

                                    <label for="" class="form-label me-2">Password</label>
                                    <input type="password" class="form-control" name="password">
                                    @if($errors->has('password'))
                                        <div class="text-danger">{{ $errors->first('password') }}</div>
                                    @endif
                            </li>

                            <hr class="my-3">
                            <li class="media hover-media">

                                <label for="" class="form-label">Address Live</label>
                                <input type="text" class="form-control" name="address_live" value="{{auth()->user()->address_live}}">
                                @if($errors->has('address_live'))
                                    <div class="text-danger">{{ $errors->first('address_live') }}</div>
                                @endif
                            </li>
                            <hr class="my-3">
                            <li class="media hover-media">

                                <label for="" class="form-label">Address From</label>
                                <input type="text" class="form-control" name="address_from" value="{{auth()->user()->address_from}}">
                                @if($errors->has('address_from'))
                                    <div class="text-danger">{{ $errors->first('address_from') }}</div>
                                @endif
                            </li>
                            <hr class="my-3">
                            <li class="media hover-media">

                                <label for="" class="form-label">Information</label>
                                <input type="text" class="form-control" name="information" value="{{auth()->user()->information}}">
                                @if($errors->has('information'))
                                    <div class="text-danger">{{ $errors->first('information') }}</div>
                                @endif
                            </li>

                            <hr class="my-3">
                            <li class="media hover-media">

                                <label for="" class="form-label">Work Place</label>
                                <input type="text" class="form-control" name="work_place" value="{{auth()->user()->work_place}}">
                                @if($errors->has('work_place'))
                                    <div class="text-danger">{{ $errors->first('work_place') }}</div>
                                @endif
                            </li>

                            <hr class="my-3">

                            <li class="media hover-media">

                                    <label for=""class="form-label" >Profile Image</label>
                                    <input type="file" id="profile_image" class="form-control" name="profile_image"><br><br>
                                    @if($errors->has('profile_image'))
                                        <div class="text-danger">{{ $errors->first('profile_image') }}</div>
                                    @endif
                            </li>

                        <hr class="my-3">

                            <li class="media hover-media">

                                    <label for="" class="form-label">Cover Image</label>
                                    <input type="file" id="conver_image" class="form-control" name="cover_image"><br><br>
                                    @if($errors->has('cover_place'))
                                        <div class="text-danger">{{ $errors->first('cover_place') }}</div>
                                    @endif
                            </li>

                        <hr class="my-3">

                            <li class="media hover-media">
                                <button class="btn btn-success">Edit Profile</button>
                            </li>

                        <hr class="my-3">
                        </ul>
                    </form>
                    </div>
                </div>


            </div>


        </div>

        <!-------------------------------MOdal Ends---------------------------->



















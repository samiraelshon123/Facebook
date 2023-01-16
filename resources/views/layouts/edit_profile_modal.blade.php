
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

                            </li>

                        <hr class="my-3">

                            <li class="media hover-media">

                                    <label for="" class="form-label me-4">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{auth()->user()->email}}">

                            </li>

                            <hr class="my-3">

                            <li class="media hover-media">

                                    <label for="" class="form-label me-2">Password</label>
                                    <input type="password" class="form-control" name="password">

                            </li>

                            <hr class="my-3">
                            <li class="media hover-media">

                                <label for="" class="form-label">Address Live</label>
                                <input type="text" class="form-control" name="address_live" value="{{auth()->user()->address_live}}">

                            </li>
                            <hr class="my-3">
                            <li class="media hover-media">

                                <label for="" class="form-label">Address From</label>
                                <input type="text" class="form-control" name="address_from" value="{{auth()->user()->address_from}}">

                            </li>
                            <hr class="my-3">
                            <li class="media hover-media">

                                <label for="" class="form-label">Information</label>
                                <input type="text" class="form-control" name="information" value="{{auth()->user()->information}}">

                            </li>

                            <hr class="my-3">
                            <li class="media hover-media">

                                <label for="" class="form-label">Work Place</label>
                                <input type="text" class="form-control" name="work_place" value="{{auth()->user()->work_place}}">

                            </li>

                            <hr class="my-3">

                            <li class="media hover-media">

                                    <label for=""class="form-label" >Profile Image</label>
                                    <input type="file" id="profile_image" class="form-control" name="profile_image"><br><br>

                            </li>

                        <hr class="my-3">

                            <li class="media hover-media">

                                    <label for="" class="form-label">Cover Image</label>
                                    <input type="file" id="conver_image" class="form-control" name="cover_image"><br><br>

                            </li>

                        <hr class="my-3">

                            <li class="media hover-media">
                                <button class="btn btn-success">Add Post</button>
                            </li>

                        <hr class="my-3">
                        </ul>
                    </form>
                    </div>
                </div>


            </div>


        </div>

        <!-------------------------------MOdal Ends---------------------------->



















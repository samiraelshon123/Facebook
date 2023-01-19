
         <!---------------------------MOdal Section  satrts------------------->

         <div class="modal fade" id="postForm" >
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">

                <div class="modal-content">


                    <div class="modal-header">
                        <div class="modal-title h4">Add Post</div>

                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>


                    <div class="modal-body">
                        <form action="{{route('home.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <ul class="list-unstyled">



                            <li class="media hover-media">

                                    <label for="" class="form-label me-5">Title</label>
                                    <input type="text" class="form-control" name="title">
                                    @if($errors->has('title'))
                                        <div class="text-danger">{{ $errors->first('title') }}</div>
                                    @endif

                            </li>

                        <hr class="my-3">

                            <li class="media hover-media">

                                    <label for="" class="form-label">Description</label>
                                    <input type="text" class="form-control" name="description">
                                    @if($errors->has('description'))
                                        <div class="text-danger">{{ $errors->first('description') }}</div>
                                    @endif

                            </li>

                        <hr class="my-3">

                            <li class="media hover-media">

                                    <label for=""class="form-label" >Select Photo</label>
                                    <input type="file" id="files" class="form-control" name="photo[]" multiple><br><br>
                                    @if($errors->has('photo'))
                                        <div class="text-danger">{{ $errors->first('photo') }}</div>
                                    @endif

                            </li>

                        <hr class="my-3">

                            <li class="media hover-media">

                                    <label for="" class="form-label">Select Video</label>
                                    <input type="file" id="files" class="form-control" name="video[]" multiple><br><br>
                                    @if($errors->has('video'))
                                        <div class="text-danger">{{ $errors->first('video') }}</div>
                                    @endif

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



















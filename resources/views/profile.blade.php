@extends('layouts.app')

@section('content')

@include('layouts.navbar')
@include('layouts.modal')


        <!-----------------------------------Banner/img Starts-------------------->


        <div class="banner">
            <div class="banner-title d-flex flex-column justify-content-center align-items-center">
                <img src="img/avatar-dhg.png" alt="img" class="rounded-circle" width="80px" height="80px">
                <h3 class="text-light">Dave Gamache</h3>
                <p class="text-light">I wish i was a little bit taller, wish i was a baller, wish i had a girl… also.</p>

            </div>


            <div class="banner-end d-flex justify-content-center align-items-end">
                <ul class="nav text-light">
                    <li class="nav-item nav-link active">Photos</li>
                    <li class="nav-item nav-link">Others</li>
                    <li class="nav-item nav-link">Anothers</li>

                </ul>

            </div>




        </div>

        <!--------------------Image Portfolio----------------->


        <div class="grid-template container my-4">


            <div class="item-1">



           <a href="portfolio/img1.jpg" data-lightbox="id"><img src="portfolio/img1.jpg" alt="" class="img-fluid" style="width:455px; height: 255px;"></a>



            </div>

            <div class="item-2 ">
                <a href="portfolio/img2.jpg"data-lightbox="id"> <img src="portfolio/img2.jpg" alt="" class="img-fluid" style="width:217px; height: 255px;"></a>

                </div>
                <div class="item-3">
                        <a href="portfolio/img3.jpg"data-lightbox="id"> <img src="portfolio/img3.jpg" alt="" class="img-fluid" style="width:217px; height: 255px;"></a>
                    </div>
                    <div class="item-4">
                            <a href="portfolio/img4.jpg"data-lightbox="id"> <img src="portfolio/img4.jpg" alt="" class="img-fluid" style="width:217px; height: 255px;"></a>



                        </div>


                        <div class="item-5">

                                <a href="portfolio/img5.jpg"data-lightbox="id"><img src="portfolio/img5.jpg" alt="" class="img-fluid" style="width:217px; height: 255px;"></a>



                        </div>

                        <div class="item-6">
                                <a href="portfolio/img6.jpg"data-lightbox="id">   <img src="portfolio/img6.jpg" alt="" class="img-fluid" style="width:217px; height: 255px;"></a>


                            </div>
                            <div class="item-7">
                                    <a href="portfolio/img7.jpg"data-lightbox="id"> <img src="portfolio/img7.jpg" alt="" class="img-fluid" style="width:455px; height: 255px;"></a>

                                </div>
                                <div class="item-8">

                                        <a href="portfolio/img8.jpg"data-lightbox="id">  <img src="portfolio/img8.jpg" alt="" class="img-fluid" style="width:217px; height: 255px;"></a>

                                    </div>

                                    <div class="item-9">
                                            <a href="portfolio/img9.jpg"data-lightbox="id"><img src="portfolio/img9.jpg" alt="" class="img-fluid" style="width:217px; height: 255px;"></a>



                                    </div>

                                    <div class="item-10">
                                            <a href="portfolio/img10.jpg"data-lightbox="id">    <img src="portfolio/img10.jpg" alt="" class="img-fluid" style="width:217px; height: 255px;"></a>


                                        </div>
                                        <div class="item-11">
                                                <a href="portfolio/img11.jpg"data-lightbox="id">   <img src="portfolio/img11.jpg" alt="" class="img-fluid" style="width:455px; height: 255px;"></a>

                                            </div>
                                            <div class="item-12">
                                                    <a href="portfolio/img12.jpg"data-lightbox="id">   <img src="portfolio/img12.jpg" alt="" class="img-fluid" style="width:217px; height: 255px;"></a>



                                                </div>











        </div>


@endsection

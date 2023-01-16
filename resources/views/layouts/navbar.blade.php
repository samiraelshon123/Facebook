 <!-------------------------------NAvigation Starts------------------>

 <nav class="navbar navbar-expand-md navbar-dark mb-4" style="background-color:#3097D1">
    <a href="index.html" class="navbar-brand"><img src="{{asset('assets/img/brand-white.png')}}" alt="logo" class="img-fluid" width="80px" height="100px"></a>

    <button class="navbar-toggler" data-toggle="collapse" data-target="#responsive"><span class="navbar-toggler-icon"></span></button>


    <div class="collapse navbar-collapse" id="responsive">
        <ul class="navbar-nav mr-auto text-capitalize">
            <li class="nav-item"><a href="{{route('home.index')}}" class="nav-link active">home</a></li>
            <li class="nav-item"><a href="{{route('profile.index')}}" class="nav-link">profile</a></li>
            <li class="nav-item"><a href="{{route('chatify')}}" class="nav-link">messages</a></li>
            <li class="nav-item"><a href="notification.html" class="nav-link">docs</a></li>
            <li class="nav-item"><a href="#" class="nav-link d-md-none">growl</a></li>
            <li class="nav-item"><a href="#" class="nav-link d-md-none">logout</a></li>

        </ul>

        <form action="" class="form-inline ml-auto d-none d-md-block">
            <input type="text" name="search" id="search" placeholder="Search" class="form-control form-control-sm">
        </form>

         <!-- Notifications Dropdown Menu -->

         <a class="nav-link" data-toggle="dropdown" href="#" style="color:#CBE4F2;margin-bottom: 10px;margin-right: -17px;">
            <i class="far fa-bell" style="margin-right: -10px;margin-bottom: -10px;font-size: 23px"></i>
            <span class="badge badge-danger navbar-badge notification_counter">0</span>
          </a>


        <img src="{{auth()->user()->profile_image_for_web}}" alt="" class="rounded-circle ml-3 d-none d-md-block" width="32px" height="32px">

    </div>
</nav>

<!---------------------------------------------Ends navigation------------------------------>

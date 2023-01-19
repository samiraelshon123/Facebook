{{-- <script>
    lightbox.option({

    })
</script> --}}



<!------------------------Light BOx OPtions------------->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{asset('assets/js/lightbox-plus-jquery.min.js')}}"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>
<script>
$("#submitForm").on("submit", function(e){
    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var actionUrl = form.attr('action');

    $.ajax({
        url: actionUrl,
        method: 'POST',
        dataType: 'json',
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        // data: form.serialize(),
        success: function(data){

            const pa =`<div  class="media mb-3">
                    <img src="${data.image}" alt="img" width="45px" height="45px" class="rounded-circle mr-2">
                    <div class="media-body">
                            <p class="card-text text-justify"> ${data.comment}</p>

                    </div>
                    </div>`
            var comment_block = $('#comment-block');
            comment_block.prepend(pa);
           

        },
        error: function (jqXhr, textStatus, errorMessage) { // error callback

        }
      });
});
</script>

<script>
    $(".submitFollowForm").on("submit", function(e){
        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var actionUrl = form.attr('action');

        $.ajax({
            url: actionUrl,
            method: 'GET',
            dataType: 'json',
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){

            const pa = document.getElementById("follow");
            $.each(data.users, function (key, val) {
                    if (!jQuery.inArray(val.id, data.friendsId)){
                    var url = route('follow', val.id);
                    pa.innerHTML =
                            `<div class="col-6 p-1">
                                <img src="${val.profile_image_for_web}" alt="img" width="80px" height="80px" class="rounded-circle mb-4">
                            </div>
                            <div class="col-6 p-1 text-left">

                                <h6>${val.name}</h6>

                                <form action="${url}" method="GET" id="submitFollowForm">
                                    @csrf
                                    <button type="submit"><i class="fas fa-user-friends"></i>Follow</button>
                                </form>
                            </div>`;
                    }
            });
            var div = document.createElement("div");
            div.appendChild(pa);
            document.body.appendChild(div);
        },
        error: function (jqXhr, textStatus, errorMessage) { // error callback

        }
    });
    });
    </script>

<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>

  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher('06fd9105cfba297bff53', {
    cluster: 'ap2'
  });


</script>
@if(Auth::check())
<input type="hidden" name="auth_id" id="auth_id" value="{{ auth()->user()->id  }}">
@endif
<script src="{{asset('assets/js/pusherNotifications.js')}}"></script>
<script src="{{asset('assets/js/all.min.js')}}"></script>


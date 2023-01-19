<?php

namespace App\Http\Controllers;

use App\Events\NewFollow;
use App\Events\NewNotification;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Comment;
use App\Models\Notification;
use App\Models\Photo;
use App\Models\Post;
use App\Models\User;
use App\Models\UserFriend;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Exists;
use Spatie\Activitylog\Models\Activity;
use Carbon\Carbon;
use Illuminate\Support\Str;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // show posts with comments , photos and videos
    public function index()
    {

        $users = User::with('friends')->where('id', '!=', auth()->user()->id)
        ->where(
            function($query){
                return $query
                ->where('address_live', auth()->user()->address_live)
                ->orWhere('address_from', auth()->user()->address_from)
                ->orWhere('work_place', auth()->user()->work_place);
        })->get();

        $friendsId = [auth()->user()->id];
        foreach(auth()->user()->friends as $friend){
            array_push($friendsId, $friend->id);
        }
        foreach(auth()->user()->friendsOf as $friend){
            array_push($friendsId, $friend->id);
        }

        //dd($friendsId);
        $user_posts = Post::with('photo')->where('user_id', auth()->user()->id)->get();

       $posts = Post::with('photo', 'video', 'comment')->latest()->paginate(3);
       return view('home', compact('posts', 'user_posts', 'users', 'friendsId'));

    }
    // follow friend
    public function follow($id){

        $user_friend = UserFriend::create([
         'user_id' => auth()->user()->id,
         'user_friend_id' => $id,
        ]);
        Notification::create([
            'user_id' => auth()->user()->id,
            'data' => auth()->user()->name . ' follow you ',
            'type' => 1,
           ]);
           $data = [
            'user_id' => $user_friend['user_id'],
            'user_name' =>auth()->user()->name,
            'date' => date("Y-m-d", strtotime(Carbon::now())),
            'time' => date("h:i A", strtotime(Carbon::now())),
           ];
           event(new NewNotification($data));

           $users = User::with('friends')->where('id', '!=', auth()->user()->id)
           ->where(
               function($query){
                   return $query
                   ->where('address_live', auth()->user()->address_live)
                   ->orWhere('address_from', auth()->user()->address_from)
                   ->orWhere('work_place', auth()->user()->work_place);
           })->get();

           $friendsId = [auth()->user()->id];
           foreach(auth()->user()->friends as $friend){
               array_push($friendsId, $friend->id);
           }
           foreach(auth()->user()->friendsOf as $friend){
               array_push($friendsId, $friend->id);
           }
           $dataResponse = [
                'users' => $users,
                'friendsId' => $friendsId
            ];
       return response()->json( $dataResponse, 200);
       //return redirect()->route('home.index');
    }
    // store post with comments , photos and videos
    public function store(CreatePostRequest $request){
        $data = $request->Validated();
        $data['user_id'] = auth()->user()->id;
        if($data['title'] == null){
            $data['title'] = 'Public Post';
        }
        $post1 = Post::create($data);

        $post = Post::with('photo', 'video')->find($post1->id);

        $photos = [];
        if($request->photo != null){

          if(count($request->photo ) > 0){

              foreach($request->photo as $file){

                  $file = uploadImage($file,"/assets/upload/photo");
                  $photo = Photo::create(['title'=> $file]);
                  array_push($photos, $photo->id);

              }
          }
        }

        $videos = [];
        if($request->video != null){

          if(count($request->video ) > 0){

              foreach($request->video as $file){

                  $file = uploadImage($file,"/assets/upload/video");
                  $video = Video::create(['title'=> $file]);
                  array_push($videos, $video->id);

              }
          }
        }

       $post->photo()->attach($photos);

       $post->video()->attach($videos);

          return redirect()->route('home.index');
    }
    // edit profile
    public function edit_profile(UpdateProfileRequest $request){

        $data = $request->Validated();

        if($request->profile_image != null){
            $file = uploadImage($request->profile_image,"/assets/upload/user");
           $data['profile_image'] = $file;

        }

        if($request->cover_image != null){

            $file = uploadImage($request->cover_image,"/assets/upload/user");

           $data['cover_image'] = $file;

        }
        if($request->password != null){
            $data['password'] = Hash::make($request->password);
        }
        $user = User::find(auth()->user()->id);

        $user->update($data);
        return redirect()->route('home.index');

    }
    //store comment
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $comment = Comment::create([
            'comment' => $request->comment,
            'post_id' => $id,
            'user_id' => auth()->user()->id
       ]);
       $post->comment()->attach($comment); // relation between post and comment

       //this data is sent to pusher to show in notification
       $data = [
        'user_id' => $comment['user_id'],
        'post_id' => $id,
        'comment' => $request->comment,
        'user_name' => auth()->user()->name,
        'date' => date("Y-m-d", strtotime(Carbon::now())),
        'time' => date("h:i A", strtotime(Carbon::now())),
       ];

       // this is data that sent to js file to appent to blade file
       $dataResponse = [
            'comment' => $request->comment,
            'image' => $comment->user->profile_image_for_web
       ];

       //create notification when user comment on auth user post
       Notification::create([
        'user_id' => auth()->user()->id,
        'data' => auth()->user()->name . ' comment on your post: '. $post->title,
        'type' => 1,
       ]);

       event(new NewNotification($data));

       return response()->json( $dataResponse, 200);
       //return redirect()->route('home.index');
    }

}

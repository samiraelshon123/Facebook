<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Comment;
use App\Models\Photo;
use App\Models\Post;
use App\Models\User;
use App\Models\UserFriend;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Models\Activity;
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
        $users = User::where('address_live', auth()->user()->address_live)
        ->orWhere('address_from', auth()->user()->address_from)
        ->orWhere('work_place', auth()->user()->work_place)
        ->get();
        $user_posts = Post::with('photo')->where('user_id', auth()->user()->id)->get();

       $posts = Post::with('photo', 'video', 'comment')->latest()->paginate(3);
       return view('home', compact('posts', 'user_posts', 'users'));

    }
    public function show($id){
       
        UserFriend::create([
         'user_id' => auth()->user()->id,
         'user_friend_id' => $id,
        ]);
        return redirect()->route('home.index');
    }
    // store post with comments , photos and videos
    public function store(CreatePostRequest $request){
        $data = $request->Validated();
        $data['user_id'] = auth()->user()->id;
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
       $post->comment()->attach($comment);
       return redirect()->route('home.index');
    }

}

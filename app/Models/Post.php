<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
   
    protected $fillable = ["title", "description", "user_id"];
    public function photo()
    {
        return $this->belongsToMany(Photo::class, 'post_photos', 'post_id', 'photo_id');
    }
    public function video()
    {
        return $this->belongsToMany(Video::class, 'post_videos', 'post_id', 'video_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comment()
    {
        return $this->belongsToMany(Comment::class, 'post_comments', 'post_id', 'comment_id');
    }

}

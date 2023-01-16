<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Photo extends Model
{
    protected $fillable = ["title"];
    public function post()
    {
        return $this->belongsToMany(Post::class, 'post_photos', 'photo_id', 'post_id');
    }
    public $appends = ['image_for_web'];
    public function getImageForWebAttribute(){
        if($this->image)
            return asset('assets/upload/photo/'.$this->image);
        else
            return asset('assets/upload/default.jpg');

    }

}

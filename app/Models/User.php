<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        "profile_image",
        "cover_image",
        "address_live",
        "address_from",
        "information",
        "work_place",

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public $appends = ['profile_image_for_web', 'cover_image_for_web'];
    public function getProfileImageForWebAttribute(){
        if($this->profile_image)
            return asset('assets/upload/user/'.$this->profile_image);
        else
            return asset('assets/upload/default.jpg');

    }
    public function getCoverImageForWebAttribute(){
        if($this->cover_image)
            return asset('assets/upload/user/'.$this->cover_image);
        else
            return asset('assets/upload/default.jpg');

    }
    public function friends(){
        return $this->belongsToMany(User::class, 'user_friends', 'user_id', 'user_friend_id');
    }

    public function friendsOf(){
        return $this->belongsToMany(User::class, 'user_friends', 'user_friend_id', 'user_id');

    }
}

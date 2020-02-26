<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    
    protected $fillable = [
        'title', 'description', 'url','image',
    ];
    
    // public function profileImage()
    // {
    //     $imagePath = ($this->image) ? $this->image : 'profile/avatar2.png';
    //     return 'storage/' . $imagePath;
    // }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage(){
        $imagePath = ($this->image) ? $this->image : 'http://poster.keepcalmandposters.com/default/5926290_no_profile_pic_but_trust_me_im_batman.png';
        return ($this->image) ? ('/storage/'.$this->image) : 'http://poster.keepcalmandposters.com/default/5926290_no_profile_pic_but_trust_me_im_batman.png';
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

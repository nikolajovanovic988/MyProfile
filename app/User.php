<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($user) {
            $user->profile()->create([
                'description' => 'My first description',
            ]);

            $user->profilecontact()->create();
        });
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function profilecontact()
    {
        return $this->hasOne(ProfileContact::class);
    }

    public function profileeducations()
    {
        return $this->hasMany(ProfileEducation::class);
    }

    public function profileprojects()
    {
        return $this->hasMany(ProfileProject::class);
    }

    public function profiletodos()
    {
        return $this->hasMany(ProfileTodo::class);
    }

    public function profilephonebook()
    {
        return $this->hasMany(ProfilePhonebook::class);
    }
}

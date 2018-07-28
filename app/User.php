<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
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
     * favorites list that the user has favorite songs
     */
    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites', 'user_id', 'song_id');
    }
    

    /**
     * addFavorite adds the user's favorite song
     */
    public function addFavorite($user_id)
    {
        if (!$this->favorites->contains($user_id)) {
            $this->favorites()->attach($user_id);
        }
    }
    
    /**
     * removeFavorite removes the user's favorite song
     */
    public function removeFavorite($user_id)
    {
        if (!$this->favorites->contains($user_id)) {
            $this->favorites()->detach($user_id);
        }
    }
}

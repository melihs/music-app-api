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
        return $this->belongsToMany(Song::class, 'favorites', 'user_id', 'song_id')->withPivot('volume', 'is_playing');    
    }


    /**
     * addFavorite adds the user's favorite song
     */
    public function addFavorite($song_id)
    {
        if (!$this->favorites->contains($song_id)) {
            $this->favorites()->attach($song_id);
        }
    }
    
    /**
     * removeFavorite removes the user's favorite song
     */
    public function removeFavorite($song_id)
    {
        if (!$this->favorites->contains($song_id)) {
            $this->favorites()->detach($song_id);
        }
    }
}

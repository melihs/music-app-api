<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = [
        'name',
        'source',
        'category_id'
    ];
    
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

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
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];
    protected $table = 'tags';
    protected $fillable = [
      'name', 'slug',
    ];

    public function posts()
    {
        return $this->belongsToMany('App\Post', 'posts_tags','tags_id', 'posts_id')->withTimestamps();
    }
}

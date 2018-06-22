<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    protected $table = 'categories';
    protected $fillable = [
      'name', 'slug','description'
    ];
    public function posts()
    {
        return $this->belongsToMany('App\Post', 'posts_categories','categories_id', 'posts_id')->withTimestamps();
    }
    public function sites()
    {
        return $this->belongsToMany('App\Site', 'categories_sites','categories_id', 'sites_id')->withTimestamps();
    }
}

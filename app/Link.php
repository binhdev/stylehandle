<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
  protected $guarded = [];
  protected $table = 'links';
  protected $fillable = [
    'posts_id','type','status','episode'
  ];

  public function posts()
  {
      return $this->belongsToMany('App\Post', 'posts_links','links_id', 'posts_id');
  }
}

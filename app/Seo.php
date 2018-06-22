<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $guarded = [];
    protected $table = 'seos';
    protected $fillable = [
      'title','description','share_image','share_url'
    ];
    public function post(){
  		  return $this->belongsTo(Post::class,'posts_id');
  	}
}

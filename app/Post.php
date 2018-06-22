<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    protected $table = 'posts';
    protected $fillable = [
      'title','body','slug','thumbnail','type','active'
    ];

    public function categories() {
				return $this->belongsToMany('App\Category', 'posts_categories','posts_id', 'categories_id');
		}

		public function tags() {
				return $this->belongsToMany('App\Tag', 'posts_tags','posts_id', 'tags_id');
		}
		//returns the instance of the user who is author of that post
		public function author() {
				return $this->belongsTo(User::class,'author_id');
		}
    public function seo(){
         return $this->hasOne('App\Seo','posts_id');
    }
}

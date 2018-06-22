<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $guarded = [];
    protected $table = 'sites';
    protected $fillable = [
      'name','description','slug'
    ];
    public function option(){
         return $this->hasOne('App\Option','sites_id');
    }
    public function categories()
    {
       return $this->belongsToMany('App\Category', 'categories_sites', 'sites_id','categories_id')->withTimestamps();
    }
}

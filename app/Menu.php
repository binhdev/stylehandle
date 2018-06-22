<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = [];
    protected $table = 'menus';
    protected $fillable = [
        'name', 'slug'
    ];
    public function menulinks()
    {
        return $this->hasMany('App\Menulink','menus_id','id');
    }

}

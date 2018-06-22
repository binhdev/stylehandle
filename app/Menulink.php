<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menulink extends Model
{
  protected $guarded = [];
  protected $table = 'menulinks';
  protected $fillable = [
      'menus_id','name', 'sort','url'
  ];
  public function post(){
		return $this->belongsTo(Menu::class,'menus_id');
	}
}

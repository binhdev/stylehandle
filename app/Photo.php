<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $guarded = [];
    protected $table = 'photos';
    protected $fillable = [
      'title','description','caption','alt_text','url','slug'
    ];
}

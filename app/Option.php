<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $guarded = [];
    protected $table = 'options';
    protected $fillable = [
        'sites_id','title','description','site_logo','site_icon','copyright','domain_verify','domain_analytic',
    ];
    public function site(){
  		  return $this->belongsTo(Site::class,'sites_id');
  	}
}

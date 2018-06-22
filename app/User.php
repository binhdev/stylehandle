<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','role'
    ];
    public function posts(){
        return $this->hasMany(Post::class,'author_id','id');
    }
    //chechk if admin
    public function isAdmin(){
          $role = $this->role;
          if($role == 'admin'){
              return true;
          }
          return false;
      }
      //chechk if author
      public function isAuthor(){
          $role = $this->role;
          if($role == 'author'){
              return true;
          }
          return false;
      }
      public function isSubcriber(){
          $role = $this->role;
          if($role == 'subcriber'){
              return true;
          }
          return false;
      }
    protected $hidden = [
        'password', 'remember_token',
    ];
}

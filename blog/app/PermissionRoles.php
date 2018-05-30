<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class PermissionRoles extends Model
{
  protected $table = "permission_role";


  function role(){
    return $this->belongsToMany('App\Role');
  }
}

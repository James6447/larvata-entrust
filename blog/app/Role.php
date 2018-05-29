<?php namespace App;

use Zizaco\Entrust\EntrustRole;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Role extends EntrustRole
{

  use EntrustUserTrait;

  protected $fillable = [
      'name',
      'display_name',
      'description',
  ];

  public function users() {

       return $this->belongsToMany('App\User');
   }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EdituserController extends Controller
{
    public function show()
    {
      $users = \App\User::All();
      $data = compact('users');
      return view('adminEdit',$data);
    }


    public function admin($id)
    {
       $user = \App\User::Find($id);
       $role = \App\Role::where('name','=','admin')->first();
       $user->attachRole($role);
       return redirect()->route('user.show');
    }

    public function owner($id)
    {
       $user = \App\User::Find($id);
       $role = \App\Role::where('name','=','owner')->first();
       $user->attachRole($role);
       return redirect()->route('user.show');
    }

    public function destroy($id)
    {
      $user = \App\User::Find($id);
      $user->delete();

      // if($user->hasRole(['owner', 'admin']){
      //   $user = \App\Models\User::Find($id);
      //   $user->delete();
      // }
      return redirect()->route('user.show');
    }

}

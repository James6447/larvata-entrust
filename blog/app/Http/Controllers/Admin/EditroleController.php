<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Zizaco\Entrust\EntrustRole;
use Illuminate\Support\Facades\Hash;




class EditroleController extends Controller
{
    public function show(){
      $permissions = \App\Permission::all();
      $data = compact('permissions');
      return view('admin.createRole',$data);
    }


    public function create(request $request)
    {
      $validator = Validator::make($request->all(),[
          'name' => 'required|min:3|max:20',
          'display_name' => 'required|min:3|max:20',
          'description' => 'required|min:4|max:255',
      ]);

       if ($validator->fails()) {
         return redirect()->route('show.role')->withErrors(['fail'=>'All Column Must Fill!']);
       }

      $role = \App\Role::create(request(['name', 'display_name', 'description']));
      // count how many permission selected
      $ability = $request['permission'];

      if($ability != 0){
        $count = count($ability);
        for ($i=0; $i < $count ; $i++) {
          $permission = \App\Permission::where('id',$ability[$i])->first();
          $role->attachPermission($permission);
        }
      }
      return view('admin.adminAbility');
    }
}

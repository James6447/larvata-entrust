<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Zizaco\Entrust\EntrustRole;
use Illuminate\Support\Facades\Hash;

class EditpermissionController extends Controller
{
    public function show()
    {
        $role = \App\Role::All();
        $permission = \App\Role::All();
        $data = compact('role');
        $data2 = compact('permission');
        return view('admin.roleList',$data,$data2);

    }


    public function list($id)
    {
        $role = \App\Role::Find($id);
        $permission_role = \DB::table('permissions')
                              ->join('permission_role', 'permission_role.permission_id', '=', 'permissions.id')
                              ->where('permission_role.role_id', $id)
                              ->get();
        $permissions = \App\Permission::All();

        $data = compact('role');
        $data2 = compact('permission_role');
        $data3 = compact('permissions');

        return view('admin.rolePermission',$data3,$data2);
    }


    public function create()
    {
        $role = \App\Role::All();
        $data = compact('role');
        return view('admin.createPermission',$data);
    }


    public function store(request $request)
    {
      $validator = Validator::make($request->all(),[
          'name' => 'required|min:3|max:20',
          'display_name' => 'required|min:3|max:20',
          'description' => 'required|min:4|max:255',
      ]);

      if ($validator->fails()) {
         return redirect()->route('create.permission')->withErrors(['fail'=>'All Column Must Fill!']);
      }

      $permission = \App\Permission::create(request(['name', 'display_name', 'description']));
      //count how many role selected
      $ability = $request['role'];
      $count = count($ability);

      for ($i=0; $i < $count ; $i++) {
        $role = \App\Role::where('id',$ability[$i])->first();
        $role->attachPermission($permission);
      }

      return redirect()->route('create.permission');

    }

    public function update()
    {

    }


    public function destroy($id)
    {
        $role = \App\Role::Find($id);
        $role->delete();
        return redirect()->route('role.list');
    }




}

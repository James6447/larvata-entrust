@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-deck">
                  <div class="card">
                    <h1>Role</h1>
                  {{$i=1}}

                  @foreach($role as $roles)
                  <td>
                    <th>{{ $i++ }}{{ $roles->display_name }}</th>
                    <th><a href="{{ Route('permission.list', $roles->id) }}">Manage</a>
                      <a href="{{ Route('role.destroy', $roles->id) }}">Delete</a>
                    </th>
                  </td>
                  @endforeach
                  </div>

                  <div class="card">
                    <h1>Permission</h1>
                    {{$k=1}}
                    @foreach ($permission as $permissions)
                      <td>
                        <th>{{ $k++ }}{{ $permissions->name }}</th>
                        <th><a href="{{ Route('role.destroy', $roles->id) }}">Delete</a></th>
                      </td>

                      @endforeach
                  </div>
                </div>
                <a href="/admin/list">BACK</a>
@endsection

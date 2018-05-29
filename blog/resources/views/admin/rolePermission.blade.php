@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                          <h1>Role</h1>
                <div class="card-deck">

                  <div class="card">
                    <h3>Current Permission</h3>
                     @foreach($permission_role as $permission)
                     <br>
                     {{ $permission -> display_name}}
                     @endforeach
                   </div>
                   <div class="card">
                     <h3>All Permission</h3>
                     @foreach($permissions as $all)
                     {{ $all -> display_name}}
                     <br>
                     @endforeach
                   </div>



@endsection

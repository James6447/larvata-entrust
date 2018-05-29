@extends('layouts.app')

@section('content')
@if( auth()->check() )

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                  <h2>{{ Auth::user()->email }}</h2>
                     <li class="nav-item">
                         <a class="nav-link font-weight-bold" href="#">Hi {{ auth()->user()->name }}</a>
                     </li>
                     @if($name == "admin")
                     <li class="nav-item">
                         <a class="nav-link font-weight-bold" href="{{ Route('user.show') }}">Edit User</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link font-weight-bold" href="/admin/list">Add Role/Permission</a>
                     </li>
                     @endif

                     <li class="nav-item">
                         <a class="nav-link" href="{{ Route('login.logout') }}">Log Out</a>
                     </li>
                  @else
                     <li class="nav-item">
                         <a class="nav-link" href="/login/show">Log In</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="/register/show">Register</a>
                     </li>
                  @endif

@endsection

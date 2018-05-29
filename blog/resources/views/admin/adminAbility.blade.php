@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <li><a href="{{ Route('show.role') }}">Create a Role</a></li>
                <li><a href="{{ Route('create.permission') }}">Create a Permission</a></li>
                <li><a href="{{ Route('role.list') }}">Manage Role Permission</a></li>
                


@endsection

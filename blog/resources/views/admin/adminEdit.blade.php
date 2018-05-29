@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                  <h2>{{ Auth::user()->email }}</h2>
                  <h3>Edit User</h3>

                  @if ($errors->has('fail'))
                      <div class="fail">{{ $errors->first('fail') }}</div>
                  @endif
                  <table>
                  @foreach ($users as $user)

                    <tr>
                      <th>{{ $user->id }}</th>
                      <th>{{ $user->name }}</th>
                      <th><a href="{{ Route('user.addAmin', $user->id) }}">To Admin</a></th>
                      <th><a href="{{ Route('user.addOwn', $user->id) }}">To Owner</a></th>
                      <th><a href="{{ Route('user.destroy', $user->id) }}">Delete</a></th>
                    </tr>

                    @endforeach
                  </table>

@endsection

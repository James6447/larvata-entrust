@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @if ($errors->has('fail'))
                    <div class="fail">{{ $errors->first('fail') }}</div>
                @endif
                {{ Form::open(['route' => 'store.permission']) }}
                {{ Form::label('name', 'Permission Name') }}<br>
                {{ Form::text('name') }}<br>
                {{ Form::label('display_name', 'Display Name') }}<br>
                {{ Form::text('display_name') }}<br>
                {{ Form::label('Description') }}<br>
                {{ Form::textarea('description') }}<br>

                @foreach($role as $roles)
                {{ $roles->display_name }}{{ Form::checkbox('role[]', $roles->id) }}
                  <br>
                @endforeach

                {{ Form::submit('Submit') }}
                {{ Form::close() }}
                <a href="/admin/list">BACK</a>

@endsection

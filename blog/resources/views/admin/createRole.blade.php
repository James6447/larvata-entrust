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
                {{ Form::open(['route' => 'create.role']) }}
                {{ Form::label('name', 'Role Name') }}<br>
                {{ Form::text('name') }}<br>
                {{ Form::label('display_name', 'Display Name') }}<br>
                {{ Form::text('display_name') }}<br>
                {{ Form::label('Description') }}<br>
                {{ Form::textarea('description') }}<br>

                @foreach($permissions as $permission)
                {{ $permission->display_name }}{{ Form::checkbox('permission[]', $permission->id) }}
                  <br>
                @endforeach

                {{ Form::submit('Submit') }}
                {{ Form::close() }}

@endsection

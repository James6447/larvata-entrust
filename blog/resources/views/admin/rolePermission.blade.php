@extends('layouts.app')

<style>
#sortable1, #sortable2 {
    border: 1px solid #eee;
    width: 142px;
    min-height: 20px;
    list-style-type: none;
    margin: 0;
    padding: 5px 0 0 0;
    float: left;
    margin-right: 10px;
  }
  #sortable1 li, #sortable2 li {
    margin: 0 5px 5px 5px;
    padding: 5px;
    font-size: 1.2em;
    width: 120px;
  }
</style>


<?php
$i=0;
$compare=[0];
?>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                          <h1>Role{{ $role->name }}</h1>
                <div class="card-deck">

                  <div class="card">
                    <h3>Current Permission</h3>
                      <ul id="sortable1" class="connectedSortable">

                        @foreach($permission_role as $permission)
                  	      <li id="{{ $permission->id }}" class="ui-state-default">{{ $permission -> display_name}}</li>
                          <?php $compare[$i++] = $permission->id ?>
                        @endforeach
                  	   </ul>
                   </div>
                   <div class="card">
                     <h3>All Permission</h3>
                     <ul id="sortable2" class="connectedSortable">

                       @foreach($permissions as $all)
                         @if($compare != 0)
                             @if(in_array( $all->id , $compare))
                             @else
                              <li id="{{ $all->id }}" class="ui-state-error">{{ $all -> display_name}}</li>
                             @endif
                         @else
                            <li id="{{ $all->id }}" class="ui-state-error">{{ $all -> display_name}}</li>
                         @endif
                       @endforeach
                     </ul>

                   </div>

                 </div>

             	<input type="submit" value="Submit" onclick="post( {{$role->id}} )">

@endsection

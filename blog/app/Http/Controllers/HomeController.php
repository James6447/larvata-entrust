<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Zizaco\Entrust\EntrustRole;


class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function role()
    {
      $owner = \App\Role::where('name','owner')->first();
      $admin = \App\Role::where('name','admin')->first();
      $user = \App\User::all()->where('name', '=', 'michele')->first();

      $user->attachRole($owner);

      return view('test');

    }

}

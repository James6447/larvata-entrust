<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Zizaco\Entrust\EntrustRole;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function show()
    {
      return View('Auth.adminLogin');
    }


    public function login()
    {
        $input = Input::all();
        $rules = [
          'email'=>'required|email',
          'password'=>'required'
        ];

        $user = \App\User::all()->where('email',$input['email'])->first();

        $validator = Validator::make($input, $rules);

        if ($validator->passes()){
          $attempt = Auth::attempt([
            'email' => $input['email'],
            'password' => $input['password']
          ]);

          //any role
          if ($attempt && $user->hasRole(['owner', 'admin']) ) {
              $name = ['name' => 'admin'];
              return view('users',$name);
          }

          else if($attempt){
              $name = ['name' => 'user'];
              return view('/users',$name);
          }

          // return Redirect::to('login/show')->withErrors(['fail'=>'Email or password is wrong!']);
          return view('auth.adminLogin')->withErrors(['fail'=>'Email or password is wrong!']);
        }


        //fails
        return Redirect::to('login/show')->withErrors($validator)->withInput(Input::except('password'));
      }


    public function logout()
    {
      Auth::guard('web')->logout();
      // return redirect()->route('post.index');
      return view('users');
    }



}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\Auth;

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
<<<<<<< HEAD
    protected $redirectTo = '/';
=======
    protected $redirectTo ='';
>>>>>>> 0b850d4a81185573c3efd125ebbdcfa642fc93bb

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

<<<<<<< HEAD
    protected function redirectTo()
    {   
        $user=Auth::user();
        if ($user->hasRole('admin')) {
            return '/categories';
=======

    protected function redirectTo()
    {
        $user=Auth::user();
        if ($user->hasRole('admin')){
            return '/categories';

        }
        elseif ($user->hasRole('seller')) {
            return '/shop';
            # code...
>>>>>>> 0b850d4a81185573c3efd125ebbdcfa642fc93bb
        }
        else{
            return '/';
        }
    }
}

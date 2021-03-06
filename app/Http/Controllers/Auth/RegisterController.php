<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Seller;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'status'=>['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone'=>$data['phone'],
            'address'=>$data['address'],
        ]);
        if($data['status']==2){

            $seller=Seller::create([          

            'name' => $data['shopname'],
            'category_id'=>$data['type'],
            'user_id'=>$user->id,


        ]);

            $user->assignRole('seller');
        }
        else{
        $user->assignRole('customer');
             
        }
       return $user;
    }


    //overridding to pass data to the register view
    public function showRegistrationForm()
    {
    //Custom code here
        $categories=Category::all();
        return view('auth.register',compact('categories'));

    }
    protected function redirectTo()
    {
        $user=Auth::user();
        $id=Auth::id();
        $role=$user->getRoleNames();

        if ($user->hasRole('admin')){
            return '/categories';

        }
        elseif ($user->hasRole('seller')) {
            return route('shop',['id' => $id]);
        }
        else{
            return '/';
        }
    }


}

<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Post;
use App\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Contracts\Auth\Authenticatable;


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
    protected $redirectTo = 'users.index';
    
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'admin' => 'off',
            'password' => bcrypt($data['password']),
        ]);
        
        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => 'avatar.png'
        ]);
        
        Auth::login($profile);
        //return view("home")->with('posts',Post::all());
               
    }
    
    public function makeAdmin($id)
    {
        $user = User::find($id);
        $user->admin = "on";
        $user->save();
        return view('users/index')->with('users',User::all());
    }
    
    public function notAdmin($id)
    {
        $user = User::find($id);
        $user->admin = "off";
        $user->save();
        return view('users/index')->with('users',User::all());
    }
    
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users/index')->with('users',User::all())
                                  ->with('profile',Profile::all());
    }
    
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);
        
        return view("users/index")->with('users',$users)
                                  ->with('profile',Profile::all());
    }

}

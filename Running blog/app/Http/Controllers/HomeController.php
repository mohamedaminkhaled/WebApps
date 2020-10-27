<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use DB;

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
        $user_id = auth()->user()->id;
        /*$posts = Account::find($user_id);
        
        return view('home')->with('posts', $posts);*/
        
        $str = 'select* FROM accounts WHERE user_id='. $user_id;
        
        $posts = DB::select($str);
        
        return view('home')->with('posts',$posts);
    }
}

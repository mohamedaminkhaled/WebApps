<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function aboutMe(){
        $name = "Mohamed amin khaled";
        return view('about')->with('name', $name);
    }
    
    public function cources(){
        $framework = "Laravel";
        return view('pages.myCources')->with('framework', $framework);
    }
    
    public function getGaliry(){
        return view('galiry');
    }
}

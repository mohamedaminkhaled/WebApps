<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingsController extends Controller
{
     public function index(){
        return view('settings/index')->with('settings',Setting::first());
    }
    
    public function edit(){
        return view('settings/edit')->with('settings',Setting::first());
    }
    
    public function update(Request $request){
        
        $this->validate($request, [
            'blog_name'=>'required',
            'phone_number'=>'required',
            'email'=>'required',
            'address'=>'required',
        ]);
        
        $settings = Setting::first();
        
        $settings->blog_name = $request->input('blog_name');
        $settings->phone_number = $request->input('phone_number');
        $settings->email = $request->input('email');
        $settings->address = $request->input('address');
        $settings->save();
        
        return redirect()->route('settings.index');
    }
}

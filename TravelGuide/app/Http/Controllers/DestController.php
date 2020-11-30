<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;

class DestController extends Controller
{
    public function create(){
        //show form to create Destination
        $destinations = Destination::all();
        return view("destinationsAJAX")->with('destinations', $destinations);
    }
    
    public function store(Request $request){
        //store newly created Destination into DB using AJAX
        if($request->hasFile('image')){
            $fileNameWithExtension = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/storage/destinations_images',$fileNameStore);
        }else{
            $fileNameStore = 'noimage.jpg';
        }
        
        $dest = new Destination();
        $dest->name = $request->input('name');
        $dest->image = $fileNameStore;
        $dest->save();
        
        return redirect()->back();
    }
}

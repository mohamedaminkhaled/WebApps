<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use DB;

class CategoryController extends Controller
{
     
     public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('created_at','desc')->get();
        
        return view("categories/index")->with('category',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("categories/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'category_image'=>'mimes:jpeg,jpg,png,JPEG | max:2000'
        ]);
        
        if($request->hasFile('category_image')){
            $fileNameWithExtension = $request->file('category_image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('category_image')->getClientOriginalExtension();
            $fileNameStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('category_image')->storeAs('public/category_image',$fileNameStore);
        }else{
            $fileNameStore = 'noimage.jpg';
        }
        
        $category = new Category();
        $category->name = $request->name;
        $category->photo = $fileNameStore;
        $category->save();
        
        return redirect()->route('welcome');
        
        //return redirect()->back();
        
        //dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view("categories/edit")->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required',
            'category_image'=>'mimes:jpeg,jpg,png,JPEG | max:2000'
        ]);
        
        $category = Category::find($id);
        
        if($request->hasFile('category_image')){
            $fileNameWithExtension = $request->file('category_image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('category_image')->getClientOriginalExtension();
            $fileNameStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('category_image')->storeAs('public/category_image',$fileNameStore);
            $category->photo = $fileNameStore;
        }
        
        $category->name = $request->name;
        $category->save();
        
        return redirect()->route('welcome');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        
        return redirect()->route('welcome');
    }
}

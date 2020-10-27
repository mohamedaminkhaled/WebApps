<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Account;
use DB;

class postsController extends Controller
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
        $posts = Account::orderBy('created_at','desc')->get();
        //$posts = Account::orderBy('created_at','desc')->paginate(3);
        //$posts = Account::orderBy('created_at','desc')->take(1)->get();
        //$posts = DB::select('select* FROM accounts');
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                'name'=>'required',
                'email'=>'required',
                'subject'=>'required',
                'post_image'=>'mimes:jpeg,jpg,png,JPEG | max:1000',
        ]);
        
        if($request->hasFile('post_image')){
          $fileNameWithExtension = $request->file('post_image')->getClientOriginalName();
          $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
          $extension = $request->file('post_image')->getClientOriginalExtension();
          $fileNameStore = $fileName.'_'.time().'.'.$extension;
          $path = $request->file('post_image')->storeAs('public/post_image',$fileNameStore);
        }else{
          $fileNameStore = 'noImage.jpg';
        }
        
        $post = new Account;
        $post->name = $request->input('name');
        $post->email = $request->input('email');
        $post->subject = $request->input('subject');
        $post->user_id = auth()->user()->id;
        $post->post_image = $fileNameStore;
        $post->save();
        
        return redirect('/posts')->with('success','Done successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Account::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Account::find($id);
        
        if(auth()->user()->id != $post->user_id){
                    return redirect('/posts')->with('error',"Unauthorized! you can't edit this post");
        }
        
        return view('posts.edit')->with('post', $post);
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
         $this->validate($request,[
                'subject'=>'required',
                'post_image'=>'mimes:jpeg,jpg,png | max:1000',
        ]);
         
          if($request->hasFile('post_image')){
          $fileNameWithExtension = $request->file('post_image')->getClientOriginalName();
          $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
          $extension = $request->file('post_image')->getClientOriginalExtension();
          $fileNameStore = $fileName . '_' . time() . '.' . $extension;
          $path = $request->file('post_image')->storeAs('public/post_image',$fileNameStore);
        }else{
          $fileNameStore = 'noImage.jpg';
        }
        
        $post = Account::find($id);
        $post->name = $request->input('name');
        $post->email = $request->input('email');
        $post->subject = $request->input('subject');
        $post->post_image = $fileNameStore;
        $post->save();
        
        return redirect('/posts')->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Account::find($id);
        
        if($post->post_image != 'noImage.jpg'){
          Storage::delete('public/post_image/'.$post->post_image);
        }
        
        $post->delete();
        return redirect('/posts')->with('success','Post deleted successfully');
    }
}

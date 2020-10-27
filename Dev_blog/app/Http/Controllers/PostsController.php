<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Category;
use App\Tag;

class PostsController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::orderBy('created_at','desc')->get();
        
        return view("home")->with('posts',$post);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$category = Category::all();
        
        $tag = Tag::all();
        
        if($tag->count() == 0){
            return redirect()->route('tags.create');
        }
        
        return view('posts.create')->with('category',Category::all())
        ->with('tag',$tag);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'tag_id' => 'required',
            'content' => 'required',
            'post_image'=>'mimes:jpeg,jpg,png,JPEG | max:2000'
        ]);
        
        if($request->hasFile('post_image')){
            $fileNameWithExtension = $request->file('post_image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('post_image')->getClientOriginalExtension();
            $fileNameStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('post_image')->storeAs('public/post_image',$fileNameStore);
        }else{
            $fileNameStore = 'noimage.jpg';
        }
        
        $post = new Post();
        $post->category_id = $request->input('category_id');
        $post->subject = $request->input('content');
        $post->slug = str_slug($request->input('title'));
        $post->img_url = $fileNameStore;
        $post->user_id = auth()->user()->id;
        $post->save();
        
        $post->tags()->attach($request->tag_id);
        
        $post = Post::orderBy('created_at','desc')->get();
        return view("posts/index")->with('posts',$post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $next_post = Post::where('id','>',$post->id)->min('id');
        $prev_post = Post::where('id','<',$post->id)->max('id');
        
        return view("posts/show")->with('post',$post)
                                 ->with('next',Post::find($next_post))
                                 ->with('prev',Post::find($prev_post));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view("posts/edit")->with('post',$post)
        ->with('category',Category::all())->with('tag',Tag::all());
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
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'post_image'=>'mimes:jpeg,jpg,png,JPEG | max:2000'
        ]);
        
        $post = Post::find($id);
        
        if($request->hasFile('post_image')){
            $fileNameWithExtension = $request->file('post_image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('post_image')->getClientOriginalExtension();
            $fileNameStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('post_image')->storeAs('public/post_image',$fileNameStore);
            $post->img_url = $fileNameStore;
        }
        
        $post->category_id = $request->input('category_id');
        $post->subject = $request->input('content');
        $post->slug = str_slug($request->input('title'));
        $post->user_id = auth()->user()->id;
        $post->save();
        
        $post = Post::orderBy('created_at','desc')->get();
        return view("posts/index")->with('posts',$post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        $post = Post::orderBy('created_at','desc')->get();

        return view('/posts/index')->with('posts',$post);
    }
    
    public function trashed()
    {
        $post = Post::onlyTrashed()->get();
        
        return view('/posts/softDeleted')->with('posts',$post);
    }
    
    public function hDelete($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        
        $post = Post::orderBy('created_at','desc')->get();
        return view('/posts/index')->with('posts',$post);
    }
    
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        
        $post = Post::orderBy('created_at','desc')->get();
        return view('/posts/index')->with('posts',$post);
    }
}

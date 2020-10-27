@extends('layout')
@include('includes.navbar')
        @section('content')
            <div class="jumbotron customized">
                <div>
                    <p class="badge badge-dark" style="font-size:18px;">{{$post->name}}</p>
                    <br>
                </div>
                                                
                <img src="/storage/post_image/{{$post->post_image}}" alt="no image!" style="height:250px; width:500px">
        
                <p class="card-text customized">{!!$post->subject!!}</p>
                                                
                <div class="form-inline my-2 my-lg-0">
                    <a class="btn btn-dark" href="/posts">Back</a>
                                        
                    @if(!Auth::guest())
                        @if(Auth::user()->id == $post->user_id)
                            <a class="btn btn-dark" href="/posts/{{$post->id}}/edit">Edit</a>
                            
                            {!! Form::open(['action'=>['postsController@destroy',$post->id], 'method'=>'POST']) !!}
                                {{ Form::submit('Delete',['class'=>"btn btn-dark submit"]) }}
                                {{ Form::hidden('_method','DELETE') }}             
                            {!! Form::close() !!}
                        @endif
                    @endif
                </div>
                                    
                <span class="badge badge-danger" style="font-size:14px;">created_at: {{$post->created_at}}</span>
            </div>
        @endsection
@extends('layout')
@include('includes.navbar')
        @section('content')
                @if(count($posts) > 0)
                    <div class="container">                        
                        @foreach($posts as $post)
                            <div class="row">
                                <div class="jumbotron customized">
                                <div>
                                    <p class="badge badge-dark">{{$post->name}}</p>
                                    <br>
                                </div>
                                            
                                <img src="/storage/post_image/{{$post->post_image}}" alt="no image!" style="height:250px; width:500px">
                                
                                <p class="card-text customized">{!!$post->subject!!}</p>
                                            
                                <div>
                                    <a class="btn btn-dark" href="/posts/{{$post->id}}">More</a>
                                </div>
                                    <span class="badge badge-danger" style="font-size:14px;">created_at: {{$post->created_at}}</span>
                                    
                                </div>
                            </div>
                        @endforeach        
                    </div> 
                @else
                    <div class="alert alert-dismissible alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Oh snap!</strong> No posts found.
                    </div>
                @endif
        @endsection
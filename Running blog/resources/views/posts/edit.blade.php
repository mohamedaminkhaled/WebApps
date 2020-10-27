@extends('layout')
@include('includes.navbar')
        @section('content')
            
            <div class="container create-post">
                <div class="row">
                    
                    <div class="col-md-8 col-md-offset-2">
                        
                        <h1>Edit post</h1>
                        
                        {!! Form::open(['action'=>['postsController@update',$post->id], 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
                        
                            <div class="form-group">
								<label for="name" class="require">Name</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="name" placeholder="Name" value="{{$post->name}}" readonly>
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="require">Email</label>
								<div class="col-md-9">
									<input type="email" class="form-control" name="email" placeholder="Email" value="{{$post->email}}" readonly>
								</div>
							</div>
     
                            <div class="form-group">
                                <label for="subject">Write your post<strong class="star">*</strong></label>
                                <textarea rows="5" class="form-control" id="article-ckeditor" name="subject" value={!!$post->subject!!}</textarea>
                            </div>
							
							<div class="file-field">
									  <div class="mb-4">
										<img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
										  class="rounded-circle z-depth-1-half avatar-pic" alt="example placeholder avatar">
									  </div>
									  <p>Choose image</p>
									  <div class="form-group">
										<div class="btn btn-mdb-color btn-rounded float-left">
										  <input name="post_image" type="file" class="btn btn-secondary">
										</div>
									  </div>
							</div>
                            <br><br>
                            <div class="form-group">
                                <p><span class="require"><strong class="star">*</strong></span>  required fields</p>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark">
                                    Update
                                </button>
                                <a class="btn btn-ganger" href="/posts/{{$post->id}}">Cancel</a>
                            </div>
                            
                            {{ Form::hidden('_method','PUT') }}
                            
                        {!! Form::close() !!}
                    </div>
                    
                </div>
            </div>
        @endsection
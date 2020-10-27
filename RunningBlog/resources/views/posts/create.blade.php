@extends('layout')
@include('includes.navbar')

        @section('content')
            
            <div class="container create-post">
                <div class="row">
                    
                    <div class="col-md-8 col-md-offset-2" >
                        
                        <h1>Create post</h1>
                        
                        {!! Form::open(['action'=>'postsController@store', 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
                        
                            <div class="form-group">
								<label for="name" class="require">Name<strong class="star"></strong></label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="name" placeholder="Name" value="{{Auth::user()->name}}" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label for="email" class="require">Email<strong class="star"></strong></label>
								<div class="col-md-9">
									<input type="email" class="form-control" name="email" placeholder="Email" value="{{Auth::user()->email}}" readonly>
								</div>
							</div>
     
                            <div class="form-group">
                                <label for="subject">Write your post<strong class="star">*</strong></label>
                                <textarea rows="5" class="form-control", id="article-ckeditor" name="subject"></textarea>
                            </div>
							
							<div class="form-group">
								
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
								
							</div>
							<br><br>
							<!--{{form::input('file','post_image')}}-->
							
                            <div class="">
                                <p><strong class="star">*</strong>Required fields</p>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark">
                                    Post
                                </button>
                                <a class="btn btn-danger" href="/posts">Cancel</a>
                            </div>
								                            
                        {!! Form::close() !!}
                    </div>
                    
                </div>
            </div>
        @endsection
		
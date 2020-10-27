<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Styles -->
        <link href="{{ asset('css/forms.css') }}" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    </head>
    <style>
        
    </style>
    <body>
        @include('includes.navbar')
        <div class="custom_form">
            <h3>Create Post</h3>
            {!! Form::open(['action'=>'PostsController@store', 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
                <fieldset>
                    <div class="form-group">
                        <label class="form_fields"  for="exampleInputEmail1">Email address</label>
                        <input name="email" type="email" class="form-control form_fields" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{Auth::user()->email}}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form_fields"  for="exampleInputEmail1">Title</label>
                        <input name="title" type="text" class="form-control form_fields">
                    </div>
                    <div class="form-group">
                        <label class="form_fields" for="cars">Select Tag:</label>
                        @foreach($tag as $tag)
                            <fieldset class="form-group">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input name="tag_id[]" class="form-check-input" type="checkbox" value="{{$tag->id}}" >
                                    {{$tag->name}}
                                  </label>
                                </div>
                            </fieldset>
                        @endforeach
                        <br>
                    </div>
                    <div class="form-group">
                        <label class="form_fields" for="cars">Select category:</label>
                        <select name="category_id" id="cars">
                            <option value=""></option>
                            @foreach($category as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form_fields" for="exampleTextarea">Write your post</label>
                        <textarea name="content" style="font-size: 18px; width: 300px;" class="form-control" id="exampleTextarea" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form_fields" for="exampleInputFile">File input</label>
                        <input name="post_image" type="file" class="form-control-file form_fields" id="exampleInputFile" aria-describedby="fileHelp" >
                    </div>
                    <button type="submit" class="btn_submit custom">Submit</button>
                </fieldset>
            {!! Form::close() !!}
      </div>
    </body>
</html>
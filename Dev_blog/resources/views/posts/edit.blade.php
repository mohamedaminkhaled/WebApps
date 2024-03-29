<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Write post</title>

    <!-- Font special for pages-->
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i')}}" rel="stylesheet">

    <!-- Main CSS-->
    <link href="{{ asset('css/main-post.css')}}" rel="stylesheet" media="all">

    <style>
        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto;
            grid-gap: 10px;
            padding: 10px;
        }
        
        .choose-file{
            font-size: 16px;
        }
    </style>
    
</head>

<body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Edit your post</h2>
                </div>
                <div class="card-body">
                    {!! Form::open(['action'=>['PostsController@update',$post->id], 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
                        <div class="form-row">
                            <div class="name"  for="exampleInputEmail1">Email address</div>
                            <div class="value">
                                <input name="email" type="email" class="input--style-6" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{Auth::user()->email}}" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name"  for="exampleInputEmail1">Title</div>
                            <div class="value">
                                <input name="title" type="text" class="input--style-6" value="{{$post->slug}}">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="name">Write your post</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="content">{{$post->subject}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Upload image</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input class="choose-file" type="file" name="post_image">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn--radius-2 btn--blue-2" type="submit">Publish post</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>


    <!-- Main JS-->
    <script src="{{ asset('js/global.js')}}"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
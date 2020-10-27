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
        .flex-container {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            align-items: center;
            margin:60px 0px 40px 0px;
        }
          
        .flex-container > div {
            width: 500px;
            margin-top: 40px;
            text-align: center;
            background-color: MediumTurquoise;
            line-height: 50px;
            font-size: 20px;
            padding: 20px;
        }
        
        .header{
            text-align: center;
        }
        
        .badge.badge-danger.customized{
            padding: 10px 10px 10px 10px;
            font-size:16px;
        }
        
        .date-created{
            text-align: left;
            padding-left: 10px;
        }
        
        .post-title{
            font-size: 26px;
            text-align: left;
            padding-left: 10px;
        }
        
        .content{
            text-align: left;
            padding-left: 10px;
        }
        
        .post-image{
            text-align: left;
            padding-left: 10px;
        }
        
        .buttons{
            text-align: left;
            padding-left: 10px;
        }
        
    </style>
    <body>
        @include('includes.navbar')
        <div class = "header">
            <h2>Deleted Posts</h2>
        </div>
        @if(count($posts) > 0)
            <div class="flex-container">
                @foreach($posts as $post)
                    <div class="post">                        
                        <div class="date-created">
                            <span class="badge badge-danger customized">created_at: {{$post->created_at}}</span>
                        </div>
                        <div class="post-title">
                            <p>{!!$post->slug!!}</p>
                        </div>
                        <div class="content">
                            <p>{!!$post->subject!!}</p>
                        </div>
                        <div class="post-image">
                            <img src="/storage/post_image/{{$post->img_url}}" alt="No image!" style="height:250px; width:450px">
                        </div>
                        <div class="buttons">
                            <a class="btn btn-success" href="/posts/restore/{{$post->id}}">Restore</a>
                            <a class="btn btn-danger" href="/posts/hDelete/{{$post->id}}">Delete</a>
                        </div>
                                                
                    </div> 
                @endforeach
            </div>
        @else
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Oh snap!</strong> No trashed posts found.
            </div>
        @endif
    </body>
</html>
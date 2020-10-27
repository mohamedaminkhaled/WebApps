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
        }
          
        .flex-container > div {
            width: 350px;
            margin-top: 40px;
            text-align: center;
            background-color: MediumTurquoise;
            line-height: 50px;
            font-size: 30px;
        }
        
        .header{
            text-align: center;
        }
        
        .links-category{
            font-size: 18px;
            font-weight: bold;
            text-align: right;
            padding-right: 10px;
            
        }
        
        .link-edit-category{
            color: MidnightBlue;
            padding-right: 10px;
        }
        
        .link-delete-category{
            color: OrangeRed;    
        }
        
        .category-title{
            padding-left: 10px;
            text-align: left;
        }
        
        .date-created{
            padding-left: 10px;
            text-align: left;
        }
        
    </style>
    <body>
        @include('includes.navbar')
        <div class = "header">
            <h2>All categories</h2>
        </div>
            @if(count($category) > 0)
                <div class="flex-container">
                    @foreach($category as $category)
                        <div style = "margin: 20px;">
                            <h4 class = "category-title">{{$category->name}}</h4>
                            <div class = "date-created">
                                <span class="badge badge-pill badge-light" style="font-size:16px; padding: 10px 10px 10px 10px;">created_at: {{$category->created_at}}</span>
                            </div>
                            <div class = "links-category">
                                <a class = "link-edit-category" href = "/categories/edit/{{$category->id}}">Edit</a>
                                <a class = "link-delete-category" href = "/categories/delete/{{$category->id}}">Delete</a>
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
    </body>
</html>
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
                    <h2 class="title">Edit blog settings</h2>
                </div>
                <div class="card-body">
                    {!! Form::open(['action'=>'SettingsController@update', 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
                        <div class="form-row">
                            <div class="name"  for="exampleInputEmail1">Blog name</div>
                            <div class="value">
                                <input name="blog_name" type="text" class="input--style-6" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$settings->blog_name}}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name"  for="exampleInputEmail1">Phone number</div>
                            <div class="value">
                                <input name="phone_number" type="text" class="input--style-6" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$settings->phone_number}}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name"  for="exampleInputEmail1">Email</div>
                            <div class="value">
                                <input name="email" type="email" class="input--style-6" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$settings->email}}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name"  for="exampleInputEmail1">Address</div>
                            <div class="value">
                                <input name="address" type="text" class="input--style-6" value="{{$settings->address}}" required>
                            </div>
                        </div>
                        
                        <div class="card-footer">
                            <button class="btn btn--radius-2 btn--blue-2" type="submit">Edit</button>
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
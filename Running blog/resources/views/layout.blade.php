@include('includes.messages')
<DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
                        
        <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
        
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        
        <script src="https://kit.fontawesome.com/2ce2614f00.js" crossorigin="anonymous"></script>
        
        <!------ Include the above in your HEAD tag ---------->
        <!--
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        -->
        <!-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> -->
        
        <script></script>
        
        <style>
  
        .nav-item{
            display: block;
        }
        
            body{
                background-color:#1d3030;
            }
            
            .jumbotron.customized{
                background-color:#132020;
                color: #eff5f5;
                font-size: 20px;
                margin-top: 30px;
                width:700px;
                margin-left: 230px;
                border: 2px solid gray;
                box-shadow: 2px 2px grey;
            }
            
             .jumbotron.customized:hover{
             border: 3px solid gray;
                box-shadow: 3px 3px 8px grey;
             }
            
            .description{
                margin-top: 50px;
                text-align: center;
                color: #eff5f5;
            }
            
            .card-text.customized{
                color: #eff5f5;
            }
            
            .name{
                font-size: 24px;
            }
            
            .card.text-white.bg-danger.mb-3{
                text-align: center;
                /*margin-left: 37% ;*/
                font-size: 24px;
            }
            
            .badge.badge-success{
                font-size: 16px;
            }
            
            .table{
                text-align: center;
            }
            
            .btn.btn-info{
                width: 60px;
                height: 30px;
                font-size: 16px;
                text-align: center;
            }
            
            .container.create-post{
                margin-left: 300px;
                margin-top: 30px;
                width: 800px;
                background-color: #4d8080;
                box-shadow: 3px 3px 3px #4d8080;
                border-radius: 10px;
            }
            
            .nav-link.create{
                color: DarkBlue;
                font-weight: bold;
                background-color: LightBlue;
                margin: 0px;
            }
            
            .container{
                font-size: 24px;
            }
            
            .star{
                color: red;
            }
            
            .btn.btn-dark.submit{
                margin-left: 300px;
                margin-bottom: -12px;
                background-color: red;
            }
            
            .btn.btn-dark{
                border: 0;
                margin-right: 20px;
                margin-bottom: 5px;
                width: 80px;
            }
            
            .btn.btn-dark.back{
                background-color: RoyalBlue;
            }
            
            .btn.btn-dark.edit{
                background-color: MediumTurquoise;
            }
            
            .dropdown.username{
                margin-right: 20px;
            }
            
            .dropdown-list{
                color: black;
                padding-left: 5px;
                display: block;
                text-decoration: none;
                
            }
            
            .dropdown-list:hover {
                text-decoration: none;
                background-color: LightGray;
            }
            
            .avatar-pic {
                width: 100px;
                height: 100px;
            }
            
            .list-inline-item.customized{
                margin-right: 30px;
            }
            
            .list-inline-item.customized:hover{
                cursor:pointer;
            }
            
        </style>
        
    </head>
    <body>
    
        @yield('content')
        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        
        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script>
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
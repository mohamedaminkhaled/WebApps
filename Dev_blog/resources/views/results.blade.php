<!doctype html>
<html lang="en">

  <head>
    <title>Tutor &mdash; Free Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/brand/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

  </head>
  
    <style>
    .dropdown-menu{
        background-color: black;
        padding: 5px 5px 5px 5px;
    }
    
    .login-register{
        padding-left:150px;
    }
    
    .login{
        padding-right:10px;
    }
    
    .register{
        color: red;
    }
    .link-edit-category{
        color: MidnightBlue;
        padding-right: 10px;
    }
    
    .link-delete-category{
        color: OrangeRed;    
    }
    
  </style>

  <body>
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>

      <header class="site-navbar light site-navbar-target" role="banner">
        @include('layouts.navbar')
      </header>
      
      <div class="site-section-cover overlay" style="background-image: url('images/hero_bg.jpg');">
        
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-10 text-center">
              <h1><strong>Blog Posts</strong></h1>
            </div>
          </div>
        </div>
      </div>

      <div class="site-section bg-light">
      <div class="container">
        <div class="row">
            <div class="col-12">
              <div class="heading mb-4">
                <h2>Search results for: ' {{$query}} '</h2>
              </div>
            </div>
            @if(count($posts) > 0)
                <div class="col-12">
                    <div>
                        <h2>Posts:</h2>
                        <br><br>
                    </div>
                </div>
                @foreach($posts as $post)
                  <div class="col-lg-6 col-md-6 mb-8">
                    <div class="post-entry-1 h-100">
                      <a href="single.html" class="thumbnail-link">
                        <img src="storage/post_image/{{$post->img_url}}" alt="Image"
                         class="img-fluid" style="width:400px; height:250px">
                      </a>
                      <div class="post-entry-1-contents">
                        <?php
                          $user = App\User::find($post->user_id)
                        ?>
                        <h2><a href="single.html">{{$post->slug}}</a></h2>
                        <span class="d-inline-block mb-3">{{$post->created_at}} <span class="mx-2">by</span>{{$user->name}}</span>
                        <p>{!!$post->subject!!}</p>
                      </div>
                      <div class="buttons">
                        <a class="btn btn-dark" href="/posts/{{$post->id}}">Comment</a>
                        @if(Auth::user()->id == $post->user_id)
                          <a class="btn btn-success" href="/posts/edit/{{$post->id}}">Edit</a>
                          <a class="btn btn-danger" href="/posts/delete/{{$post->id}}">Delete</a>
                        @endif
                      </div>
                    </div>
                    <br><br>
                  </div>
                @endforeach
            @endif
            
            @if(count($categories) > 0)
                <div class="col-12">
                    <div>
                        <h2>Categories:</h2>
                        <br><br>
                    </div>
                </div>
                @foreach($categories as $category)
                  <div class="col-lg-6">
                    <div class="d-flex tutorial-item mb-4">
                      <div class="img-wrap">
                        <img src="storage/category_image/{{$category->photo}}" alt="Image" class="img-fluid">
                      </div>
                      <div>
                        <h3><a href="#">{{$category->name}}</a></h3>
                        <p><a href="/categoryPosts/{{$category->id}}" class="btn btn-primary custom-btn">Posts</a></p>
                        <div class = "links-category">
                            @if(Auth::user()->admin == 'on')
                                <a class = "link-edit-category" href = "/categories/edit/{{$category->id}}">Edit</a>
                                <a class = "link-delete-category" href = "/categories/delete/{{$category->id}}">Delete</a>
                            @else
                                <a class = "link-edit-category" href = "#" >Edit</a>
                                <a class = "link-delete-category" href = "#" >Delete</a>
                            @endif
                        </div>
                      </div>
                    </div>              
                  </div>
                @endforeach
            @endif
            
            @if(count($tags) > 0)
                <div class="col-12">
                    <div>
                        <br>
                        <h2>Tags:</h2>
                        <br><br>
                    </div>
                </div>
                @foreach($tags as $tag)
                    <div class="col-lg-4">
                      <div class="d-flex tutorial-item mb-4">
                        <div>
                          <h3><span class="badge badge-pill badge-info">{{$tag->name}}</span></h3>
                          <div class = "links-category">
                            @if(Auth::user()->admin == 'on')
                                <a class = "link-edit-category" href = "/tags/edit/{{$tag->id}}">Edit</a>
                                <a class = "link-delete-category" href = "/tags/delete/{{$tag->id}}">Delete</a>
                            @else
                                <a class = "link-edit-category" href = "#" >Edit</a>
                                <a class = "link-delete-category" href = "#" >Delete</a>
                            @endif
                          </div>
                        </div>
                      </div>              
                    </div>
                @endforeach
            @endif
        </div>

      </div>
    </div>
      <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <h2 class="footer-heading mb-4">About Us</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
              <ul class="list-unstyled social">
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-instagram"></span></a></li>
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-linkedin"></span></a></li>
              </ul>
            </div>
            <div class="col-lg-8 ml-auto">
              <div class="row">
                <div class="col-lg-3">
                  <h2 class="footer-heading mb-4">Quick Links</h2>
                  <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Testimonials</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
                <div class="col-lg-3">
                  <h2 class="footer-heading mb-4">Resources</h2>
                  <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Testimonials</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
                <div class="col-lg-3">
                  <h2 class="footer-heading mb-4">Support</h2>
                  <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Testimonials</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
                <div class="col-lg-3">
                  <h2 class="footer-heading mb-4">Company</h2>
                  <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Testimonials</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
              <div class="border-top pt-5">
                <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
              </div>
            </div>

          </div>
        </div>
      </footer>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

  </body>

</html>


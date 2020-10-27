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
    
    .tags{
      padding-left: 20px;
    }
    
    .badge-link{
      color: white;
      font-size: 20px;
      padding: 20px 20px 20px 20px;
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
              <h1>Our <strong>Categories</strong></h1>
            </div>
          </div>
        </div>
      </div>
      
      <br><br>
              
      <div class="tags">
        @foreach($tags as $tag)
          <span class="badge badge-pill badge-secondary"><a class="badge-link" href="#">{{$tag->name}}</a></span>
        @endforeach
      </div>
        
      <div class="site-section bg-light">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="heading mb-4">
                <span class="caption">Latest</span>
                <h2>Categories</h2>
              </div>
            </div>
            @foreach($category as $category)
              <div class="col-lg-6">
                <div class="d-flex tutorial-item mb-4">
                  <div class="img-wrap">
                    <img src="storage/category_image/{{$category->photo}}" alt="Image" class="img-fluid">
                  </div>
                  <div>
                    <h3><a href="#">{{$category->name}}</a></h3>
                    @if(Auth::user())
                      <p><a href="/categoryPosts/{{$category->id}}" class="btn btn-primary custom-btn">Posts</a></p>
                    @else
                      <p><a href="{{ route('login') }}" class="btn btn-primary custom-btn">Posts</a></p>
                    @endif
                    <div class = "links-category">
                        <a class = "link-edit-category" href = "/categories/edit/{{$category->id}}">Edit</a>
                        <a class = "link-delete-category" href = "/categories/delete/{{$category->id}}">Delete</a>
                    </div>
                  </div>
                </div>              
              </div>
            @endforeach
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


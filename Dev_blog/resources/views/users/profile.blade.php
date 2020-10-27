<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Elen - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700')}}" rel="stylesheet">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/animate.css')}}">
    
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min-profile.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min-profile.css')}}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup-profile.css')}}">

    <link rel="stylesheet" href="{{ asset('css/aos-profile.css')}}">

    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker-profile.css')}}">
    <link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css')}}">
    
    <link rel="stylesheet" href="{{ asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style-profile.css')}}">	
	</head>
  
	<body>
		<div id="colorlib-page">
			<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
			<aside id="colorlib-aside" role="complementary" class="js-fullheight text-center">
				<h1 id="colorlib-logo"><a href="/home">Home<span>.</span></a></h1>
				<nav id="colorlib-main-menu" role="navigation">
					<ul>
						<li><a href="about.html">About</a></li>
						<li><a href="contact.html">Contact</a></li>
						<li>
							<a href="{{ route('logout') }}"
									onclick="event.preventDefault();
													 document.getElementById('logout-form').submit();">
									Logout
							</a>
		
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
							</form>
						</li>
					</ul>
				</nav>
	
				<div class="colorlib-footer">
					<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
					<ul class="list-unstyled social">
						<li><a href="#"><i class="icon-facebook"></i></a></li>
						<li><a href="#"><i class="icon-twitter"></i></a></li>
						<li><a href="#"><i class="icon-instagram"></i></a></li>
						<li><a href="#"><i class="icon-linkedin"></i></a></li>
					</ul>
				</div>
			</aside> <!-- END COLORLIB-ASIDE -->
			<div id="colorlib-main">
				<div class="hero-wrap js-fullheight" style="background-image: url({{ asset('images/bg_1.jpg')}});" data-stellar-background-ratio="0.5">
					<div class="overlay"></div>
					<div class="js-fullheight d-flex justify-content-center align-items-center">
						<div class="col-md-8 text text-center">
							<div class="img mb-4" style="background-image: url({{ asset('storage/avatar/avatar.png')}});"></div>
							<div class="desc">
								<h2 class="subheading">Hello I'm</h2>
								<h1 class="mb-4">{!!$user->name!!}</h1>
								<p class="mb-4">I am A Blogger Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
								<p><a href="#" class="btn-custom">More About Me <span class="ion-ios-arrow-forward"></span></a></p>
							</div>
						</div>
					</div>
				</div>
				<section class="ftco-section">
				<div class="container">
					<div class="row justify-content-center mb-5 pb-2">
						<div class="col-md-7 heading-section text-center ftco-animate">
							<h2 class="mb-4">My posts</h2>
						</div>
					</div>
					<div class="row">
						@foreach($posts as $post)
							<div class="col-lg-6 col-md-6 mb-8">
								<div class="post-entry-1 h-100">
									<a href="single.html" class="thumbnail-link">
										<img src="<?php echo asset("storage/post_image/$post->img_url")?>"alt="Image"
										 class="img-fluid" style="width:300px; height:200px"></img>
									</a>
									<div class="post-entry-1-contents">
										
										<h2><a href="single.html">{{$post->slug}}</a></h2>
										<span class="d-inline-block mb-3">{{$post->created_at}} <span class="mx-2">by</span>{{Auth::user()->name}}</span>
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
					</div>
				</div>
			</section>
			<footer class="ftco-footer ftco-bg-dark ftco-section">
				<div class="container px-md-5">
					<div class="row mb-5">
						<div class="col-md">
							<div class="ftco-footer-widget mb-4 ml-md-4">
								<h2 class="ftco-heading-2">Category</h2>
								<ul class="list-unstyled categories">
									<li><a href="#">Photography <span>(6)</span></a></li>
									<li><a href="#">Fashion <span>(8)</span></a></li>
									<li><a href="#">Technology <span>(2)</span></a></li>
									<li><a href="#">Travel <span>(2)</span></a></li>
								</ul>
							</div>
						</div>
						<div class="col-md">
							 <div class="ftco-footer-widget mb-4">
								<h2 class="ftco-heading-2">Archives</h2>
								<ul class="list-unstyled categories">
									<li><a href="#">October 2018 <span>(6)</span></a></li>
									<li><a href="#">September 2018 <span>(6)</span></a></li>
									<li><a href="#">August 2018 <span>(8)</span></a></li>
									<li><a href="#">July 2018 <span>(2)</span></a></li>
									<li><a href="#">June 2018 <span>(7)</span></a></li>
								</ul>
							</div>
						</div>
						<div class="col-md">
							<div class="ftco-footer-widget mb-4">
								<h2 class="ftco-heading-2">Have a Questions?</h2>
								<div class="block-23 mb-3">
									<ul>
										<li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
										<li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
										<li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
	
							<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
		Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
		<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
						</div>
					</div>
				</div>
			</footer>
			</div><!-- END COLORLIB-MAIN -->
		</div><!-- END COLORLIB-PAGE -->
	
		<!-- loader -->
		<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
	
	
		<script src="{{ asset('js/jquery.min-profile.js')}}"></script>
		<script src="{{ asset('js/jquery-migrate-3.0.1.min-profile.js')}}"></script>
		<script src="{{ asset('js/popper.min-profile.js')}}"></script>
		<script src="{{ asset('js/bootstrap.min-profile.js')}}"></script>
		<script src="{{ asset('js/jquery.easing.1.3-profile.js')}}"></script>
		<script src="{{ asset('js/jquery.waypoints.min-profile.js')}}"></script>
		<script src="{{ asset('js/jquery.stellar.min.js')}}"></script>
		<script src="{{ asset('js/owl.carousel.min-profile.js')}}"></script>
		<script src="{{ asset('js/jquery.magnific-popup.min-profile.js')}}"></script>
		<script src="{{ asset('js/aos-profile.js')}}"></script>
		<script src="{{ asset('js/jquery.animateNumber.min-profile.js')}}"></script>
		<script src="{{ asset('js/bootstrap-datepicker-profile.js')}}"></script>
		<script src="{{ asset('js/jquery.timepicker.min.js')}}"></script>
		<script src="{{ asset('js/scrollax.min.js')}}"></script>
		<script src="{{ asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false')}}"></script>
		<script src="{{ asset('js/google-map.js')}}"></script>
		<script src="{{ asset('js/main-profile.js')}}"></script>
  </body>
</html>
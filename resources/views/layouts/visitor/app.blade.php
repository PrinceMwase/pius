<!DOCTYPE HTML>

<html>
	<head>
		<title>{{env("APP_NAME", 'ST Pius')}}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{asset('visitor/css/main.css')}}" />
		<noscript><link rel="stylesheet" href="{{asset('visitor/css/noscript.css')}}" /></noscript>
		<style>
			.contactList li{
				list-style: none;
			}
		</style>
	</head>
	<body class="landing is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<h1><a href="index.html">{{env("APP_NAME", 'ST Pius')}}</a></h1>
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
											<li><a href="{{url('/')}}">Home</a></li>
											<li><a href="{{url('event')}}">News and Events</a></li>
											<li><a href="{{route('register')}}">Membership</a></li>
											<li><a href="#contact">Contact</a></li>
											<li><a href="{{url('about')}}">About Us</a></li>
											<li><a href="{{url('getcalender')}}">Calender</a></li>
											<li><a href="{{route('login')}}">Login</a></li>
											<li>
												<form method="post" action="{{url('event')}}" id="search">
													@csrf
													<div class="row gtr-uniform">
														<div class=" ">
															<input type="text" name="search" class=" primary fa-search icon solid" value="" placeholder="search">
															
															<a href="#" class="button  icon solid fa-search" onclick="document.getElementById('search').submit()">Search</a>
														</div>
														
													</div>
												</form>
											</li>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Banner -->
				@if ( Route::currentRouteName() =='visitorHome')
					<section id="banner">
						<div class="inner">
							
								<h2>ST PIUS Catholic CHurch</h2>
							<p>Well known as a model Parish<br />
							of Blantyre<br /></p>
							<ul class="actions special">
								<li><a href="{{route('register')}}" class="button primary">Register</a></li>
							</ul>
						</div>
						<a href="#one" class="more scrolly">Learn More</a>
							
							
						
							

					</section>
					@else
					<article id="main">
						<header>
							<h2>{{$title}}</h2>
						
						</header>
						
					</article>
					@endif

                    {{-- content --}}
                        @yield('content')
                    {{-- endcontent --}}
	
				<!-- Footer -->
					<footer id="footer">
						<ul class="contactList" id="contact">
							<li>
								<h3>Email</h3>
								<a href="#">customercare@stpius.com</a>
							</li>
							<li>
								<h3>Phone</h3>
								<a href="#">+265 000-0000</a>
							</li>
							<li>
								<h3>Address</h3>
								<span>1234 Chilobwe, Blantyre</span>
							</li>
							<li>
								<h3>Malawi</h3>
								<ul class="icons">
									<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon brands fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
									<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
									<li><a href="#" class="icon brands fa-codepen"><span class="label">Codepen</span></a></li>
								</ul>
							</li>
						</ul>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="{{asset('visitor/js/jquery.min.js')}}"></script>
			<script src="{{asset('visitor/js/jquery.scrollex.min.js')}}"></script>
			<script src="{{asset('visitor/js/jquery.scrolly.min.js')}}"></script>
			<script src="{{asset('visitor/js/browser.min.js')}}"></script>
			<script src="{{asset('visitor/js/breakpoints.min.js')}}"></script>
			<script src="{{asset('visitor/js/util.js')}}"></script>
			<script src="{{asset('visitor/js/main.js')}}"></script>

			@yield('script')
	</body>
</html>
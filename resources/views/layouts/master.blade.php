<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
	<meta name="author" content="Bootlab">

	<title>@yield('title')</title>

	<link rel="preconnect" href="//fonts.gstatic.com/" crossorigin="">

	
	<link href="{{asset('assets/authh/css/classic.css')}}" rel="stylesheet"> 
	
	<style>
		body {
			opacity: 0;
		}
	</style>

<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-6"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-120946860-6');
</script>
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content ">
				<a class="sidebar-brand text-decoration:none" href="#">
          <i class="align-middle" data-feather="box"></i>
          <span class="align-middle">Election Survey</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Main
					</li>
					<li class="sidebar-item active">
						<a href="/dashboard" class="sidebar-link">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
						
					</li>
                   
					<li class="sidebar-item">
						<a href="#auth" data-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Candidates</span>
            </a>
						<ul id="auth" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('add')}}">Add Candidate</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('addp')}}">Add Points</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('viewcand')}}">Candidate List</a></li>
						</ul>
					</li>

					<li class="sidebar-item">
						<a href="/admin/export" class="sidebar-link">
              <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Export Report</span>
            </a>
					</li>

				</ul>

				<div class="sidebar-bottom d-none d-lg-block">
					<div class="media">
						<div class="media-body">
							<h5 class="mb-1">Admin Panal <i class="fas fa-circle text-success"></i></h5> 
							
						</div>
					</div>
				</div>

			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light bg-white">
				<a class="sidebar-toggle d-flex mr-2">
          <i class="hamburger align-self-center"></i>
        </a>

				<form class="form-inline d-none d-sm-inline-block">
					<input class="form-control form-control-no-border mr-sm-2" type="text" placeholder="Search..." aria-label="Search">
				</form>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav ml-auto">
						
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
					</ul>
				</div>
			</nav>

@yield('content')

		</div>
	</div>

	<script src="{{asset('assets/authh/js/app.js')}}"></script>

</body>

</html>
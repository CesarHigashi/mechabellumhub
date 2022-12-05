<!-- Header -->
<div class="allcontain">
	<div class="header">
		<ul class="logreg">
			@if (Route::has('login'))
			@auth
				<form action="{{ route('logout') }}" method="POST">
					@csrf
					<x-jet-dropdown-link href="{{ route('logout') }}"
					onclick="event.preventDefault(); this.closest('form').submit();">
					<span>Salir</span>
					</x-jet-dropdown-link>
				</form>     
			@else
				<li><a href="{{ route('login') }}">Login </a> </li>
				@if (Route::has('register'))
					<li><a href="{{ route('register') }}"><span class="register">Registrarse</span></a></li>
				@endif
			@endauth   
			@endif
		</ul>
	</div>
	<!-- Navbar Up -->
	<nav class="topnavbar navbar-default topnav">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed toggle-costume" data-toggle="collapse" data-target="#upmenu" aria-expanded="false">
					<span class="sr-only"> Toggle navigaion</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>	 
		</div>
		<div class="collapse navbar-collapse" id="upmenu">
			<ul class="nav navbar-nav" id="navbarontop">
				<li class="active"><a href="/plane">AVIONES</a> </li>
				<li class="active"><a href="/tank">TANQUES</a> </li>
			</ul>
		</div>
	</nav>
</div>
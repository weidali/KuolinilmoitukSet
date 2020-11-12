<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
	<a class="navbar-brand" href="#">KuolinilmoitukSet</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
			</li>
			@guest
				<li class="nav-item">
					<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Dashboard</a>
				</li>
			@endguest
			@auth
				<li class="nav-item">
					<a class="nav-link" href="{{ route('panel') }}">Dashboard</a>
				</li>
			@endauth
		</ul>
		@auth
			<form class="form-inline mt-2 mt-md-0" action="{{ route('get_logout') }}">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Loguot</button>
			</form>
		@endauth
	</div>
</nav>
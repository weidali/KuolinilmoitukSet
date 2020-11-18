@extends('layouts.app')

@section('title-block', 'Home Page')

@section('content')


<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h2 class="display-4">Valitse ilmoitusmalli</h2>
  <p class="lead">Valitse alla olevista malli-ilmoituksista joko yksi- tai kaksipalstainen.</p>
</div>

<div class="container">
	<div class="card-deck mb-3 text-center">
		@foreach($templates as $template)
		<div class="card mb-4 shadow-sm">
			<div class="card-header">
				<h4 class="my-0 font-weight-normal">{{ $template->name }}</h4>
			</div>
			<div class="card-body">
				<p class="description">{{ $template->description }}</p>
				<p class="image"><img src="{{ $template->image }}" style="width:100%;" alt=""></p>
				<ul class="list-unstyled mt-3 mb-4">
					<li><small class="text-muted">Esimerkki-ilmoituksen koko</small><br>
					{{ $template->width }} x {{ $template->height }} mm</li>
				</ul>
				<small class="text-muted">Ma-To</small>
				<h5 class="card-title pricing-card-title">{{ $template->price }}&nbsp;€</h5>
				<form action="{{ route('template_add', $template->id) }}" method="POST">
					@csrf
					<button type="submit" class="btn btn-block btn-secondary">Valittu</button>
				</form>
				
			</div>
		</div>
		@endforeach
	</div>
</div>

@endsection
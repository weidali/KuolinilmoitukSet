@extends('layouts.app')

@section('title-block', 'Home')

@section('content')
<div class="row">
	<div class="col-8">
		

<div class="phase-header">
	<h2 class="phase-header-title">Valitse ilmoitusmalli</h2>
	<div class="phase-intro">
		<p>Valitse alla olevista malli-ilmoituksista joko yksi- tai kaksipalstainen.</p>
	</div>
</div>
<div id="phase-container">
	<div id="phase">
		<div id="modules">
			<div id="module-list" class="module-layout-normal module-list-kuolinilmoitukset">
			  <div class="module-container">
			  	@foreach($templates as $template)
			  		<a href="{{ $template->code }}" class="focus module module-1097 module-columns-1" data-module-id="1097" style="max-width:286px">
						<h3 class="name">{{ $template->name }}</h3>
						<p class="description">{{ $template->description }}</p>
						<p class="image"><img src="{{ $template->image }}" width="{{ $template->width * 2.3 }}" alt=""></p>
						<p class="description-below">Esimerkki-ilmoituksen koko<br>
						   {{ $template->width }} x {{ $template->height }} mm
						</p>
						<p class="prices">
							<span class="price-row">
								<span class="days">Ma-To!</span>
								<span class="amount">{{ $template->price }}&nbsp;€</span>
							</span>
							<span class="price-row">
								<span class="days">Pe-La</span>
								<span class="amount">...&nbsp;€</span>
							</span>
							<span class="price-row">
								<span class="days">Su</span>
								<span class="amount">...&nbsp;€</span>
							</span></p>
						<span class="button">Valittu</span>
					 </a>
			  	@endforeach
			  </div>
			  <div class="clear"></div>
		   </div>
		</div>
	</div>
</div>

	</div>
</div>


<!-- @include('inc.questionnaire') -->
@endsection
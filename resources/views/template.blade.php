@extends('layouts.app')

@section('title-block')
{{ $template->name }}
@endsection

@section('content')
<div class="row">
	<div class="col-8">
		<div class="phase-header">
			<h2 class="phase-header-title">{{ $template->name }}</h2>
			<div class="phase-intro">
				<p>Valitse alla olevista malli-ilmoituksista joko yksi- tai kaksipalstainen.</p>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-3">
		<div class="module-container">
				 
			<h3 class="name">{{ $template->name }}</h3>
			<p class="description">{{ $template->description }}</p>
			<p class="image"><img src="{{ $template->image }}" width="{{ $template->width * 2.3 }}" alt=""></p>
			<p class="description-below">Esimerkki-ilmoituksen koko<br>
			   {{ $template->width }} x {{ $template->height }} mm
			</p>
			<p class="prices">
				<span class="price-row">
					<span class="days">Ma-To</span>
					<span class="amount">{{ $template->price }}&nbsp;€</span>
				</span>
				<span class="price-row">
					<span class="days">Pe-La</span>
					<span class="amount">524,97&nbsp;€</span>
				</span>
				<span class="price-row">
					<span class="days">Su</span>
					<span class="amount">605,52&nbsp;€</span>
				</span>
			</p>
		</div>
	</div>
</div>

@endsection
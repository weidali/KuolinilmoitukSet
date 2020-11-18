@extends('layouts.app')
@section('title-block', 'Risti ja
symboli')
@section('content')
<img src="img/icons/image.svg" alt="image"> Risti ja symboli


<hr>
<h3>Valitse symboli</h3>
<p>Aloita valitsemalla symboli. Ristit, tunnukset ja kuvavaihtoehdot löydät välilehdiltä. Kun olet valmis, klikkaa Jatka-painiketta. Jos et halua valita symbolia, klikkaa Jatka-painiketta.</p>
<div class="row ">
<div class="card-deck">
	
	@foreach($symbols as $symbol)

		<form action="{{ route('symbol_add', $symbol->id) }}" method="POST">
			@csrf
			<div class="card h-100" >
				<button class="btn btn-sm btn-bd-light my-2 my-md-0" type="submit">
				<img src="/{{ $symbol->img }}" class="card-img-top" alt="{{ $symbol->name }}">
				
				</button>
			</div>
		</form>

	@endforeach
</div></div>
@endsection
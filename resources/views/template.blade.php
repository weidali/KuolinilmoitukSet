@extends('layouts.app')
@section('title-block', $template->name)
@section('content')
	<div class="container">
		<div class="py-5 text-center">
			<h2>Suunnittele ilmoitus</h2>
			<p class="lead">Ilmoituksen suunnittelu tehdään N osassa. Voit seurata ilmoituksen valmistumista esikatselukuvassa.</p>
		</div>
		<div class="row">
			<div class="col-md-4 order-md-2 mb-4">
				<h4 class="d-flex justify-content-between align-items-center mb-3">
				<span class="text-muted">Esikatselu</span>
				<span class="badge badge-secondary badge-pill">step 1</span>
				</h4>
				<ul class="list-group mb-3">
					<li class="list-group-item d-flex justify-content-between lh-condensed">
						<div>
							<h6 class="my-0">Template name</h6>
						</div>
						<span class="text-muted">{{ $template->name }}</span>
					</li>
					<li class="list-group-item d-flex justify-content-between lh-condensed">
						<div>
							<p class="image"><img src="{{ $template->image }}" style="width:100%;" alt=""></p>
						</div>
						
					</li>
				</ul>
			</div>

			<div class="col-md-8 order-md-1">
				<h4 class="mb-2">Vainajan tiedot</h4>
				<p class="mb-3">Täytä ilmoitukseen tulevat vainajan tiedot. Pakolliset tiedot on merkitty tähdellä.</p>
				<form class="needs-validation" action="{{ route('order-form') }}" method="post">
					@csrf
					<fieldset class="form-group">
						<div class="row">
							<legend class="col-form-label col-sm-4 pt-0">Ilmoituksen kieli</legend>
							<div class="col-sm-8">
								<div class="form-check">
									<input class="form-check-input secondary" type="radio" name="obituary_language" id="obituary-language-finnish" value="fi" checked>
									<label class="form-check-label" for="obituary-language-finnish">
										Suomi
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="obituary_language" id="obituary-language-swedish" value="se">
									<label class="form-check-label" for="obituary-language-swedish">
										Ruotsi
									</label>
								</div>
							</div>
						</div>
					</fieldset>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-4 col-form-label">Teksti ylhäällä<br><span class="text-muted">(esim. "Rakkaamme")</span></label>
						<div class="col-sm-8">
							<textarea class="form-control" id="obituary-top" name="obituary_top" rows="2">{{ old('obituary_top') }}</textarea>
						</div>
					</div>
					<div class="form-group row mb-5">
						<label for="obituary-occupation" class="col-sm-4 col-form-label">Arvo tai ammatti</label>
						<div class="col-sm-8">
							<input type="text" name="obituary_occupation" class="form-control" id="obituary-occupation" value="{{ old('obituary_occupation') }}">
						</div>
					</div>
					
					@error('obituary_firstname_1')
						<div class="alert alert-danger">{{ $message }}</div>
					@enderror
					<div class="form-group row mb-3">
						<label class="col-sm-4 col-form-label">Etunimet* <br><span class="text-muted">(yksi nimi per kenttä)</span>
							<br><small>Merkitse vainajan kutsumanimi rivin perässä olevaan kohtaan "kutsumanimi". Jos kutsumanimi on toinen tai kolmas nimi, se tulee ilmoitukseen alleviivattuna. Lempinimi (esim. Suski, Make) kirjoitetaan erikseen lempinimi-kenttään.</small></label>
						<div class="col-sm-8">
							<div class="row">
								<div class="col-md-6 mb-3">
									<input type="text" class="form-control"  id="obituary-firstname-1" name="obituary_firstname_1" value="{{ old('obituary_firstname_1') }}">
								</div>
								<div class="col-md-6 mb-3">
									<label><input type="radio" name="obituary_firstname_call" value="1" checked="checked"> Kutsumanimi</label>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mb-3">
									<input type="text" class="form-control" id="obituary-firstname-2" name="obituary_firstname_2" value="{{ old('obituary_firstname_2') }}">
								</div>
								<div class="col-md-6 mb-3">
									<label><input type="radio" name="obituary_firstname_call" value="3"> Kutsumanimi</label>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mb-3">
									<input type="text" class="form-control"  id="obituary-firstname-3" name="obituary_firstname_3" value="{{ old('obituary_firstname_3') }}">
								</div>
								<div class="col-md-6 mb-3">
									<label><input type="radio" name="obituary_firstname_call" value="3"> Kutsumanimi</label>
								</div>
							</div>
						</div>
					</div>

					@error('obituary_lastname')
						<div class="alert alert-danger">{{ $message }}</div>
					@enderror
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="obituary-nickname">Lempinimi</label>
							<input type="text" class="form-control" id="obituary-nickname" name="obituary_nickname" value="{{ old('obituary_nickname') }}" >
						</div>
						<div class="col-md-6 mb-3">
							<label for="obituary-lastname">Sukunimi*</label>
							<input type="text" class="form-control" id="obituary-lastname" name="obituary_lastname" value="{{ old('obituary_lastname') }}" >
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="obituary-former-lastnames">Entinen sukunimi</label>
							<label><small class="text-muted">Lyhenne ent. tulee automaattisesti nimen eteen.</small></label>
							<input type="text" class="form-control" id="obituary-former-lastnames" name="obituary_former_lastnames" value="{{ old('obituary_former_lastnames') }}" >
						</div>
						<div class="col-md-6 mb-3">
							<label for="obituary-nee">Omaa sukua</label>
							<label><small class="text-muted">Lyhenne o.s. tulee automaattisesti nimen eteen.</small></label>
							<input type="text" class="form-control" id="obituary-nee" name="obituary_nee" value="{{ old('obituary_nee') }}" >
						</div>
					</div>
					

					@error('obituary_birth_date')
						<div class="alert alert-sm alert-danger">{{ $message }}</div>
					@enderror
					<div class="row">
						<div class="col-md-4 mb-3">							
							<label for="obituary-birth-date">Syntymäpäivä*</label>
							<input type="date" class="form-control" id="obituary-birth-date" name="obituary_birth_date" value="{{ old('obituary_birth_date') }}" >
						</div>
						<div class="col-md-8 mb-3">
							<label for="obituary-birth-place">Syntymäpaikka</label>
							<input type="text" class="form-control" id="obituary-birth-place" name="obituary_birth_place" value="{{ old('obituary_birth_place') }}" >
						</div>
					</div>

					@error('obituary_date_of_death')
						<div class="alert alert-danger">{{ $message }}</div>
					@enderror

					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="obituary-date-of-death">Kuolinpäivä*</label>
							<input type="date" class="form-control" id="obituary-date-of-death" name="obituary_date_of_death" value="{{ old('obituary_date_of_death') }}" >
						</div>
						<div class="col-md-8 mb-3">
							<label for="obituary-place-of-death">Kuolinpaikka</label>
							<input type="text" class="form-control" id="obituary-place-of-death" name="obituary_place_of_death" value="{{ old('obituary_place_of_death') }}" >
						</div>
					</div>
					
					<hr class="mb-4">
					<button class="btn btn-secondary btn-block" type="submit">Vainajan tiedot on lisätty, jatka</button>
				</form>
			</div>
		</div>
	</div>
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<script src="form-validation.js"></script> -->
<!-- <div class="row">
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
</div> -->
@endsection
@extends('layouts.app')
@section('title-block', 'Preview')
@section('content')
<div class="container">
		<div class="py-5 text-center">
			<h2>Hyväksy ilmoitus</h2>
			<p class="lead">Ilmoituksen suunnittelu tehdään N osassa. Voit seurata ilmoituksen valmistumista esikatselukuvassa.</p>
		</div>

		<div class="jumbotron mt-3">

			<table class="table table-borderless">
				
				<tbody>
					<tr>
						<td>Teksti ylhäällä</td>
						<td>{{ $order->obituary_top }}</td>
					</tr>
					<tr>
						<td>Arvo tai ammatti</td>
						<td>{{ $order->obituary_occupation }}</td>
					</tr>
					<tr>
						<td>Etunimet</td>
						<td>{{ $order->obituary_firstname_1 }} {{ $order->obituary_firstname_2 }} {{ $order->obituary_firstname_3 }}</td>
					</tr>
					<tr>
						<td>Lempinimi</td>
						<td>{{ $order->obituary_nickname }}</td>
					</tr>
					<tr>
						<td>Sukunimi</td>
						<td>{{ $order->obituary_lastname }}</td>
					</tr>
					<tr>
						<td>Entinen sukunimi</td>
						<td>{{ $order->obituary_former_lastnames }}</td>
					</tr>
					<tr>
						<td>Omaa sukua</td>
						<td>{{ $order->obituary_nee }}</td>
					</tr>
					<tr>
						<td>Syntymäpäivä</td>
						<td>{{ date('d-m-Y', strtotime($order->obituary_birth_date)) }}</td>
					</tr>
					<tr>
						<td>Syntymäpaikka</td>
						<td>{{ $order->obituary_birth_place }}</td>
					</tr>
					<tr>
						<td>Kuolinpäivä</td>
						<td>{{ date('d-m-Y', strtotime($order->obituary_date_of_death)) }}</td>
					</tr>
					<tr>
						<td>Kuolinpaikka</td>
						<td>{{ $order->obituary_place_of_death }}</td>
					</tr>
				</tbody>
			</table>
			<hr class="mb-3">

			<div class="btn-toolbar mb-3">
				<div class="btn-group mr-3">
					<form action="" method="GET">
						@csrf
						<button type="submit" class="btn btn-lg btn-outline-secondary">Edit</button>
					</form>
				</div>
				<div class="btn-group">
					<form action="{{ route('preview_pdf') }}" target="_blank" method="GET">
						@csrf
						<button type="submit" class="btn btn-lg btn-outline-secondary">Preview</button>
					</form>
				</div>
			</div>

		</div>
		<form action="" method="POST">
			@csrf
			<button type="submit" class="btn btn-lg btn-block btn-secondary">Submit</button>
		</form>

	</div>
</div>

<hr>
@endsection
@extends('layouts.app')

@section('title-block')
Home
@endsection

@section('content')

<div class="phase-header">
	<h2 class="phase-header-title">Valitse ilmoitusmalli</h2>
	<div class="phase-intro">
		<p>Valitse alla olevista malli-ilmoituksista joko yksi- tai kaksipalstainen.</p>
	</div>
</div>

@include('inc.questionnaire')
@endsection
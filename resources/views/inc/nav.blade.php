<div class="obituary-phase-list obituary-phase-list-items-4">
	<span class="line"></span>
	<a href="{{ route('index') }}" class="obituary-phase-link obituary-phase-link-relatives {{ Route::is('index') ? 'current' : '' }}" >
		<span class="icon obituary-phase-link-relatives-icon"></span>
		<span class="link-title">Valitse<br>ilmoitusmalli</span></a>
	<a href="{{ route('symbol') }}" class="obituary-phase-link obituary-phase-link-symbols {{ Route::is('symbol') ? 'current' : '' }}">
		<span class="obituary-phase-link-symbols-icon icon"></span>
		<span class="link-title">Risti ja<br>symboli</span></a>
	<a href="{{ route('order') }}" class="obituary-phase-link obituary-phase-link-deceased  {{ Route::is('order') ? 'current' : '' }}">
		<span class="icon obituary-phase-link-deceased-icon"></span>
		<span class="link-title">Vainajan<br>tiedot</span></a>
	<a href="{{ route('preview') }}" class="obituary-phase-link obituary-phase-link-finished  {{ Route::is('preview') ? 'current' : '' }}">
		<span class="icon obituary-phase-link-finished-icon"></span>
		<span class="link-title">Hyväksyminen</span></a>
</div>
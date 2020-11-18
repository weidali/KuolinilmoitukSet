<form action="{{ route('symbol_add', $symbol->id) }}" method="POST">
	@csrf
	<div class="card h-100" >
		<button class="btn btn-sm btn-bd-light my-2 my-md-0" type="submit">
		<img src="{{ $symbol->img }}" class="card-img-top" alt="{{ $symbol->name }}">
		<div class="card-body">
			<div class="card-text"></div>
		</div>
		<div class="card-footer">
			<small class="card-title">{{ $symbol->name }}</small>
		</div>
		</button>
	</div>
</form>
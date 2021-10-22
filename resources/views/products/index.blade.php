@extends('layouts.app')

@section('content')

	<div class="products">
		@foreach($products as $product)
			<a class="product-row no-link" href="{{ route('products.show', $product) }}">
				<img src="{{ url($product->image ?? 'img/placeholder.jpg') }}" alt="{{ $product->title }}" class="rounded">
				<div class="product-body">
					<div>
						
						<h5 class="product-title"><span>{{ $product->title }}</span><em>&euro;{{ $product->price }}</em></h5>
						
						@unless(empty($product->description))
							<p>{{ $product->description }}</p>
							@if($product->discount > 0)
						<p class="products-discount">Nu {{ $product->discount}}% korting!</p>
						<p>Orginele prijs is &euro; 29</p>
						@endif	
						@endunless
						

						

						

					</div>
					<button class="btn btn-primary">Meer info &amp; bestellen</button>
				</div>
			</a>
		@endforeach
	</div>

@endsection
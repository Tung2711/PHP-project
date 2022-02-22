@if($productSeller->count() > 0)
<best-seller>
		<div class="container">
			<ul>
				<li>
					<div>
						<h3>Best sellers</h3>
						<small>The best productions from us</small>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</p>
					</div>	
				</li>
				@foreach($productSeller as $pSeller)
				<li>
					<img src="{{ asset($pSeller->image)}}" class="product-modal-detail" data-id="{{ $pSeller->id}}" />
					<a href="javascript:void(0)" class="product-modal-detail" data-id="{{ $pSeller->id}}">{{ $pSeller ->name}}</a>
					<p>{{ number_format($pSeller->price,2) }} vnd</p>
					<div class="action">
						<a href="#" class="cart"></a>
						<a href="#" class="heart"></a>
						<a href="#" class="compare"></a>
					</div> 
				</li>
				@endforeach
			</ul>
		</div>
	</best-seller>
@endif
<div class="product-detail">
			<div>
				<img src="{{ asset($product->image)}}" class="main" width="333" />
			</div>
			<div class="thumb">
				
					<h3>{{ $product->name}}</h3>

					<img src="{{ asset('frontend/images/sp1.jpg')}}" />
					<img src="{{ asset('frontend/images/sp2.jpg')}}" />
					<img src="{{ asset('frontend/images/sp3.jpg')}}" />
					<img src="{{ asset('frontend/images/sp4.jpg')}}" />
					<img src="{{ asset('frontend/images/sp5.jpg')}}" />
					<img src="{{ asset('frontend/images/sp1.jpg')}}" />
					<img src="{{ asset('frontend/images/sp2.jpg')}}" />
					<img src="{{ asset('frontend/images/sp2.jpg')}}" />
					<p><a href="{{ route('cart.store',['productId' =>1])}}" title="Mua hang"> Mua Ngay</a>
			</p>
				
			</div>
		</div>
	
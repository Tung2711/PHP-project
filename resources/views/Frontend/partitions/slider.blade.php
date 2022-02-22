<slider>
		<div class="container-slider owl-carousel" id="slider-top">
			@foreach($sliders as $slider)
			<div class="slide-item">
				<img src="{{ asset($slider->image)}}" />
				<h2>
					<span>{{ $slider->title }}</span>
					<small>Woocommerce</small>
				</h2>
			</div>
			@endforeach
		</div>
</slider>

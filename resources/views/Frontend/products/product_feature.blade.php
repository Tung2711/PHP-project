@if($productFeature->count() > 0)
<product-feature>
		<h3>{{ $aheadTitle ?? null }}</h3>
		<br>
		<small>Newest trends from top brands</small>
		<br/>
		<div class="container">
			<ul>
				@foreach($productFeature as $pFeature)
				<li>
					<img src="{{ asset($pFeature->image)}}" class="product-modal-detail" data-id="{{ $pFeature->id}}" />
					<a href="javascript:void(0)" class="product-modal-detail" data-id="{{ $pFeature->id}}">{{ $pFeature ->name}}</a>
					<p>{{number_format($pFeature ->price, 2) }}</p>
				</li>
				@endforeach
			</ul>
		</div>
	</product-feature>
	@endif
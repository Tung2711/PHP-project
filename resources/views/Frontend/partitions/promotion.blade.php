@if(!empty($promotions))
<promotion>
		<div class="container">
			<ul>
				@foreach($promotions as $promotion)
				<li>
					<img src="{{ asset($promotion->image)}}" />
				</li>
				@endforeach
			</ul>
		</div>
	</promotion>
@endif
<nav class="menu">
				<ul>
					<li><a href="/" class="active">Home</a></li>
					<!-- <li><a href="" class="">Women</a></li>
					<li><a href="" class="">Men</a></li>
					<li><a href="" class="">Kids</a></li>
					<li><a href="" class="">Jewelleryy</a></li>
					<li><a href="" class="">Accessories</a></li> -->
					@foreach($categories as $category)
					<li><a href="{{ route('frontend.category.show', ['slug' => $category['slug']] ) }}" >{{ $category['name'] }}</a></li>
					@endforeach
				</ul>
			</nav>
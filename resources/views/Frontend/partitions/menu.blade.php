<!-- <h1> menu top</h1>

@if(!empty($menus))

@foreach($menus as $menu )
	<li> {{ $menu }}</li>

@endforeach

@endif -->
<header>
		<div class="container">
			<div class="logo">
				<a href="/">Demo Example</a>
			</div>
			<!-- <nav class="menu">
				<ul>
					<li><a href="" class="active">Home</a></li>
					<li><a href="" class="">Women</a></li>
					<li><a href="" class="">Men</a></li>
					<li><a href="" class="">Kids</a></li>
					<li><a href="" class="">Jewelleryy</a></li>
					<li><a href="" class="">Accessories</a></li>
				</ul>
			</nav> -->
			<x-menu></x-menu>

			<div class="icon">
				<div class="wrap">
					<a href="{{ route('cart.index')}}">
					<span class="cart">
						<small>{{ totalCart()}}</small>
					</span>
					</a>
					<span class="search"></span>
					<span class="more"></span>
				</div>
			</div>
		</div>
	</header>
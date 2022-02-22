@extends('layout.frontend')

@section ('content')
	
	@include('frontend.partitions.slider', ['sliders' => $sliders ?? collect()])
	@include('frontend.products.best_seller',['productSeller' => $productSeller ?? collect()])
	@include('frontend.partitions.shipping')
	@include('frontend.partitions.promotion',['promotions' => $promotions ?? collect()])
	@include('frontend.products.product_feature', ['productFeature'=>$productFeature ?? collect()])
	@include('frontend.partitions.footer')
@endsection
@extends('layout.frontend')
@section ('content')
	

	@include('frontend.products.product_feature',['productFeature' =>$productFeature ?? collect()])
	@include('frontend.partitions.footer')
@endsection
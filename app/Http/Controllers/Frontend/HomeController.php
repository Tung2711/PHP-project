<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\SliderService;
use App\Services\ProductService;
use App\Services\ConfigService;
use Illuminate\Http\Request;

class HomeController extends Controller
{	
	protected $sliderService;

	protected $productService;

    protected $configService;

	public function __construct(SliderService $sliderService,ProductService $productService,ConfigService $configService)
	{
		$this->sliderService = $sliderService;
		$this->productService = $productService;
        $this->configService = $configService;
	}

    public function index()
    {
    	//dd($this->sliderService->all());
    	//$productSeller = $this->productService->bestSeller();

    	//dd($productSeller->toArray());
        $promotions = $this->configService->getByKey('promotion')->value ?? [];

    	return view('frontend.home.index', [
    		'sliders'       =>$this->sliderService->all(),
    		'productSeller' =>$this->productService->bestSeller(),
    		'productFeature'=>$this->productService->feature(),
            'promotions'    =>$promotions,
    	]);
    } 
}

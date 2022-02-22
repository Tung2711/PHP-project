<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	protected $categoryService;

	protected $productService;

	public function __construct(CategoryService $categoryService, ProductService $productService)
	{
		$this->categoryService = $categoryService;
		$this->productService  = $productService;
	}

	public function show($slug){
	
		$category = $this->categoryService->findBySlug($slug);
		//dd($category);
		$productFeature = $this->productService->getByCategoryId($category->id);
	
		return view('frontend.categories.show', [
			'aheadTitle' => $category->name ?? null,
			'productFeature' => $productFeature,
		 ]);
	}
    
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\OrderService;

class OrderController extends Controller
{

	const PER_PAGE = 5;
    protected $categoryService;
	public function __construct(OrderService $orderService)
	{
		$this->orderService = $orderService;
	}

   public function index(Request $request)
   {
   	try{
   		$orders = [
   			$request->column,$request->sort];
   		
		$orders = $this->orderService->get(static::PER_PAGE,array_filter($orders));


		return response()->json([
			'code' =>200,
			'status' =>true,
			'data' =>$orders
		]);
   	}catch(\Exception $e){
   		return response()->json([
   			'error' => [
                   'message' => $e->getMessage(),
                   'status' => false,
                   'code' => 500,
               ]
   		]);
   	}
   }

   public function show($id)
   { 
		try{

		$order = $this->orderService->findById($id);
		
		return response()->json([
			'code' =>200,
			'status' =>true,
			'data' =>$order
		]);
   		}catch(\Exception $e){
   		return response()->json([
   			'error' => [
                   'message' => $e->getMessage(),
                   'status' => false,
                   'code' => 500,
               ]
   		]);
   	}
   }
}

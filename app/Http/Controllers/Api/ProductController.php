<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\ProductSaveRequest;


class ProductController extends Controller
{

	protected $productService;
	public function __construct(ProductService $productService)
	{
		$this->productService = $productService;
	}

    public function index(Request $request)
   {
   	try{
   		$orders = [
   			$request->column,$request->sort];
   		
		$products = $this->productService->get(2,array_filter($orders));


		return response()->json([
			'code' =>200,
			'status' =>true,
			'data' =>$products
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

     public function store(ProductSaveRequest $request)
   {
      try{

         $product = $this->productService->save($request->only(
              'name',
              'slug',
              'price',
              'image',
              'is_feature',
              'meta_title',
              'meta_desc',
              'meta_keyword'
         ));
            return response()->json([
      
                   'data' => $product,
                   'status' => true,
                   'code' => 200,
             
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

    public function update($id,ProductSaveRequest $request)
   {
      try{

         $product = $this->productService->save($request->only(
              'name',
              'slug',
              'price',
              'image',
              'is_feature',
              'meta_title',
              'meta_desc',
              'meta_keyword'
         ),$id);

         if( $request->category_ids){
         	$this->productService->attachCategory($product,$request->category_ids);
         }
            return response()->json([
      
                   'data' => $product,
                   'status' => true,
                   'code' => 200,
             
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

   public function destroy($id)
   {
        try{
          return response()->json([
      
                   'deleted' => $this->productService->delete([$id]),
                   'status' => true,
                   'code' => 200,
             
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

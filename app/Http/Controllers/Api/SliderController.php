<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SliderService;

class SliderController extends Controller
{
   const PER_PAGE = 2;
	protected $categoryService;
	public function __construct(SliderService $sliderService)
	{
		$this->sliderService = $sliderService;
	}

   public function index(Request $request)
   {
   	try{
   		$orders = [
   			$request->column,$request->sort];
   		
		$sliders = $this->sliderService->get(static::PER_PAGE,array_filter($orders));


		return response()->json([
			'code' =>200,
			'status' =>true,
			'data' =>$sliders
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

   public function store(Request $request)
   {
      try{

         $slider = $this->sliderService->save($request->only(
              'title',
              'image',
         ));
            return response()->json([
      
                   'data' => $slider,
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

    public function update($id,Request $request)
   {
      try{

         $slider = $this->sliderService->save(
          $request->only(
              'title',
              'image',
         ),$id
       );
            return response()->json([
      
                   'data' => $slider,
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
   public function destroy($id,Request $request)
   {
        try{
          return response()->json([
      
                   'deleted' => $this->sliderService->delete([$id]),
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

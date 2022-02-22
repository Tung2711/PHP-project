<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Requests\CategorySaveRequest;
use App\Http\Requests\CategoryDeleteRequest;

class CategoryController extends Controller
{	
	const PER_PAGE = 2;
	protected $categoryService;
	public function __construct(CategoryService $categoryService)
	{
		$this->categoryService = $categoryService;
	}

   public function index(Request $request)
   {
   	try{
   		$orders = [
   			$request->column,$request->sort];
   		
		$categories = $this->categoryService->get(static::PER_PAGE,array_filter($orders));


		return response()->json([
			'code' =>200,
			'status' =>true,
			'data' =>$categories
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

   public function store(CategorySaveRequest $request)
   {
      try{

         $category = $this->categoryService->save($request->only(
              'name',
              'slug',
              'meta_title',
              'meta_desc',
              'meta_keyword'
         ));
            return response()->json([
      
                   'data' => $category,
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

    public function update($id,CategorySaveRequest $request)
   {
      try{

         $category = $this->categoryService->save(
          $request->only(
              'name',
              'slug',
              'meta_title',
              'meta_desc',
              'meta_keyword'
         ),$id
       );
            return response()->json([
      
                   'data' => $category,
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
   public function destroy($id,CategoryDeleteRequest $request)
   {
        try{
          return response()->json([
      
                   'deleted' => $this->categoryService->delete([$id]),
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

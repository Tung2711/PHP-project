<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
    	try {
    			$file = request()->file('image')->store('public/images');	
    	return response()->json([
    		'url' => Storage::disk(config('filesystems.disks.local.driver'))->url($file),
    	]);
    } catch(\Exception $e){
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

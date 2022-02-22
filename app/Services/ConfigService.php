<?php 

namespace App\Services;
use App\Models\Config;
class ConfigService
{
	public function getByKey($key)
	{
		return Config::where('key',$key)->first();
	}
}


 ?>
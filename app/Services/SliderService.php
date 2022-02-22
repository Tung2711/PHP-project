<?php 

namespace App\Services;

use App\Models\Slider;
class SliderService
{
	public function all($limit = 5)
	{
		return Slider::limit($limit)->get();
	}

	public function save(array $input, $id = null)
	{
		return Slider::updateOrCreate(
			['id' => $id],
			[
				'title' => $input['title'],
				'image' => $input['image'],
			]
		);
	}

	public function get($limit = 2, array $orders = [], array $params = [])
	{
		$query = Slider::query();

		if($orders) {
			$query->orderBy(...$orders);
		}
		return $query->paginate($limit);
	}

	public function delete($ids = [])
	{
		return Slider::destroy($ids);
	}

}


 ?>
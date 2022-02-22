<?php 

namespace App\Services;

use App\Models\Category;

class CategoryService
{
	public function save(array $input, $id = null)
	{
		return Category::updateOrCreate(
			['id' => $id],
			[
				'name' => $input['name'],
				'slug' => $input['slug'],
				'meta_title' => $input['meta_title'],
				'meta_desc' => $input['meta_desc'],
				'meta_keyword' => $input['meta_keyword'],
			]
		);
	}
	public function get($limit = 2, array $orders = [], array $params = [])
	{
		$query = Category::query();

		if($orders) {
			$query->orderBy(...$orders);
		}
		return $query->paginate($limit);
	}

	public function all($limit = 3)
	{
		return Category::limit($limit)->get();
	}

	public function findBySlug($slug)
	{
		return Category::where('slug', $slug)->first();
	}

	public function findById($id)
	{
		return Category::find($id)->first();
	}

	public function delete(array $ids)
	{
		return Category::destroy($ids);
	}

}

 ?>
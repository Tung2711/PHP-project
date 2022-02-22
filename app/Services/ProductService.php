<?php 

namespace App\Services;

use App\Models\Product;
class ProductService
{
	public function save(array $input, $id = null)
	{
		return Product::updateOrCreate(
			['id' => $id],
			[
				'name' => $input['name'],
				'slug' => $input['slug'],
				'price' => $input['price'],
				'is_feature' => $input['is_feature'] ?? 0,
				'image' => $input['image'] ?? null,
				'meta_title' => $input['meta_title'],
				'meta_desc' => $input['meta_desc'],
				'meta_keyword' => $input['meta_keyword'],
			]
		);
	}

	public function attachCategory(Product $product,$categoryIds)
	{
		$product->categories()->sync($categoryIds);
	}

	public function get($limit = 2, array $orders = [], array $params = [])
	{
		$query = Product::query();

		if($orders) {
			$query->orderBy(...$orders);
		}
		return $query->paginate($limit);
	}

	public function bestSeller($limit = 5)
	{
		return Product::join('order_details','order_details.product_id','products.id')->selectRaw('sum(qty) as qty')
			->groupBy('product_id')
			->addSelect('products.id','products.name','products.image','products.price')
			->orderBy('qty','desc')
			->limit(4)
			->get();
	}

	public function feature($limit = 15)
	{
		return Product::where('is_feature', true)->limit($limit)->get();
	}

		public function getByCategoryId($categoryId)
	{
		return Product::join('category_product','category_product.product_id','products.id')->where('category_product.category_id',$categoryId)->get();
}
	public function findById($id)
	{
			return Product::find($id);
	}

	public function delete(array $ids)
	{
		return Product::destroy($ids);
	}
}


 ?>
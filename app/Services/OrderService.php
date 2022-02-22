<?php 

namespace App\Services;

use App\Models\Order;

class OrderService
{
	public function save(array $input,$id = null)
	{
		return Order::updateOrCreate(
			[
				'id' => $id
			],
			[
				'code' => rand(1000,1000000000),
				'customer_id' => $input['customer_id'],
			]
		);
	}

	public function findById($id)
	{
		return Order::with('detail')
		->leftJoin('customers','customers.id', 'orders.customer_id')
		->where('orders.id', $id)
		->select('orders.*','customers.name','customers.email','customers.address','customers.phone')
		->first();
	}

	public function get($limit = 5, array $orders = [], array $params = [])
	{
		$query = Order::leftJoin('customers','customers.id', 'orders.customer_id');

		if($orders) {
			$query->orderBy(...$orders);
		}
		
		return $query ->paginate($limit);
	}
}
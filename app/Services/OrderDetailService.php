<?php 

namespace App\Services;

use App\Models\OrderDetail;
use App\Models\Customer;
class OrderDetailService
{
	public function store($orderId, $products)
	{
		foreach ($products as $product) {
			OrderDetail::create([
				'order_id'     => $orderId,
				'product_id'   => $product->id,
				'product_name' => $product->name,
				'price'        => $product->price,
				'qty'          => $product->qty,
				'created_at'   => now(),
				'updated_at'   => now(),
			]);
		}
	}

	
}
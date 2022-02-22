<?php 

namespace App\Services;
use App\Models\Customer;

class CustomerService
{
	public function save(array $input)
	{
		return Customer::updateOrCreate(
			[
				'phone' => $input['phone']
			],
			[
				'name' => $input['name'],
				'phone' => $input['phone'],
				'email' => $input['email'],
				'address' => $input['address'],
			]
		);
	}
}
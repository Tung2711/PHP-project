<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Product::class, function (Faker $faker) {
   
    $name = $faker->name;
	$slug = Str::of($name)->slug('-');

    return [
        'name' => $name,
        'slug' => $slug,
        'price'=> $faker->randomNumber(8),
        'image'=>'./frontend/images/girl.jpg',

    ];
});

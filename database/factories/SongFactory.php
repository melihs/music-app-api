<?php

use Faker\Generator as Faker;
use App\Category;

$factory->define(\App\Song::class, function (Faker $faker) {
    return [
         'name'         => $faker->name,
         'source'       => "source",
         'category_id'  => factory(Category::class)->create()->id
    ];
});

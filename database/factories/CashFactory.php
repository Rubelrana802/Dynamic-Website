<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Settings\Cash;
use Faker\Generator as Faker;

$factory->define(Cash::class, function (Faker $faker) {
    return [
        'name' => 'Cash',
        'amount' => 100000,
    ];
});

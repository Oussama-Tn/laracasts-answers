<?php

use App\Country;
use App\Service;
use App\ServiceVendorCountry;
use App\Vendor;
use Faker\Generator as Faker;

$factory->define(Vendor::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(Country::class, function (Faker $faker) {
    return [
        'a2_code' => $faker->words($nb = 2, $asText = true),
        'name' => $faker->name,
    ];
});

$factory->define(Service::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(ServiceVendorCountry::class, function (Faker $faker) {
    return [
        'service_vendor_id' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        //'country_id' => $faker->words($nb = 2, $asText = true),
    ];
});

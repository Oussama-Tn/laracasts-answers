<?php

use App\Vendor;
use App\Service;
use App\Country;
use App\ServiceVendor;
use App\ServiceVendorCountry;
use \Illuminate\Support\Facades\Artisan;

Route::get('/example', function () {

    Artisan::call('migrate:fresh', [
        '--force' => true,
    ]);

    $vendor = factory(Vendor::class)->create();
    $services = factory(Service::class, 4)->create();
    $countries = factory(Country::class, 10)->create();

    $vendor->services()->attach($services);

    foreach (ServiceVendor::get() as $service_vendor) {
        factory(ServiceVendorCountry::class)->create([
            'service_vendor_id' => $service_vendor->id,
            'country_id' => $countries->random()->id,
        ]);
    }

    /*
    // This is how to loop over your services and access countries..

    foreach ($vendor->services as $service) {
        if (isset($service->pivot->serviceVendorCountries)) {
            $serviceVendorCountries = $service->pivot->serviceVendorCountries;

            foreach ($serviceVendorCountries as $serviceVendorCountry) {
                dump([
                    'vendor' => $vendor->toArray(),
                    'service' => $service->toArray(),
                    'country' => optional($serviceVendorCountry->country)->toArray(),
                ]);
            }
        }
    }*/

    return $vendor->services->map(function ($service) {
        if(isset($service->pivot->serviceVendorCountries)) {
            foreach ($service->pivot->serviceVendorCountries as $serviceVendorCountry) {
                return optional($serviceVendorCountry->country)->toArray() ?? null;
            }
        }
        return null;
    })
        ->filter();

});

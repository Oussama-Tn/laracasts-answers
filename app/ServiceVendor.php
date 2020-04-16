<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ServiceVendor extends Pivot
{
    public $incrementing = true; // table name
    protected $table = 'service_vendor';
    protected $fillable = [
        'id',
        'vendor_id',
        'service_id',
    ];

    public function serviceVendorCountries()
    {
        return $this->hasMany(ServiceVendorCountry::class, 'service_vendor_id');
    }
}

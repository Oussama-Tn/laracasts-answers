<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceVendorCountry extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'service_vendor_id',
        'country_id',
    ];

    public function country()
    {
       return $this->belongsTo('App\Country');
    }
}

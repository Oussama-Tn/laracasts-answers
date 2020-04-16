<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'a2_code',
        'name',
    ];

    public function serviceVendorCountries()
    {
        return $this->hasMany('App\ServiceVendorCountry', 'country_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'name',
    ];

    public function services()
    {
        return $this->belongsToMany('App\Service')
            ->using(ServiceVendor::class)
            ->withPivot('id');
    }
}

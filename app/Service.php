<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'name',
    ];

    public function vendors()
    {
        return $this->belongsToMany('App\Vendor');
    }
}

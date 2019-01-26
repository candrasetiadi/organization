<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        'name', 
        'email', 
        'phone',
        'website',
        'logo',
    ];

    public function persons()
    {
        return $this->hasMany('App\Person');
    }
}

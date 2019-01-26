<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'organization_id', 
        'name', 
        'email', 
        'phone',
        'avatar',
    ];

    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }
}

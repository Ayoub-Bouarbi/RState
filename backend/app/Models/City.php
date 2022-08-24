<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $fillable = [
        'name',
        'country_id'
    ];

    protected function Country(){
        return $this->belongsTo(Country::class);
    }
    protected function Properties()
    {
        return $this->hasMany(Property::class);
    }
}

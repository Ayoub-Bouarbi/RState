<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Property extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $fillable = [
        'name',
        'description',
        'status',
        'address',
        'price',
        'rooms',
        'city_id',
        'agent_id',
        'property_type_id'
    ];
    
    protected $casts = [
        'city_id' => 'integer',
        'property_type_id' => 'integer',
        'agent_id' => 'integer',
    ];

    function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = Str::slug($name);
    }

    function City()
    {
        return $this->belongsTo(City::class);
    }
    function PropertyType()
    {
        return $this->belongsTo(PropertyType::class);
    }
    function Agent()
    {
        return $this->belongsTo(Agent::class);
    }
}

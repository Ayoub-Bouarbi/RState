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
        'beds',
        'baths',
        'for',
        'city_id',
        'agent_id',
        'property_type_id'
    ];

    protected $casts = [
        'city_id' => 'integer',
        'property_type_id' => 'integer',
        'agent_id' => 'integer',
    ];

    protected $with = [
        'City:id,name,country_id',
        'Agent:id,name,email,address,phoneNumber',
        'PropertyType:id,name',
        'Images:id,fileName,property_id'
    ];

    function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = Str::slug($name);
    }

    public function Images()
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function City()
    {
        return $this->belongsTo(City::class);
    }

    public function PropertyType()
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function Agent()
    {
        return $this->belongsTo(Agent::class);
    }
}

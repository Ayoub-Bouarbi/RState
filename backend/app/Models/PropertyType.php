<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'name'
    ];
    protected function Properties()
    {
        return $this->hasMany(Property::class);
    }

}

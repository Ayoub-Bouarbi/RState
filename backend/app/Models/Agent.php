<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;


    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'address',
        'email',
        'phoneNumber'
    ];
    protected function Properties()
    {
        return $this->hasMany(Property::class);
    }
}

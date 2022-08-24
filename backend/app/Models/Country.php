<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $primarykey = "id";

    protected $fillable = [
        'name'
    ];

    protected function Cities()
    {
        return $this->hasMany(City::class);
    }
}

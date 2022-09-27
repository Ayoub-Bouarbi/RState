<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        "place",
        "time",
        "date",
        "client_id",
        "property_id",
        "agent_id"
    ];
}

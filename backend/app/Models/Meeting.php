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
        "user_id",
        "property_id",
        "agent_id"
    ];   
    protected $with = [
        'Agent',
        'Property',
        'User',
    ];

    
    public function Agent()
    {
        return $this->belongsTo(Agent::class);
    }
    public function Property()
    {
        return $this->HasOne(Property::class);
    }
    
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}

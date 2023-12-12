<?php

namespace Modules\AgentModule\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\AgentModule\Database\factories\LocationFactory;

class Location extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): LocationFactory
    {
        //return LocationFactory::new();
    }
}

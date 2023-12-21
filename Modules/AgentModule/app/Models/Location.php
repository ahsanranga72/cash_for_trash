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

    public function scopeActive($query)
    {
        return $query->where('is_active', 1 );
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'id', 'location_id');
    }
}

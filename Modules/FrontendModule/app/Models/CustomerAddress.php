<?php

namespace Modules\FrontendModule\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\FrontendModule\Database\factories\CustomerAddressFactory;

class CustomerAddress extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): CustomerAddressFactory
    {
        //return CustomerAddressFactory::new();
    }
}

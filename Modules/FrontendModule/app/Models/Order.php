<?php

namespace Modules\FrontendModule\app\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\AdminModule\app\Models\Product;
use Modules\AgentModule\app\Models\Location;
use Modules\FrontendModule\Database\factories\OrderFactory;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): OrderFactory
    {
        //return OrderFactory::new();
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function address()
    {
        return $this->hasOne(CustomerAddress::class, 'id', 'address_id');
    }

    public function customer()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function agent()
    {
        return $this->hasOne(User::class, 'id', 'agent_id');
    }

    public function location()
    {
        return $this->hasOne(Location::class, 'id', 'location_id');
    }
}

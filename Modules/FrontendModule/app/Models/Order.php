<?php

namespace Modules\FrontendModule\app\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\AdminModule\app\Models\Product;
use Modules\AgentModule\app\Models\Agent;
use Modules\AgentModule\app\Models\Location;
use Modules\FrontendModule\Database\factories\OrderFactory;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */

    protected static function newFactory(): OrderFactory
    {
        //return OrderFactory::new();
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
        return $this->hasOne(User::class, 'id', 'agent_user_id');
    }

    public function location()
    {
        return $this->hasOne(Location::class, 'id', 'location_id');
    }
}

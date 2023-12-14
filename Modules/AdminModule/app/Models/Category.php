<?php

namespace Modules\AdminModule\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\AdminModule\Database\factories\CategoryFactory;
use Modules\AdminModule\app\Models\Product;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): CategoryFactory
    {
        //return CategoryFactory::new();
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

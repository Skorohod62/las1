<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $guarded = false;

    /**
     * @return HasMany
     */
    public function order_products(): HasMany
    {
        return $this->hasMany(OrderProduct::class, 'product_id', 'id');
    }
}

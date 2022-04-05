<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Order
 */
class Order extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['client_id', 'product_id', 'order_number', 'purchase_date', 'amount', 'status'];

    /**
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|object|null
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id')->first();
    }

    /**
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|object|null
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'client_id', 'id')->first();
    }

}

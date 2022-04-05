<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'product_id', 'order_number', 'purchase_date', 'amount', 'status'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id')->first();
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'client_id', 'id')->first();
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Products
 */
class Product extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected  $table = 'products';

    /**
     * @var string[]
     */
    protected $fillable = ['description', 'client_id', 'price'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id')->first();
    }
}

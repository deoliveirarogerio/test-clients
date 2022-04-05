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
    protected $fillable = ['description', 'price'];
}

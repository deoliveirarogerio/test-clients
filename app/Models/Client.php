<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Client
 */
class Client extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected  $table = 'clients';

    /**
     * @var string[]
     */
    protected $fillable = ['name', 'cpf', 'email'];
}

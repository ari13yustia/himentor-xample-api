<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'price',
        'account_id',
        'mentor_id'
    ];
}

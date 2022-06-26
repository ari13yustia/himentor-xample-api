<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountModel extends Model
{
    protected $table = 'accounts';
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'birthday',
        'phone_number',
        'whatsapp_number',
        'user_id'
    ];
}

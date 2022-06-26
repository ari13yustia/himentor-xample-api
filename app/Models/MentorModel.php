<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorModel extends Model
{
    protected $table = 'mentors';
    protected $fillable = [
        'profesion',
        'address',
        'linkedin_link',
        'insta_link',
        'fb_link',
        'country_id',
        'province_id',
        'city_id',
        'account_id'
    ];
}

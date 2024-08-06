<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en',
        'name_fa',
        'population',
        'flag',
        'latitude',
        'longitude'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    protected $fillable = ['Title', 'Category', 'Privacy', 'Latitude', 'Longitude', 'Address', 'City', 'Country'];
}
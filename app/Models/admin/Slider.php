<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

      protected $fillable = [
        'slider_image',
        'title',
        'description',
        'status',
    ];
}

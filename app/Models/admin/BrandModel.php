<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_name_hin',
        'brand_name_en',
        'brand_slug_en',
        'brand_slug_hin',
        'brand_image',
    ];
}

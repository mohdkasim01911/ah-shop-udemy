<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

     protected $fillable = [
        'cat_name_hin',
        'cat_name_en',
        'cat_slug_en',
        'cat_slug_hin',
        'cat_icon',
    ];
}

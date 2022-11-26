<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

     protected $fillable = [
        'category_id',
        'subcat_name_hin',
        'subcat_name_en',
        'subcat_slug_en',
        'subcat_slug_hin',
    ];

   public function category()
   {
      return $this->belongsTo(Category::class,'category_id','id');
   }
}

<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
   {
      return $this->belongsTo(Category::class,'category_id','id');
   }

   public function brand()
   {
      return $this->belongsTo(BrandModel::class,'brand_id','id');
   }
}

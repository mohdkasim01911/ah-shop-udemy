<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product()
   {
      return $this->belongsTo(Product::class,'product_id','id');
   }
}

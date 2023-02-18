<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaState extends Model
{
    use HasFactory;

     protected $guarded = [];


   public function division()
   {
      return $this->belongsTo(shiping::class,'division_id','id');
   }

   public function distric()
   {
      return $this->belongsTo(Distric::class,'distric_id','id');
   }

}

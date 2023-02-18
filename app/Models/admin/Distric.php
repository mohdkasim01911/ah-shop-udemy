<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distric extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function division()
   {
      return $this->belongsTo(shiping::class,'division_id','id');
   }
}

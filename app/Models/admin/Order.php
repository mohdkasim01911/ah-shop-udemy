<?php

namespace App\Models\admin;
use App\Models\User; //code to be added

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function division()
    {
      return $this->belongsTo(shiping::class,'division_id','id');
    }

    public function destrict()
    {
      return $this->belongsTo(Distric::class,'distric_id','id');
    }

    public function state()
    {
      return $this->belongsTo(AreaState::class,'state_id','id');
    }

    public function user()
    {
      return $this->belongsTo(User::class,'user_id','id');
    }
}

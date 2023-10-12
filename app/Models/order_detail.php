<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class order_detail extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function Ingredient_names(){
        return $this->belongsTo(Ingredient_name::class,'name_id','id');
    }
}

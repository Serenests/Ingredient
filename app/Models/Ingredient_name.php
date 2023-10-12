<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient_name extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function ingredientType()
    {
        return $this->belongsTo(Ingredient_type::class, 'type_id', 'id');
    }

    public function order_details(){
        return $this->belongsTo(order_detail::class, 'name_id','id');
    }

}

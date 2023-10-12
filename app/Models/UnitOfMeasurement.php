<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnitOfMeasurement extends Model
{
    use HasFactory;
    use SoftDeletes;

     public function ingredientLists()
    {
        return $this->hasMany(Ingredient_list::class);
    }
    public function Ingredient_name()
    {
        return $this->hasMany(Ingredient_name::class);
    }
}

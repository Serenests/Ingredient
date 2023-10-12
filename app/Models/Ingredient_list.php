<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Ingredient_list extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'ingredient_lists'; // กำหนดชื่อตาราง
    protected $primaryKey = 'id'; // กำหนด Primary Key
    public function ingredientType()
    {
        return $this->belongsTo(Ingredient_type::class, 'type_id', 'id');
    }

    public function unitOfMeasurement()
    {
        return $this->belongsTo(UnitOfMeasurement::class, 'unit_id', 'id');
    }

    public function Ingredient_name(){
        return $this->belongsTo(UnitOfMeasurement::class);
    }


    /*protected $table = 'ingredient_list';
    protected $fillable = [
        'name_list',
        'amount'
    ];*/
}

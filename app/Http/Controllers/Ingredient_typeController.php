<?php

namespace App\Http\Controllers;
use App\Models\Ingredient_type;
use Illuminate\Http\Request;

class Ingredient_typeController extends Controller
{
    public function create(Request $request)
    {
        $new_type = new Ingredient_type;
        $new_type->id = 1;
        $type = "เนื้อ";
        $new_type->type = $type;
        $new_type->created_at = now();
        $new_type->updated_at = now();
        $new_type->save();

        // ส่วนอื่น ๆ ของโค้ด
    }

}

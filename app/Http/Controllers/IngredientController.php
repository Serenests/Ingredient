<?php

namespace App\Http\Controllers;

use App\Models\Ingredient_list;
use App\Models\Ingredient_type;
use App\Models\UnitOfMeasurement;
use App\Models\order;
use App\Models\Ingredient_name;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index(){
        return view('addlist');
    }

    public function showAll(){
        $allname = Ingredient_name::all();
        $alltype = Ingredient_type::all();
        $allunit = UnitOfMeasurement::all();
        $list = Ingredient_list::all();
        $list = Ingredient_list::with('ingredientType')->orderBy('created_at','DESC')->get();
        $list = Ingredient_list::with('unitOfMeasurement')->get();
        return view('addlist',compact('allname','alltype','allunit','list'));
    }

    //ดึงข้อมูลประวัติไปแสดง
    public function history(){
        $list = Ingredient_list::all();
        $list = Ingredient_list::with('ingredientType')->orderBy('created_at','DESC')->get();
        $list = Ingredient_list::with('unitOfMeasurement')->get();
        return view('history',compact('list'));
    }

    //รับข้อมูลเพื่อส่งไปยัง database
    public function addOrder(Request $request){
        //ตรวจ amount ให้น้อยสุดแค่ 1 มากสุด 100
        $request->validate(['amount' => 'required|numeric|min:1|max:100']);

        // รับค่าจาก Request
        $type = $request->input('type');
        $name = $request->input('name');
        $amount = $request->input('amount');
        $unit = $request->input('unit');

        //บันทึกข้อมูล
        /*$new_list = new order;
        $new_list -> name_list = $name;
        $new_list -> amount = $amount;
        $new_list->created_at = now();
        $new_list->updated_at = now();
        $new_list -> type_id = $type;
        $new_list -> unit_id = $unit;

        $new_list->save();
        return redirect ('./add');
        */
    }


    public function edit($id)
{
    $ingredient = Ingredient_list::find($id);
    return view('editIngredient', compact('ingredient'));
}

public function update(Request $request, $id)
{
    // ตรวจสอบความถูกต้องของข้อมูลที่รับมา
    $request->validate([
        'type' => 'required',
        'name' => 'required',
        'amount' => 'required|numeric|min:1|max:100',
        'unit' => 'required',
    ]);

    // อัปเดตข้อมูลในฐานข้อมูล
    $ingredient = Ingredient_list::find($id);
    $ingredient->type_id = $request->input('type');
    $ingredient->name_list = $request->input('name');
    $ingredient->amount = $request->input('amount');
    $ingredient->unit_id = $request->input('unit');
    $ingredient->updated_at = now();
    $ingredient->save();

    return redirect('/addlist')->with('success', 'แก้ไขข้อมูลสำเร็จ');
}

public function delete($id)
{
    // ค้นหาและลบข้อมูลจากฐานข้อมูล
    $ingredient = Ingredient_list::find($id);
    $ingredient->delete();

    return redirect('/addlist')->with('success', 'ลบข้อมูลสำเร็จ');
}




}

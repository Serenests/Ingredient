<?php

namespace App\Http\Controllers;

use App\Models\CheckStock;
use App\Models\order_detail;
use App\Models\Ingredient_name;
use App\Models\Ingredient_type;
use App\Models\UnitOfMeasurement;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function toView(){
        return view ('addlist');
    }

    public function orderlist(){
        $list = order_detail::all();
        $list = order_detail::orderBy('created_at', 'DESC')->get();

        $meat = Ingredient_name::where('type_id', 1)->get();
        $pork = Ingredient_name::where('type_id', 2)->get();
        $chicken = Ingredient_name::where('type_id', 3)->get();
        $seafood = Ingredient_name::where('type_id', 4)->get();
        $vegetable = Ingredient_name::where('type_id', 5)->get();
        $fruit = Ingredient_name::where('type_id', 6)->get();
        $dessert = Ingredient_name::where('type_id', 7)->get();
        $drink = Ingredient_name::where('type_id', 8)->get();

        $type = Ingredient_type::all();
        $unit = UnitOfMeasurement::all();
        //$list = order_detail::with('Ingredient_names')->get();
        return view('addlist',compact('list','type','unit','meat','pork','chicken','seafood','vegetable','fruit','dessert','drink'));
    }

    public function getOrder(Request $request){

        $request->validate(['amount' => 'required|numeric|min:1|max:100']);

        // รับค่าจาก Request
        $name = $request->input('name');
        $amount = $request->input('amount');

        $new_order = new order_detail;
        $new_order -> amount = $amount;
        $new_order -> name_id = $name;
        $new_order->created_at = now();
        $new_order->updated_at = now();

        $new_order->save();

        return redirect ('/order');

    }

    public function edit($id,$amount){
        $edit = order_detail::find($id);
        $name = Ingredient_name::all();
        return view('editIngredient', compact('edit','name'));
    }

    public function update(Request $request){
        $update = order_detail::find($request->id);
        $newId = $request->name;
        $newAmount = $request->amount;

        $update->name_id = $newId;
        $update->amount = $newAmount;
        $update->save();

        redirect('/order');
    }
    public function deleteList($id){
        $order = order_detail::find($id);
        $order->delete();
        return redirect('./order');
    }

        public function getNames($typeId)
    {
        // Get all names with the specified type ID.
        $names = Ingredient_name::where('type_id', $typeId)->get();

        // Iterate over the names and return the first name that matches the type ID.
        foreach ($names as $name) {
            if ($name->type_id === $typeId) {
                return response()->json($name);
            }
        }

        // If no name matches the type ID, return null.
        return response()->json(null);
    }

}

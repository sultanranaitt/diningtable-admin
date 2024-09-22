<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiningTable;
use App\Models\User;
use App\Models\Dishes;
use App\Models\Drinks;
use App\Models\Seat;
use Validator;

class DiningTableController extends Controller
{
    public function index(){
        $get_dining_table = DiningTable::with('seat', 'seat.drinks', 'seat.dishes', 'seat.users')->get();
        return response()->json(["data" => $get_dining_table]);
    }

    public function get_dishes()
    {
        $get_dishes = Dishes::get();
        return response()->json(["data" => $get_dishes]);
    }

    public function get_drinks()
    {
        $get_drinks = Drinks::get();
        return response()->json(["data" => $get_drinks]);
    }

    public function get_users()
    {
        $get_users = User::get();
        return response()->json(["data" => $get_users]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'order_number' => 'required | unique:seats,order_number',
            'email' => 'required | email | exists:users',
            'dish_id' => 'required | exists:dishes,id',
            'drink_id' => 'required | exists:drinks,id',
            'table_id' => 'required | exists:dining_tables,id',
            'comment' => 'required'
        ]);

        if ($validator->fails()) {
             return response()->json(['errors'=>$validator->errors()]);
        }

        $get_table = DiningTable::where('id', $request->table_id)->first();

        $user = User::where('email', $request->email)->first();

        $drink = Drinks::where('id', $request->drink_id)->first();
        $dishes = Dishes::where('id', $request->dish_id)->first();


        $seats = new Seat();
        $seats->name = $request->name;
        $seats->order_number = $request->order_number;

        $seats->diningtable()->associate($get_table);
        $seats->users()->associate($user);

        $seats->drinks()->associate($drink);
        $seats->dishes()->associate($dishes);

        $seats->save();
        return response()->json(['success'=>"success"]);
    }
}

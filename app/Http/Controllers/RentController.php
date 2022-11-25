<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RenttUser;
use App\Models\Motor;
use Carbon\Carbon;
use Auth;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = RenttUser::all();

        return response()->json([
            "message" => "Load data success",
            "data" => $table
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer_id = Auth::id();
        $customer_name = Auth::user()->name;

        $motor_id = $request->motor_id;
        $motor_model = Motor::where('id', $motor_id)->value('merek');

        $rent_price = Motor::where('id', $motor_id)->value('rent_price');

        $rent_start = $request->rent_start;
        $rent_duration = $request->rent_duration;

        $rent_end = Carbon::create($rent_start);
        $rent_end = $rent_end->addDays($rent_duration);
        $rent_end->format('Y-m-d');

        $table = RenttUser::create([
            "customer_id" => $customer_id,
            "motor_id" => $motor_id,
            "customer_name" => $customer_name,
            "motor_model" => $motor_model,
            "rent_price" => $rent_price,
            "rent_duration" => $rent_duration,
            "rent_start" => $rent_start,
            "rent_end" => $rent_end
        ]);

        return response()->json([
            "message" => "Rental Berhasil",
            "motor" => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = RenttUser::find($id);
        if($table){
            return $table;
        }else{
            return ['message' => "Data not found"];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = RenttUser::find($id);
        if($table){
            $table->delete();
            return ['message' => "Delete success"];
        }else{
            return ['message' => "Data not found"];
        }
    }
}

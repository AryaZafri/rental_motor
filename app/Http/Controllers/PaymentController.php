<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentUser;
use App\Models\RenttUser;
use Carbon\Carbon;
use Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = PaymentUser::all();

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
        $rent_id = $request->rent_id;

        $customer_id = RenttUser::where('id', $rent_id)->value('customer_id');
        $motor_id = RenttUser::where('id', $rent_id)->value('motor_id');
        $customer_name = RenttUser::where('id', $rent_id)->value('customer_name');
        $price = RenttUser::where('id', $rent_id)->value('rent_price');

        $payment_date = Carbon::now();

        $table = PaymentUser::create([
            "rent_id" => $rent_id,
            "customer_id" => $customer_id,
            "motor_id" => $motor_id,
            "customer_name" => $customer_name,
            "price" => $price,
            "payment_date" => $payment_date,
        ]);

        return response()->json([
            "message" => "Pembayaran Berhasil",
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
        $table = PaymentUser::find($id);
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
        $table = PaymentUser::find($id);
        if($table){
            $table->delete();
            return ['message' => "Delete success"];
        }else{
            return ['message' => "Data not found"];
        }
    }
}

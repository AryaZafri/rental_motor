<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Motor::all();

        // return $data;
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
        $table = Motor::create([
            "merek" => $request->merek,
            "tipe" => $request->tipe,
            "deskripsi" => $request->deskripsi,
            "no_plat" => $request->no_plat,
            "rent_price" => $request->rent_price,
            "rilis" => $request->rilis
        ]);
            // return $table;
            return response()->json([
                "message" => "Menambah Data Success",
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
        $table = Motor::find($id);
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
        $table = Motor::find($id);
        if($table){
            $table->merek = $request->merek ? $request->merek : $table->merek;
            $table->tipe = $request->tipe ? $request->tipe : $table->tipe;
            $table->deskripsi = $request->deskripsi ? $request->deskripsi : $table->deskripsi;
            $table->no_plat = $request->no_plat ? $request->no_plat : $table->no_plat;
            $table->rilis = $request->rilis ? $request->rilis : $table->rilis;
            $table->save();

            return $table;
        }else{
            return ['message' => "Data not found"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Motor::find($id);
        if($table){
            $table->delete();
            return ['message' => "Delete success"];
        }else{
            return ['message' => "Data not found"];
        }
    }
}

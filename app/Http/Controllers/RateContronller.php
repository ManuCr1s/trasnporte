<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;
use App\Http\Requests\RateRequest;
class RateContronller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rate = Rate::select('id','name','amount','status')->get();
        return datatables()->of($rate)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.user.rate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RateRequest $request)
    {
        try {
            $rate = Rate::create([
                'name' => $request->input('name'),
                'amount' => $request->input('amount'),
                'created_by' => auth()->id(),
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "Por favor comuniquese con el administrador"
            ]);
        }
        return response()->json([
            'status' => true,
            'message' => 'Se realizo el registro de la Taza con exito'
        ]);
        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RateRequest $request)
    {
        try {
            $rate = Rate::find($request->input('id'));
            $rate->name = $request->input('name');
            $rate->amount = $request->input('amount');
            $rate->created_by = auth()->id();
            $rate->save();
        } catch (\Throwable $th) {
            return $th;
            /* return response()->json([
                'status' => false,
                'message' => "Por favor comuniquese con el administrador"
            ]); */ 
        }
        return response()->json([
            'status' => true,
            'message' => "Se cambio correctamente la taza de pago"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $rate = Rate::find($request->input('id'));
            $rate->status = !$request->input('status');
            $rate->created_by = auth()->id();
            $rate->save();
        }catch(\Throwable $th){
            return $th;
            /*             return response()->json([
                'status' => false,
                'message' => "Por favor comuniquese con el administrador"
            ]);  */
        }
        return response()->json([
            'status' => true,
            'message' => "Se cambio correctamente la taza de pago"
        ]);
    }
}

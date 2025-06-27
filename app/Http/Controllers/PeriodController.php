<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PeriodRequest;
use App\Models\Period;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $period = Period::select('id','name','description','status')->get();
        return datatables()->of($period)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PeriodRequest $request)
    {
        try {
            $period = Period::create([
                'name'=> $request->input('name'),
                'description' => $request->input('description'),
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
            'message' => "Se ingresó correctamente el periodo"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $period = Period::select('id','name')->where('status','=',true)->get();
        return response()->json([
            'status' => true,
            'data' => $period
        ]);
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
    public function update(Request $request, string $id)
    {
        //
    }
    public function destroy(Request $request)
    {
        if($period = Period::where('status',true)->where('id','!=',$request->input('id'))->count() === 1){
            return response()->json([
                'status' => false,
                'message' => 'Solo puede tener un periodo activo' 
            ]);
        }else{
            try {
                $user = Period::find($request->input('id'));
                $user->status = !$request->input('status');
                $user->save();
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'message' => "Por favor comuniquese con el administrador"
                ]); 
            }
                 return response()->json([
                    'status' => true,
                    'message' => "Se cambio correctamente el estado del periodo"
                ]);
        }
        
    }
}

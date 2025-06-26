<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Period;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $period =  Period::where('status',true)->count();
        if($period === 1){
                 $order = Order::join('persons as pe','orders.id_person','=','pe.dni')
                    ->join('rates as ra','orders.id_rate','ra.id')
                    ->join('periods as pr','orders.id_period','pr.id')
                    ->select('orders.correlative','orders.status','pr.name as period','orders.description', DB::raw('CONCAT(pe.name," ",pe.lastname) as person'),'ra.name','ra.amount','orders.created_at as create')
                    ->where('orders.id_period',function ($query) {
                        $query->select('id')
                            ->from('periods')
                            ->where('status', true)
                            ->limit(1);
                    })
                    ->get();
                return datatables()->of($order)->toJson();
        }else{
            return response()->json([
                'status' => false,
                'messages' => 'Por favor, active periodo de Pago, en la vista (Periodo)'
            ]);
        }
   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.user.orden');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

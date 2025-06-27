<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Period;
use App\Models\Person;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\OrderRequest;

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
    public function store(OrderRequest $request)
    {
         try {
                $person = Person::where('dni','=',$request->input('dni'))->first();
                if(!$person){
                    $person = Person::create([
                        'dni' => $request->input('dni'),
                        'name' => $request->input('name'),
                        'lastname' => $request->input('lastname')
                    ]);
                }
                $year = $request->input('year');
                $prefix = 'OP' . $year;

                DB::transaction(function () use ($prefix, $request ,$year, &$correlative) {
                    // Buscar último correlativo del año actual
                    $last = Order::lockForUpdate()
                        ->where('correlative', 'like', $prefix . '-%')
                        ->orderBy('correlative', 'desc')
                        ->first();

                    // Extraer el número correlativo
                    $lastNumber = $last
                        ? intval(substr($last->correlative, -6)) // por ejemplo: "OP2025-000045" -> 45
                        : 0;

                    // Generar nuevo correlativo
                    $number = str_pad($lastNumber + 1, 6, '0', STR_PAD_LEFT);
                    $correlative = $prefix . '-' . $number;

                    // Guardar orden (si deseas hacerlo aquí mismo)
                    Order::create([
                        'name'=> $request->input('name'),
                        'correlative' => $correlative,
                        'description' => $request->input('description'),
                        'id_person' => $request->input('dni'),
                        'id_rate' => $request->input('rate'),
                        'id_period' => $request->input('period'),
                        'created_by' => auth()->id(),
                    ]);
                });
          
        } catch (\Throwable $th) {
            return $th;
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

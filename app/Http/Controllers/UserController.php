<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$user = User::select('dni as dni','name as name','lastname as lastname','email as email')->get();
        $user = User::join('model_has_roles as mr','users.dni','=','mr.model_id')
        ->select('users.dni as dni','users.name','users.lastname','users.email','users.status')
        ->where('mr.role_id','=',2)
        ->get();
        return datatables()->of($user)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {
            $person = User::create([
                'dni' => $request->input('dni'),
                'name'=> $request->input('nombres'),
                'lastname'=> $request->input('apellidos'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('dni')),
            ]);
            $role = Role::firstOrCreate(['name' => 'user']);
            $person->assignRole($role);
        } catch (\Throwable $th) {
            /*
            return response()->json([
                'status' => false,
                'message' => "Por favor comuniquese con el administrador"
            ]);*/
            return $th;
        }
         return response()->json([
            'status' => true,
            'message' => "Se ingresó correctamente el usuario"
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
    public function destroy(Request $request)
    {
        try {
            $user = User::find($request->input('dniUser'));
            $user->status = !$request->input('status');
            $user->save();
        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => "Por favor comuniquese con el administrador"
            ]); 
        }
        return response()->json([
            'status' => true,
            'message' => "Se cambio correctamente el nombre del equipo"
        ]);
    }
}

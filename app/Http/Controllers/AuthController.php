<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Person;

class AuthController extends Controller
{
    public $token = 'apis-token-5761.59ZzjNAOFWADmBfvLbj8DvX98Yv1FDPH';
    public function showLogin(){
        return view('pages.login');
    }
    public function login(AuthRequest $request){
        if(User::where('dni',$request->input('dni'))->value('status') == 1){
                if(Auth::attempt($request->only('dni','password'))){
                    $request->session()->regenerate();
                        return response()->json([
                                'status' => true,
                                'route' => '/dashboard'
                        ]);
                }else{
                        return response()->json([
                            'status' => false,
                            'message' => 'Por favor ingrese credenciales correctas'
                        ]);
                }
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Por favor comuniquese con el Administrador su cuenta esta bloqueada'
            ]);
        }
    }
    public function begin(){
        return view('pages.admin.dash');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function dni(Request $request){
        if (Auth::user()->hasRole('admin')) {
            $user = User::where('dni',$request->input('dni'))->exists();
            if($user){
                return response()->json([
                    'status' => false,
                    'message' => 'El Dni ya se encuentra registrado'
                ]);
            }
      
        }else{
            $user = Person::where('dni',$request->input('dni'))->exists();
            if($user){
                $user = Person::where('dni',$request->input('dni'))->first();
                $response = [
                    'status' => true,
                    'apellidoPaterno' => $user->lastname,
                    'apellidoMaterno' => '',
                    'nombres'=> $user->name
                ];
                return response()->json($response);
            }
        }
        $curl = curl_init();
        // Buscar dni
        curl_setopt_array($curl, array(
        // para user api versión 2
        CURLOPT_URL => 'https://api.apis.net.pe/v2/reniec/dni?numero=' . $request->input('dni'),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 2,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Referer: https://apis.net.pe/consulta-dni-api',
            'Authorization: Bearer ' . $this->token
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $person = json_decode($response);       
        if($person == null){
            $person = array('status'=>false,'message'=>'Por favor verifique su conexion a internet');
        }else if(property_exists($person,'nombres')){
            $person->status = true;
        }else if($person->message == 'dni no valido'){
            $person->status = false;
            $person->apellidoPaterno = '';
            $person->apellidoMaterno = '';
            $person->message = 'Por favor verifique su DNI y registre su nombre y apellido';
        }else if($person->message == 'not found'){
            $person->status = false;
            $person->apellidoPaterno = '';
            $person->apellidoMaterno = '';
            $person->message = 'Por favor ingrese sus nombres y apellidos';
        }
        return response()->json($person);
        
    }
}

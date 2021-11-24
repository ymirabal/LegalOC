<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

use function PHPUnit\Framework\isEmpty;

class AuthMDAController extends Controller
{

    public function login(Request $request)
    {
        try {
                $url = 'https://mda.emcomed.cu/api/login/'.$request->email.'/'.$request->password;

                $response = Http::withOptions([
                    'verify' => false,
                ])->get($url);

                if($response['estado'] == 'error' ){
                    return back()->withErrors([
                        'password' => ['No coincide los datos de autenticación']
                    ]);
                }else
                {
                    return $this->update_user($response,$request);
                }
        } catch (Exception $e) {

            /*  Auth Interna en caso que falle el mda */

            $substr = 'cURL error 6: Could not resolve host: mda.emcomed.cu (see https://curl.haxx.se/libcurl/c/libcurl-errors.html) for https://mda.emcomed.cu/api/login/';

            if(substr_compare($e->getMessage(),$substr, 0, 147 ) == 0){

                $user = User::where('email', $request->email)->first();

                if (! $user || ! Hash::check($request->password, $user->password)) {
                    return back()->withErrors([
                        'password' => ['No coincide los datos de autenticación']
                    ]);
                }else{
                    $user->createToken('auth_token')->plainTextToken;
                    Auth::login($user);
                    return redirect()->intended('dashboard');
                }


            }else{

                Log::create(['message' => $e->getMessage()]);

                return back()->withErrors([
                    'password' => ['Error de conexión']
                ]);
            }
        }
    }

    public function logout()
    {
        Auth::logout();
    }

    public function update_user($response,Request $request){

        $existe_usuario = User::where('email',$response['usuario']['email'])->with('roles');

        if($existe_usuario->exists() && $response['usuario']['activo'] == 1){
            //Ya existe en la tabla

            $user = $existe_usuario->first();

            if(count($user->roles) == 0){
                return back()->withErrors([
                    'password' => ['Tiene que solicitar el acceso']
                ]);
            }

            $user->password = Hash::make($request->password);
            $user->email_verified_at = now();
            $user->save();
            $user->createToken('auth_token')->plainTextToken;

            Auth::login($user);
            return redirect()->intended('dashboard');

        }else{
            // No existe se guarda los datos y falta asignarle el rol

            $user = User::create([
                'name' => $response['usuario']['name'].' '.$response['usuario']['last_name'],
                'email' => $response['usuario']['email'],
                'password' => Hash::make($request->password),
                'unidad_id_mda' => $response['usuario']['id_drogueria']
            ]);

            return back()->withErrors([
                'password' => ['Tiene que solicitar el acceso']
            ]);
        }
    }
}

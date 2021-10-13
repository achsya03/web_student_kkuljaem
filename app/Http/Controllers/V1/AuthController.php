<?php

namespace App\Http\Controllers\V1;

use App\Constants\ApiEndpoint;
use App\Constants\StatusApiConstant;
use App\DTO\LoginDTO;
use App\DTO\RegisterDTO;
use App\DTO\ResponseApi;
use App\Http\Controllers\Controller;
use App\Service\Client;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $apiEndpoint;

    public function __construct()
    {
        $this->apiEndpoint = new ApiEndpoint();
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        try {
            $clientService = new Client;
            $url = $this->apiEndpoint::$loginProcess;

            $loginDTO = new LoginDTO;
            $loginDTO->email = $request->email;
            $loginDTO->password = $request->password;
            $loginDTO->device_id = 'web';
            $loginDTO->lokasi = '-7.889006,110.296746';
                    
            $response = $clientService->post($url, $loginDTO->getArray());
            
            $responseApi = new ResponseApi($response);
            if ($response->message == StatusApiConstant::$failed) {
                return redirect()->back()->withErrors($responseApi->getInfo());
            } elseif ($response->message == StatusApiConstant::$success) {
                session()->put('bearer_token', $response->data->bearer_token);
                session()->put('login', [
                    "jenis_pengguna" => $response->data->jenis_pengguna,
                    "jenis_akun" => $response->data->jenis_akun,
                ]);
                return redirect()->route('dashboard.index');
            }
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function register()
    {
        return view('auth.register');
    }
    public function forgot()
    {
        return view('auth.forgot');
    }

    public function changePassword(Request $request)
    {
        $token = $request->token;
        return view('auth.change-password')->with( ['token1'=>$token] );
    }

    public function forgotProcess(Request $request)
    {
        try {
            $clientService = new Client;
            $url = $this->apiEndpoint::$forgetPassword;

            $data = [
                'email' => $request->email
            ];

            //$data = json_encode($data);
            
            $response = $clientService->post($url, $data);
            //dd($response);
            
            $responseApi = new ResponseApi($response);
            if ($response->message == StatusApiConstant::$failed) {
                return redirect()->back()->withErrors($responseApi->getInfo());
            } elseif ($response->message == StatusApiConstant::$success) {
                return redirect()->route('forgot.index')->with( ['status'=>'email-sended'] );
            }
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function changePasswordProcess(Request $request)
    {
        try {
            $clientService = new Client;
            $url = $this->apiEndpoint::$changePassword;

            $data = [
                'token' => $request->token1,
                'password' => $request->password,
                'password_confirmation' => $request->confirm_password
            ];
            dd($data);

            //$data = json_encode($data);
            
            $response = $clientService->post($url, $data);
            //dd($response);
            
            $responseApi = new ResponseApi($response);
            if ($response->message == StatusApiConstant::$failed) {
                return redirect()->back()->withErrors($responseApi->getInfo());
            } elseif ($response->message == StatusApiConstant::$success) {
                return redirect()->route('login.index')->with( ['status'=>'password-changed'] );
            }
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function registerProcess(Request $request)
    {
        try {
            $clientService = new Client;
            $url = $this->apiEndpoint::$registerProcess;

            $registerDTO = new RegisterDTO;
            $registerDTO->email = $request->email;
            $registerDTO->password = $request->password;
            $registerDTO->password_confirmation = $request->password_confirmation;

            $response = $clientService->post($url, $registerDTO->getArray());

            $responseApi = new ResponseApi($response);
            if ($response->message == StatusApiConstant::$failed) {
                return redirect()->back()->withErrors($responseApi->getInfo());
            } elseif ($response->message == StatusApiConstant::$success) {
                return redirect()->route('login.index')->withErrors($responseApi->getInfo());
            }
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
}

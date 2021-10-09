<?php

namespace App\Http\Controllers\V1;

use App\Constants\ApiEndpoint;
use App\Constants\StatusApiConstant;
use App\DTO\ResponseApi;
use App\Http\Controllers\Controller;
use App\Service\Client;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    protected $apiEndpoint;
    protected $client;

    public function __construct()
    {
        $this->client = new Client;
        $this->apiEndpoint = new ApiEndpoint();
    }

    public function index() {
        // try {
            $response = $this->client->getWithAuth($this->apiEndpoint::$profil);
            $responseApi = new ResponseApi($response);
            $responseHistori = $this->client->getWithAuth($this->apiEndpoint::$histori);
            $responseApiHistori = new ResponseApi($responseHistori);
            
            if ($responseApi->message == StatusApiConstant::$failed) {
                return redirect()->back()->withErrors($responseApi->getInfo());
            } elseif ($responseApi->message == StatusApiConstant::$success) {
                $profil = $responseApi->getData();
                dd($profil);
                $histori = $responseApi->getData()->subscription;
                return view('profil.index', compact('profil','histori'));
            }
        // } catch (\Exception $th) {
        //     return redirect()->back()->withErrors($th->getMessage());
        // }
    }

    public function update(Request $request)
    {
        //   dd($request->all());
        
        try {
            $clientService = new Client;
            $url = $this->apiEndpoint::$update_profil;
            // dd(json_encode($request->all()));
           
            $response = $clientService->post($url, $request->all());
            $responseApi = new ResponseApi($response);
            

            if ($response->message == StatusApiConstant::$failed) {
                return redirect()->back()->withErrors($responseApi->getInfo());
            } elseif ($response->message == StatusApiConstant::$success) {
               
                return redirect()->route('profil.index');
            }
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function change_password(Request $request)
    {
        //   dd($request->all());
        
        try {
            $clientService = new Client;
            $url = $this->apiEndpoint::$update_password;
            // dd(json_encode($request->all()));
           
            $response = $clientService->post($url, $request->all());
            $responseApi = new ResponseApi($response);
            // dd($responseApi);

            if ($response->message == StatusApiConstant::$failed) {
                return redirect()->back()->with('failed', $responseApi->getInfo());
            } elseif ($response->message == StatusApiConstant::$success) {
               
                return redirect()->route('profil.index')->with('success', $responseApi->getInfo());;
            }
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

   
}

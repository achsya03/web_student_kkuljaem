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
            $responsetnc = $this->client->get($this->apiEndpoint::$info.'?key=tnc');
            $tncApi = new ResponseApi($responsetnc);

            $responsepolicy = $this->client->get($this->apiEndpoint::$info.'?key=policy');
            $policyApi = new ResponseApi($responsepolicy);

            $responseabout = $this->client->get($this->apiEndpoint::$info.'?key=about');
            $aboutApi = new ResponseApi($responseabout);

            $responseversion = $this->client->get($this->apiEndpoint::$info.'?key=version');
            $versionApi = new ResponseApi($responseversion);

            $responsetestimoni = $this->client->get($this->apiEndpoint::$testimoni);
            $testimoniApi = new ResponseApi($responsetestimoni);

            $response = $this->client->getWithAuth($this->apiEndpoint::$profil);
            $responseApi = new ResponseApi($response);

            $responseHistori = $this->client->getWithAuth($this->apiEndpoint::$histori);
            $responseApiHistori = new ResponseApi($responseHistori);
            
            if ($responseApi->message == StatusApiConstant::$failed) {
                return redirect()->back()->withErrors($responseApi->getInfo());
            } elseif ($responseApi->message == StatusApiConstant::$success) {
                $profil = $responseApi->getData()->user;
                $account = $responseApi->getAccount();                
                $histori = $responseApiHistori->getData();
                $policy=$policyApi->getData();
                $about=$aboutApi->getData();
                $version=$versionApi->getData();
                $tnc=$tncApi->getData();
                $testimoni=$testimoniApi->getData();
               
                return view('profil.index', compact('account','profil','histori','policy','about','version','tnc','testimoni'));
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

    public function logout()
    {
        session()->forget('bearer_token');
        try {
            $url = ApiEndpoint::$homeone;
            $response = $this->client->getWithAuth($url);
            $responseApi = new ResponseApi($response);
            if ($responseApi->message == StatusApiConstant::$failed) {
                return redirect()->back()->withErrors($responseApi->getInfo());
            } elseif ($responseApi->message == StatusApiConstant::$success) {
                $data = $responseApi->getData();
                return view('dashboard.noauth', compact('data'));
            }
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
       
    }

   
}

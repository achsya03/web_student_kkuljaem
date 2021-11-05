<?php

namespace App\Http\Controllers\V1;

use App\Constants\ApiEndpoint;
use App\Constants\StatusApiConstant;
use App\DTO\ResponseApi;
use App\Http\Controllers\Controller;
use App\Service\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client;
    }
    
    public function index()
    {
        if(session()->get('bearer_token')==null){
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
        }else{
            
            try {
                
                $url = ApiEndpoint::$home;
                $response = $this->client->getWithAuth($url);
                $responseApi = new ResponseApi($response);
                
                if ($responseApi->message == StatusApiConstant::$failed) {
                    return redirect()->back()->withErrors($responseApi->getInfo());
                } elseif ($responseApi->message == StatusApiConstant::$success) {
                    
                    $account = $responseApi->getAccount();
                    $data = $responseApi->getData();
                    
                    // dd($data);
                    return view('dashboard.index', compact('data','account'));
                }
            } catch (\Exception $th) {
                return redirect()->back()->withErrors($th->getMessage());
            }

           
        }
    }

    public function search(Request $request) {
        try {
            
            if($request->get('keyword') != null) {
                $response = $this->client->getWithAuth(ApiEndpoint::$search.'?keyword='.$request->get('keyword'));
                $responseApi = new ResponseApi($response);
                if ($responseApi->message == StatusApiConstant::$failed) {
                    return redirect()->back()->withErrors($responseApi->getInfo());
                    dd($responseApi->getInfo());
                } elseif ($responseApi->message == StatusApiConstant::$success) {
                    $data = $responseApi->getData();
                    $account = $responseApi->getAccount();
                    return view('dashboard.search', compact('data','account'));
                }
            }
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function delete_notif($id)
    {

        try {
            $clientService = new Client;
            $url = ApiEndpoint::$notif . '?token=' . $id;


            $response = $clientService->delete($url);
            $responseApi = new ResponseApi($response);


            if ($response->message == StatusApiConstant::$failed) {
                return redirect()->back()->withErrors($responseApi->getInfo());
            } elseif ($response->message == StatusApiConstant::$success) {
                return redirect()->back()->withErrors($responseApi->getInfo());
               
            }
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function read_notif($id, Request $request)
    {
        try {
            
            $clientService = new Client;
            $url = ApiEndpoint::$read_notif. '?token='. $id;
            
            $response = $clientService->post_like($url);
            $responseApi = new ResponseApi($response);
            
            if ($response->message == StatusApiConstant::$failed) {
                return redirect()->back()->withErrors($responseApi->getInfo());
            } elseif ($response->message == StatusApiConstant::$success) {
                if($request->posisi=='Forum-Like'){                                        
                    return redirect()->route('forum.detail', $request->id_target);
                    }else if($request->posisi=='Forum-Comment'){                                        
                        return redirect()->route('forum.detail', $request->id_target);
                        }else if($request->posisi=='Qna-Comment'){                                        
                            return redirect()->route('qna.detail', $request->id_target);
                            }else if($request->posisi=='Qna-Like'){                                        
                                return redirect()->route('qna.detail', $request->id_target);
                                }
            }
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
}

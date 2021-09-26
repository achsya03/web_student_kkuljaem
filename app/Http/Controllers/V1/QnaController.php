<?php

namespace App\Http\Controllers\V1;

use App\Constants\ApiEndpoint;
use App\Constants\StatusApiConstant;
use App\DTO\ResponseApi;
use App\Http\Controllers\Controller;
use App\Service\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QnaController extends Controller
{
    protected $apiEndpoint;
    protected $client;

    public function __construct()
    {
        $this->client = new Client;
        $this->apiEndpoint = new ApiEndpoint();
    }

    public function index() {
        if (Auth::guest()) {
            try {
                $response = $this->client->getWithAuth($this->apiEndpoint::$qna);
                $responseApi = new ResponseApi($response);
                
                if ($responseApi->message == StatusApiConstant::$failed) {                
                    return redirect()->back()->withErrors($responseApi->getInfo());
                } elseif ($responseApi->message == StatusApiConstant::$success ) {
                    $qna = $responseApi->getData();
                    // dd($history);
                    return view('qna.index', compact('qna'));
                }
           
            } catch (\Exception $th) {
                return redirect()->back()->withErrors($th->getMessage());
            }
        }else{
            try {
                $response = $this->client->get($this->apiEndpoint::$qna);
                $responseApi = new ResponseApi($response);    
               
                if ($responseApi->message == StatusApiConstant::$failed ) {                
                    return redirect()->back()->withErrors($responseApi->getInfo());
                } elseif ($responseApi->message == StatusApiConstant::$success ) {
                    $qna = $responseApi->getData();
                    
                    return view('qna.index', compact('qna'));
                }
            } catch (\Exception $th) {
                return redirect()->back()->withErrors($th->getMessage());
            }
        }
        
    }
    }
   


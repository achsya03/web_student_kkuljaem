<?php

namespace App\Http\Controllers\V1;

use App\Constants\ApiEndpoint;
use App\Constants\StatusApiConstant;
use App\DTO\ResponseApi;
use App\Http\Controllers\Controller;
use App\Service\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
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
                $response = $this->client->getWithAuth($this->apiEndpoint::$forum);
                $responseuser = $this->client->getWithAuth($this->apiEndpoint::$forumuser);
                $responseApi = new ResponseApi($response);
                $responseApiUser = new ResponseApi($responseuser);
                
                if ($responseApi->message == StatusApiConstant::$failed && $responseApiUser->message == StatusApiConstant::$failed ) {                
                    return redirect()->back()->withErrors($responseApi->getInfo().' '. $responseApiUser->getInfo()) ;
                } elseif ($responseApi->message == StatusApiConstant::$success && $responseApiUser->message == StatusApiConstant::$success ) {
                    $forum_user =$responseApiUser->getData();
                    $forums = $responseApi->getData()->forum;
                    $themes = $responseApi->getData()->theme;
                    $account = $responseApi->getAccount();
                    // dd($themes);
                    return view('forum.index', compact('forums','themes','forum_user','account'));
                }
           
            } catch (\Exception $th) {
                return redirect()->back()->withErrors($th->getMessage());
            }
        }else{
            try {
                $response = $this->client->get($this->apiEndpoint::$forum);
                $responseApi = new ResponseApi($response);    
               
                if ($responseApi->message == StatusApiConstant::$failed ) {                
                    return redirect()->back()->withErrors($responseApi->getInfo());
                } elseif ($responseApi->message == StatusApiConstant::$success ) {
                    $forums = $responseApi->getData()->forum;
                    $themes = $responseApi->getData()->theme;
                    $account = $responseApi->getAccount();
                    // dd($forum);
                    return view('forum.index', compact('forums','themes','account'));
                }
            } catch (\Exception $th) {
                return redirect()->back()->withErrors($th->getMessage());
            }
        }
        
    }

   
}

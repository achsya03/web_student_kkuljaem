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
                    // dd($forums);
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
    public function create_post(Request $request)
    {
        //  dd($request->all());
        
        try {
            $clientService = new Client;
            $url = $this->apiEndpoint::$forumpost.'?token='.$request->theme;
            // dd(json_encode($request->all()));
           
            $response = $clientService->post($url, $request->all());
            $responseApi = new ResponseApi($response);
            

            if ($response->message == StatusApiConstant::$failed) {
                return redirect()->back()->withErrors($responseApi->getInfo());
            } elseif ($response->message == StatusApiConstant::$success) {
               
                return redirect()->route('forum.index');
            }
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
    public function topik($id) {
        
        try {
            $responsetheme = $this->client->getWithAuth($this->apiEndpoint::$forum);
            $response = $this->client->getWithAuth($this->apiEndpoint::$forumtopik.'?token='.$id);
            $responseApi = new ResponseApi($response);
            $responseApitheme = new ResponseApi($responsetheme);
            
            if ($responseApi->message == StatusApiConstant::$failed) {
                return redirect()->back()->withErrors($responseApi->getInfo());
            } elseif ($responseApi->message == StatusApiConstant::$success) {
                $data = $responseApi->getData();
                $account = $responseApi->getAccount();
                $themes = $responseApitheme->getData()->theme;
                return view('forum.topik', compact('data','id','themes','account'));
            }
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
    public function detail($id) {
        
        try {
            $response = $this->client->getWithAuth($this->apiEndpoint::$forumdetail.'?token='.$id);
            $responseApi = new ResponseApi($response);

           
            
            if ($responseApi->message == StatusApiConstant::$failed) {
                return redirect()->back()->withErrors($responseApi->getInfo());
            } elseif ($responseApi->message == StatusApiConstant::$success) {
                $forum = $responseApi->getData();
                $account = $responseApi->getAccount();
                return view('forum.detail', compact('forum','id','account'));
            }
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function delete($id) {
        
        try {
            $clientService = new Client;
            $url = $this->apiEndpoint::$forumpost.'?token='.$id;
            
           
            $response = $clientService->delete($url);
            $responseApi = new ResponseApi($response);
            
                
            if ($response->message == StatusApiConstant::$failed) {
                return redirect()->back()->withErrors($responseApi->getInfo());
            } elseif ($response->message == StatusApiConstant::$success) {
               
                return redirect()->route('forum.index');
            }
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function delete_comment(Request $request) {
        
        try {
            $clientService = new Client;
            $url = $this->apiEndpoint::$forumcomment.'?token='.$request->id;
            
           
            $response = $clientService->delete($url);
            $responseApi = new ResponseApi($response);
            
                
            if ($response->message == StatusApiConstant::$failed) {
                return redirect()->back()->withErrors($responseApi->getInfo());
            } elseif ($response->message == StatusApiConstant::$success) {
               
                return redirect()->route('forum.detail',$request->detail_id);
            }
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function create_comment(Request $request)
    {
        //  dd($request->all());
        
        try {
            $clientService = new Client;
            $url = $this->apiEndpoint::$forumcomment.'?token='.$request->id;
            // dd(json_encode($request->all()));
           
            $response = $clientService->post($url, $request->all());
            $responseApi = new ResponseApi($response);
            

            if ($response->message == StatusApiConstant::$failed) {
                return redirect()->back()->withErrors($responseApi->getInfo());
            } elseif ($response->message == StatusApiConstant::$success) {
               
                return redirect()->route('forum.detail',$request->id);
            }
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function like_post($id)
    {
        // dd($request->all());
        
        try {
            $clientService = new Client;
            $url = $this->apiEndpoint::$forumlike.'?token='.$id;
            // dd(json_encode($request->all()));
            $response = $clientService->post_like($url);
            $responseApi = new ResponseApi($response);
        // dd($responseApi);
            if ($response->message == StatusApiConstant::$failed) {
                return redirect()->back()->withErrors($responseApi->getInfo());
            } elseif ($response->message == StatusApiConstant::$success) {
               
                return redirect()->route('forum.index');
            }
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
    public function unlike_post($id)
    {
        // dd($request->all());
        
        try {
            $clientService = new Client;
            $url = $this->apiEndpoint::$forumlike.'?token='.$id;
            $response = $clientService->delete($url);
            $responseApi = new ResponseApi($response);

            if ($response->message == StatusApiConstant::$failed) {
                return redirect()->back()->withErrors($responseApi->getInfo());
            } elseif ($response->message == StatusApiConstant::$success) {
               
                return redirect()->route('forum.index');
            }
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

}

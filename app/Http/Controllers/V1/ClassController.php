<?php

namespace App\Http\Controllers\V1;

use App\Constants\ApiEndpoint;
use App\Constants\StatusApiConstant;
use App\DTO\ResponseApi;
use App\Http\Controllers\Controller;
use App\Service\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    protected $apiEndpoint;
    protected $client;

    public function __construct()
    {
        $this->client = new Client;
        $this->apiEndpoint = new ApiEndpoint();
    }

    public function index() {
        try {
            $response = $this->client->getWithAuth($this->apiEndpoint::$class);
            $responseApi = new ResponseApi($response);

            $responseHistory = $this->client->getWithAuth($this->apiEndpoint::$classHistory);
            $responseApiHistory = new ResponseApi($responseHistory);
            
            
            if ($responseApi->message == StatusApiConstant::$failed && $responseApiHistory->message == StatusApiConstant::$failed ) {                
                return redirect()->back()->withErrors($responseApi->getInfo().' '. $responseApiHistory->getInfo());
            } elseif ($responseApi->message == StatusApiConstant::$success && $responseApiHistory->message == StatusApiConstant::$success) {
                $class = $responseApi->getData();
                $history = $responseApiHistory->getData();
                $account = $responseApi->getAccount();
                // dd($class);
                return view('class.index', compact('class', 'history','account'));
            }
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    
    }

    public function kategori($id) {
        try {
            $response = $this->client->getWithAuth($this->apiEndpoint::$classByCategory.'?token='.$id);
            $responseApi = new ResponseApi($response);

            $responselainnya = $this->client->getWithAuth($this->apiEndpoint::$class);
            $responseApilainnya = new ResponseApi($responselainnya);
            
            if ($responseApi->message == StatusApiConstant::$failed) {
                return redirect()->back()->withErrors($responseApi->getInfo());
            } elseif ($responseApi->message == StatusApiConstant::$success) {
                $class = $responseApi->getData();
                $lain = $responseApilainnya->getData();
                // dd($class);
                return view('class.kategori', compact('class','lain'));
            }
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    
    }

    public function detail($id) {
        
        try {
            $response = $this->client->getWithAuth($this->apiEndpoint::$classDetail.'?token='.$id);
            $responseApi = new ResponseApi($response);

            $responselainnya = $this->client->getWithAuth($this->apiEndpoint::$class);
            $responseApilainnya = new ResponseApi($responselainnya);
            
            if ($responseApi->message == StatusApiConstant::$failed) {
                return redirect()->back()->withErrors($responseApi->getInfo());
            } elseif ($responseApi->message == StatusApiConstant::$success) {
                $class = $responseApi->getData();
                $lain = $responseApilainnya->getData();
                $account = $responseApi->getAccount();

                // dd($class);

                return view('class.detail', compact('class','lain','account'));
            }
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function mentor($id) {
        
        try {
            $response = $this->client->getWithAuth($this->apiEndpoint::$classDetailMentor.'?token='.$id);
            $responseApi = new ResponseApi($response);
            
            if ($responseApi->message == StatusApiConstant::$failed) {
                return redirect()->back()->withErrors($responseApi->getInfo());
            } elseif ($responseApi->message == StatusApiConstant::$success) {
                $class = $responseApi->getData();
                
                return view('class.mentor', compact('class'));
            }
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
    public function video($id) {
        try {
            $response = $this->client->getWithAuth($this->apiEndpoint::$classDetailVideo.'?token='.$id);
            $responseApi = new ResponseApi($response);

            $responseQna = $this->client->getWithAuth($this->apiEndpoint::$qnaByVideo.'?token='.$id);
            $responseApiQna = new ResponseApi($responseQna);
            
            if ($responseApi->message == StatusApiConstant::$failed) {
                return redirect()->back()->withErrors($responseApi->getInfo());
            } elseif ($responseApi->message == StatusApiConstant::$success) {
                $class = $responseApi->getData();
                $qna = $responseApiQna->getData();
                // dd($class);
                return view('class.video', compact('class','qna'));
            }
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function quiz($id) {
        try {
            $response = $this->client->getWithAuth($this->apiEndpoint::$classDetailQuiz .'?token='.$id);
            $responseApi = new ResponseApi($response);
            
            if ($responseApi->message == StatusApiConstant::$failed) {
                return redirect()->back()->withErrors($responseApi->getInfo());
            } elseif ($responseApi->message == StatusApiConstant::$success) {
                $quiz = $responseApi->getData();
                dd($quiz);
                return view('class.quiz', compact('quiz'));
            }
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
}

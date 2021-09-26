@extends('layouts.dashboard')

@section('css')
    <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet" />
@endsection

@section('title')
    {{ env('APP_NAME') }} | Home
@endsection

@section('content')

    <!-- hero-dashboard -->
    <div id="hero-dashboard" class="container">
        <div class="row">
            <div class="slider">
                @foreach ($data->banner as $item)
                   
                    <div class="">
                      <button type=" button" class="btn col-lg-12 mx-auto banner"
                        id="btn-market{{ $item->banner_uuid }}" data-toggle="modal"
                        data-target="#banner-market{{ $item->banner_uuid }}">
                        <img src="{{ $item->url_web }}" height="auto" alt="" srcset="" /></button>
                    </div>
                    
                @endforeach

            </div>
        </div>
    </div>
    @foreach ($data->banner as $item)
    @php
        
        $response = new \GuzzleHttp\Client();
        $a = $response->request('GET', 'https://floating-harbor-93486.herokuapp.com/api/home/banner?token=' . $item->banner_uuid, [
            'headers' => [
                'Accept' => 'application/json',
                'user-uuid' => '9993367b6505470fa2d1fad8c3990754',
                'authorization' => 'Bearer ' . session()->get('bearer_token'),
            ],
        ]);
        $responseApi = json_decode($a->getBody()->getContents());
        $databanner = $responseApi->data;
        
    @endphp

    <div class="modal fade" id="banner-market{{ $item->banner_uuid }}" tabindex="-1" role="dialog"
        aria-labelledby="banner-market" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <button type="button" class="close float-right text-right px-4 py-2"
                    data-dismiss="modal">&times;</button>
                <div class="modal-body">

                    <img src="{{ $databanner->url_web }}" class="mt-2" width="750px"
                        height="300px" alt="">
                </div>

                <h2 class="px-4">{{ $databanner->judul_banner }}</h2>
                <p class="px-4">{{ $databanner->deskripsi }}</p>
                <button class="btn-gabung" width="300px" onclick="window.location='{{ URL::route('class.index');}}'"> Cek Selengkapnya </button>
            </div>
        </div>
    </div>
@endforeach

    <!-- close-hero-dashboard -->


    <div id="hero-pelajaran" class="container ">
        <div class="row">
            <div class="col-lg-8 video">
                <div class="embed-responsive embed-responsive-16by9">
                    <video id='my-video' controls controlsList="nodownload" preload='auto' >
                        <source src='{{ $data->video[0]->url_video }}' type='video/mp4'>
                      </video>
                    {{-- <iframe src="{{ $data->video[0]->url_video }}#toolbar=0" 
                        gesture="media" allow="autoplay; encrypted-media" allowfullscreen></iframe> --}}
                </div>
            </div>
            <div class="col-lg-4 button-video">
                <div class="button-pelajaran">
                    @foreach ($data->word as $item => $word)
                        @php                          
                            $response = new \GuzzleHttp\Client();
                            $a = $response->request('GET', 'https://floating-harbor-93486.herokuapp.com/api/home/word?token=' . $word->kata_uuid, [
                                'headers' => [
                                    'Accept' => 'application/json',
                                    'user-uuid' => '9993367b6505470fa2d1fad8c3990754',
                                    'authorization' => 'Bearer ' . session()->get('bearer_token'),
                                ],
                            ]);
                            $responseApi = json_decode($a->getBody()->getContents());
                            $dataword = $responseApi->data;
                            
                        @endphp
                        <div class="list-button-video">
                            <button id="btn-voice{{ $word->kata_uuid }}" data-toggle="modal"
                                data-target="#voice-kata{{ $word->kata_uuid }}" class="btn-word">
                                <div class="row">
                                    <div class="col-lg-8 word-korea justify-content-center">
                                        <p>{{ $word->hangeul }}</p>
                                        <h1>({{ $word->pelafalan }})</h1>

                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            <div id="button-sound{{ ++$item }}"></div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </div>
                        
                    @endforeach
                </div>


            </div>
        </div>
    </div>
    </div>

    @foreach ($data->word as $item => $word)
    @php                          
        $response = new \GuzzleHttp\Client();
        $a = $response->request('GET', 'https://floating-harbor-93486.herokuapp.com/api/home/word?token=' . $word->kata_uuid, [
            'headers' => [
                'Accept' => 'application/json',
                'user-uuid' => '9993367b6505470fa2d1fad8c3990754',
                'authorization' => 'Bearer ' . session()->get('bearer_token'),
            ],
        ]);
        $responseApi = json_decode($a->getBody()->getContents());
        $dataword = $responseApi->data;
        
    @endphp    
    <div class="modal fade" id="voice-kata{{ $word->kata_uuid }}" tabindex="-1" role="dialog"
        aria-labelledby="voice-kata" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-title p-4">
                    <button href="#" class="btn-modal-word">
                        <div class="row">
                            <div class="col-lg-8 word-korea justify-content-center">
                                <p>{{ $dataword->hangeul }}</p>
                                <h1>({{ $dataword->pelafalan }})</h1>
                            </div>
                            <div class="col-lg-4">
                                @php
                                $no = 1;
                                $nom = 1;
                                @endphp
                                <div>
                                    <audio id="player-sound{{ ++$no }}">
                                        <source src="{{ $dataword->url_pengucapan }}"
                                            type="audio/mp3">
                                    </audio>
                                    <div id="button-sound{{ ++$nom }}"></div>
                                </div>
                            </div>
                        </div>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="pl-4">Penjelasan</h5>
                    <p class="p-4">{{ $dataword->penjelasan }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endforeach

    <div id="hero-kelas" class="container mt-3">
        <div class="tittle-kelas">
            <h3><a href="#"> Kelas Pilihan </a></h3>
            <p>Kelas terbaik yang direkomendasikan</p>
        </div>
        <div class="kelas-utama">
            <div class="pilihan-kelas">
                <div class="card-deck">
                  @foreach ($data->class as $item)
                    <button class="kelas">
                        <div class="row">
                            <div class="col-lg-6">
                                <img class="gambar-kelas mt-3" src="{{ $item->url_web }}" width="273px" height="158px">
                            </div>
                            <div class="col-lg-6 py-4 text-left">
                                <div class="nama-kelas">
                                    <h5>{{ $item->nama_kelas }}</h5>
                                </div>
                                <div class="nama-guru">
                                    <h5>{{ $item->nama_mentor ?? '-' }} <i class="fas fa-check-circle"></i></h5>
                                </div>
                                <div class="jumlah-materi mt-5">
                                    <h5>{{ $item->jml_materi }} Materi</h5>
                                </div>
                            </div>
                        </div>
                    </button>
                    @endforeach
                </div>
            </div>
            <div class="lainnya mt-3 mb-3" width="100%">
                <center><button type='button' onclick="window.location='{{ URL::route('class.index');}}'" class='btn btn-lainnya text-center py-2 my-1'> Lainnya </button>
                </center>
            </div>
        </div>
    </div>

    <div id="hero-kelas" class="container mt-3">
        <div class="tittle-kelas">
            <h3><a href="#"> Forum Populer </a></h3>
            <p>Berbagai topik seru untuk kamu baca</p>
        </div>
        <div class="kelas-utama">
            <div class="pilihan-kelas">
                <div class="card-deck">
                        @foreach ($data->theme as $index => $theme)
                        @if($index < 3)
                        <button class="topik-tag" href="#"
                            style="background-image: url({{ asset('assets/img/topik-tag.png)') }};">
                            <h3 class="text-white">{{$theme->topik}}</h3>
                        </button>
                        @else
                        @endif
                        @endforeach 
                </div>
            </div>

        </div>
    </div>

    <div id="hero-comment" class="container mt-3">
      @foreach ($populer->forum as $item)
          
      
         <div class="komentar">
            <div class="profil-comentar">
                <div class="row">
                    <div class="col-lg-1">
                        <img src="{{ asset('assets/img/profile-1.png') }}" alt="Profile">
                    </div>
                    <div class="col-lg-10">
                        <h5>{{$item->nama_pengirim}} 
                            @if ($account->status_member == 'Non-Member')
                            @else
                            <img src="{{ asset('assets/img/crown_user.png') }}" alt="Profile">
                            @endif</h5>
                        <h6>{{ date('d m Y - H.i', strtotime($item->tgl_post)) }}</h6>
                    </div>
                </div>
            </div>
            <h4>{{$item->tema}}</h4>
            <h6><a href="#">#LifeStyle</a></h6>
            <p>{{$item->deskripsi}}</p>
            <div class="pict-comentar">
                <div class="card-deck">
               
                <img class="rounded" src="{{$item->gambar->url_gambar ?? ''}}" width="150px"  alt="">
                </div>
            </div>
            <div class="like-comment">
                <div class="row">
                    <i class="far fa-heart"></i>
                    <h7>{{$item->jml_like}} Suka </h7>
                    <i class="far fa-comment-alt-dots"> </i>
                    <h7>{{$item->jml_komen}} Comments</h7>
                </div>
            </div>
         </div>
         @endforeach
    </div>
    <div class="lainnya mt-3 mb-3" width="100%">
        <center><button type='button' class='btn btn-lainnya text-center py-2 my-1'> Lainnya </button>
        </center>
    </div>
    @php
     $no = 1; $noa = 1;$nob = 1; $noc = 1;$nod = 1; $noe = 1;$nof = 1; $nog = 1;$noh = 1; $noi = 1;$noj = 1; $nok = 1;
    @endphp
    @foreach ($data->word as $item => $word)
    <script>
        $(document).ready(function () {
            var button{{ $no++ }} = document.getElementById("button-sound{{ $noa++ }}");
            var audio{{ $nob++ }} = document.getElementById("player-sound{{ $noc++ }}");
            button{{ $nok++ }}.addEventListener("click", function () {
                if (audio{{ $nod++ }}.paused) {
                    audio{{ $noe++ }}.play();
                    button{{ $nof++ }}.innerHTML = "<img src=\"Assets/img/IconPause.png\" width=\"40px\" height=\"40px\">";
                } else {
                    audio{{ $nog++ }}.pause();
                    button{{ $noh++ }}.innerHTML = "<img src=\"Assets/img/IconPlay.png\" width=\"40px\" height=\"40px\">";
                }
            });
        });
    </script>
    @endforeach
@endsection
@extends('layouts.dashboard')
@section('css')
    <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet" />
@endsection
@section('title') Kkuljaem Korean | Home
@endsection
@section('content')

    <!-- hero-dashboard -->
    <div id="hero-dashboard" class="container">
        <div class="row">
            <div class="slider">
                @foreach ($data->banner as $item)

                    <div class="">
                        <button type=" button" class="btn col-lg-12 mx-auto banner" id="btn-market{{ $item->banner_uuid }}"
                            data-toggle="modal" data-target="#banner-market{{ $item->banner_uuid }}">
                            <img src="{{ $item->url_web }}" height="auto" alt="" srcset="" /></button>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
    @foreach ($data->banner as $item)

        <div class="modal fade" id="banner-market{{ $item->banner_uuid }}" tabindex="-1" role="dialog"
            aria-labelledby="banner-market" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <button type="button" class="close float-right text-right px-4 py-2"
                        data-dismiss="modal">&times;</button>
                    <div class="modal-body">

                        <img src="{{ $item->url_web }}" class="mt-2" width="750px" height="300px" alt="">
                    </div>

                    <h2 class="px-4">{{ $item->judul_banner }}</h2>
                    <p class="px-4">{{ $item->deskripsi }}</p>
                    <button class="btn-gabung" width="300px"
                        onclick="window.location='{{ URL::route('class.index') }}'"> Cek
                        Selengkapnya </button>
                </div>
            </div>
        </div>
    @endforeach

    <!-- close-hero-dashboard -->


    <div id="hero-pelajaran" class="container ">
        <div class="row">
            <div class="col-lg-8 video">
                <div class="embed-responsive">
                    <video id="vid1" class="video-js vjs-default-skin" controls width="760px" height="400px"
                        data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{ $data->video[0]->url_video_mobile }}"}]}'>
                    </video>

                    {{-- <iframe src="{{ $data->video[0]->url_video }}" allowfullscreen allowtransparency allow="autoplay">
                        </iframe> --}}
                </div>
            </div>
            <div class="col-lg-4 button-video">
                <div class="button-pelajaran">
                    <div class="hangeul-scroll">
                        @foreach ($data->word as $item)
                            <div class="list-button-video">
                                <button id="btn-voice{{ $item->kata_uuid }}" data-toggle="modal"
                                    data-target="#voice-kata{{ $item->kata_uuid }}" class="btn-word">
                                    <div class="row">
                                        <div class="col-lg-8 word-korea justify-content-center">
                                            <p>{{ $item->hangeul }}</p>
                                            <h1>({{ $item->pelafalan }})</h1>

                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                <div id="button-sound1"></div>
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

    @foreach ($data->word as $item)
        <div class="modal fade" id="voice-kata{{ $item->kata_uuid }}" tabindex="-1" role="dialog"
            aria-labelledby="voice-kata" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-title p-4">
                        <button href="#" class="btn-modal-word">
                            <div class="row">
                                <div class="col-lg-8 word-korea justify-content-center">
                                    <p>{{ $item->hangeul }}</p>
                                    <h1>({{ $item->pelafalan }})</h1>
                                </div>
                                <div class="col-lg-4">
                                    <div>
                                        <audio id="player-sound{{ $item->kata_uuid }}">
                                            <source src="{{ $item->url_pengucapan }}" type="audio/mp3">
                                            <source src="{{ $item->url_pengucapan }}" type="audio/mp4">
                                        </audio>
                                        <div id="button-sound{{ $item->kata_uuid }}" class="mt-2">
                                            <img src="{{ asset('assets/img/IconPlay.png') }}" width='40px' height='40px'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="mb-3">Penjelasan</h5>
                        {!! $item->penjelasan !!}

                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div id="hero-kelas" class="container mt-3">
        <div class="tittle-kelas">
            <h3 class="font-weight-bold"><a href="{{ route('class.index') }}"> Kelas Pilihan </a></h3>
            <p>Kelas terbaik yang direkomendasikan</p>
        </div>
        <div class="kelas-utama">
            <div class="pilihan-kelas">
                <div class="card-deck">
                    @foreach ($data->class as $item)
                        <button class="kelas"
                            onclick="window.location='{{ URL::route('class.detail', $item->kelas_uuid) }}'">
                            <div class="row">
                                <div class="col-lg-4 ">
                                    <img class="gambar-kelas mx-auto" src="{{ $item->url_web }}" width="160px"
                                        height="160px">
                                </div>
                                <div class="col-lg-6 py-4 text-left deskripsi">
                                    <div class="nama-kelas ">
                                        <h5 class="font-weight-bold">{{ $item->nama_kelas }}</h5>
                                    </div>
                                    <div class="nama-guru">
                                        <h6>{{ $item->nama_mentor ?? '-' }} <i class="fas fa-check-circle"></i></h6>
                                    </div>
                                    <div class="jumlah-materi">
                                        <h6>{{ $item->jml_materi }} Materi</h6>
                                    </div>
                                </div>
                            </div>
                        </button>
                    @endforeach
                </div>
            </div>
            <div class="lainnya mt-3 mb-3" width="100%">
                <center><button type='button' onclick="window.location='{{ URL::route('class.index') }}'"
                        class='btn btn-lainnya text-center py-2 my-1'> Lainnya </button>
                </center>
            </div>
        </div>
    </div>

    <div id="hero-kelas" class="container mt-3">
        <div class="tittle-kelas">
            <h3><a href="#"> Diskusi Populer </a></h3>
            <p>Berbagai topik seru untuk kamu baca</p>
        </div>
        <div class="container">
            <div class="kelas-utama">
                <div class="pilihan-kelas">
                    <div class="card-deck">
                        @foreach ($data->theme as $index => $theme)
                            @if ($index == 0)
                                <a href="{{ route('forum.topik', $theme->topik_uuid) }}" class="topik-tag"
                                    style="background-image: url({{ asset('assets/img/tag-makanan.jpg)') }}; text-decoration: none">
                                    <h3 class="text-white">#{{ $theme->topik }}</h3>
                                </a>
                            @elseif ($index == 1)
                                <a href="{{ route('forum.topik', $theme->topik_uuid) }}" class="topik-tag"
                                    style="background-image: url({{ asset('assets/img/tag-artis.jpg)') }}; text-decoration: none">
                                    <h3 class="text-white">#{{ $theme->topik }}</h3>
                                </a>
                            @elseif ($index == 2)
                                <a href="{{ route('forum.topik', $theme->topik_uuid) }}" class="topik-tag"
                                    style="background-image: url({{ asset('assets/img/tag-aktor.jpg)') }}; text-decoration: none">
                                    <h3 class="text-white">#{{ $theme->topik }}</h3>
                                </a>
                            @elseif ($index > 2)
                                <div class="d-flex mt-4">
                                    <h5 class="text-hastag"><a
                                            href="{{ route('forum.topik', $theme->topik_uuid) }}">{{ $theme->topik }}</a>
                                    </h5>
                                </div>
                            @endif

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="hero-comment" class="container mt-3">
        @foreach ($data->post as $item)

            <div class="komentar" onclick="window.location='{{ URL::route('forum.detail', $item->post_uuid) }}'">
                <div class="profil-comentar">
                    <div class="row">
                        <div class="col-lg-1">
                            @if (@!isset($item->foto_pengirim))
                                <img class="rounded-circle" src="{{ asset('assets/img/profile-1.png') }}" alt="Profile">
                            @else
                                @if ($item->stat_pengirim == 'data complete' && $item->jenis_kelamin == 'L')
                                    <img class="rounded-circle" src="{{ asset('assets/img/non_member_l.png') }}"
                                        width="70px" height="70px" alt="Profile">
                                @elseif ($item->stat_pengirim == 'data complete' && $item->jenis_kelamin == 'P')
                                    <img class="rounded-circle" src="{{ asset('assets/img/non_member_p.png') }}"
                                        width="70px" height="70px" alt="Profile">
                                @elseif ($item->stat_pengirim == 'member data complete' && $item->jenis_kelamin == 'P')
                                    <img class="rounded-circle" src="{{ asset('assets/img/member_p.png') }}" width="70px"
                                        height="70px" alt="Profile">
                                @elseif ($item->stat_pengirim == 'member data complete' && $item->jenis_kelamin == 'L')
                                    <img class="rounded-circle" src="{{ asset('assets/img/member_l.png') }}" width="70px"
                                        height="70px" alt="Profile">
                                @elseif ($item->stat_pengirim == 'admin-mentor')
                                    <img class="rounded-circle" src="{{ $item->foto_pengirim }}" width="70px"
                                        height="70px" alt="Profile">
                                @else
                                    <img class="rounded-circle" src="{{ asset('assets/img/non_member_new.png') }}"
                                        width="70px" height="70px" alt="Profile">
                                @endif
                            @endif
                        </div>
                        <div class="col-lg-10">
                            <h5>{{ $item->nama_pengirim }}
                                @if ($item->stat_pengirim == 'admin-mentor')
                                    <i class="fas fa-check-circle"></i>
                                @elseif($item->stat_pengirim == 'member data complete')
                                <img src="{{ asset('assets/img/crown_user.png') }}" alt="Profile">
                                @else
                                    
                                @endif
                            </h5>
                            <h6>{{ date('d m Y - H.i', strtotime($item->tgl_post)) }}</h6>
                        </div>
                    </div>
                </div>
                <h6 class="mt-3" style="color: #ef9c23;">#{{ $item->tema }}</h6>
                <p>{{ $item->deskripsi }}</p>
                @if (@!isset($item->gambar))
                @else
                    <div class="pict-comentar">
                        <div class="card-deck">
                            @foreach ($item->gambar as $gambaritem)
                            <a class="fancybox-effects-d" href="{{ $gambaritem->url_gambar }}" title="Pict"> 
                                <img class="rounded ml-3" src="{{ $gambaritem->url_gambar }}" width="auto"
                                    height="120px" alt=""></a>
                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="d-flex mt-3 like-comment ">
                    @if ($item->user_like == 'True')
                    <a href="{{ route('forum.unlike_post', $item->post_uuid) }}" style="text-decoration: none" class="btn">
                        <i class="fas fa-heart active" style="color: red"></i>
                    </a>
                    @elseif($item->user_like=='False')
                    <a href="{{ route('forum.like_post', $item->post_uuid) }}" style="text-decoration: none" class="btn">
                        <i class="far fa-heart"></i>
                    </a>
                    @endif
                    <p class="ml-1 mr-4 mt-2 ">{{ $item->jml_like }} Suka</p>
    
                    <a href="{{ route('forum.detail', $item->post_uuid) }}" style="text-decoration: none" class="btn">
                        <div class="d-flex">
                            <i class="far fa-comment-alt fa-flip-horizontal mt-1 mr-2"></i>
                            <p class="ml-2">{{ $item->jml_komen }} Comments</p>
                        </div>
                    </a>
    
    
                </div>
            </div>
        @endforeach
    </div>
    <div class="lainnya mt-3 mb-3" width="100%">
        <center><button type='button' onclick="window.location='{{ URL::route('forum.index') }}'"
                class='btn btn-lainnya text-center py-2 my-1'> Lainnya </button>
        </center>
    </div>

@endsection
@section('page-js')
    @foreach ($data->word as $item)
        <script>
            $(document).ready(function() {
                let button{{ $item->kata_uuid }} = document.getElementById("button-sound{{ $item->kata_uuid }}");

                let audio{{ $item->kata_uuid }} = document.getElementById("player-sound{{ $item->kata_uuid }}");

                button{{ $item->kata_uuid }}.addEventListener("click", function() {
                    if (audio{{ $item->kata_uuid }}.paused) {
                        audio{{ $item->kata_uuid }}.play();
                        button{{ $item->kata_uuid }}.innerHTML =
                            "<img src='assets/img/IconPause.png' width='40px' height='40px'>";
                    } else {
                        audio{{ $item->kata_uuid }}.pause();
                        button{{ $item->kata_uuid }}.innerHTML =
                            "<img src='assets/img/IconPlay.png' width='40px' height='40px'>";
                    }
                });

                audio{{ $item->kata_uuid }}.onended = function() {
                    button{{ $item->kata_uuid }}.innerHTML =
                        "<img src='assets/img/IconPlay.png' width='40px' height='40px'>";
                };
            });
        </script>
    @endforeach
@endsection


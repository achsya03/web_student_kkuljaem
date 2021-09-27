@extends('layouts.dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/detail-video.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
@endsection

@section('title')
    {{ env('APP_NAME') }} | Detail Video 
@endsection

@section('content')
<div class="container">
    <h4 class="font-weight-bold my-4">{{ $class->judul }}</h4>
    <div class="tab-pane fade  show" id="lain-lain" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="container">
            <!-- Detail Video -->
            <div class="row detail-video px-0">
                <!-- Content Kiri -->
                <div class="col-8 pl-0 left">
                    <div class="tab-content" id="nav-tabContent">
                        <!-- List Nilai Kami -->
                        <div class="tab-pane fade show active">
                            <div class="embed-responsive embed-responsive-16by9">
                                <video id='my-video' controls controlsList="nodownload" preload='auto'>
                                    <source src="{{ $class->url_video }}" type='video/mp4'>
                                </video>
                                {{-- <iframe class="embed-responsive-item" src="{{ $class->url_video }}" allowfullscreen></iframe> --}}
                            </div>
                        </div>                        
                    </div>
                </div>
                <!-- End Content Kiri -->
                <!-- Menu Kanan -->
                <div class="col-4 right">
                    <h4 class="font-weight-bold mb-1">Daftar Materi</h4>
                    <p>20 video pembelajaran & 8 kuis</p>
                    <div class="list-group font-weight-bold menu-detail-video" id="list-tab" role="tablist">
                        @foreach ($class->content as $item)
                        @if ($item->type=='video')
                        <a class="list-group-item-action" id="list-messages-list"  href="{{route('class.video',$item->content_video_uuid)}}">
                            @else
                            <a class="list-group-item-action" id="list-messages-list"  href="{{route('class.video',$item->content_quiz_uuid)}}">
                            @endif 
                            <div class="d-flex list-video">
                                <button class="rounded-circle mt-2  mt-2 play-pause">
                                    @if ($item->type=='video')
                                    <i class="fas fa-play"></i>
                                    @else
                                    <i class="fa fa-lightbulb"></i>
                                    @endif 
                                </button>
                                <div class="d-flex ml-3 flex-column">
                                    <h6 class="font-weight-bold">{{ $item->judul }}</h6>
                                    @if ($item->type=='video')
                                    <p>{{ $item->jml_latihan }} Latihan {{ $item->jml_shadowing }} Shadowing</p>
                                    @else
                                    <p>{{ $item->jml_soal }} Soal</p>
                                    @endif 
                                </div>
                            </div>
                        </a>    
                        @endforeach                     
                    </div>
                </div>
                <!-- End Menu Kanan -->
                <button type="button" class="btn btn-done">Saya telah Menontonnya</button>
            </div>
            <!-- End Detail Video -->
        </div>
    </div>
</div>

<!-- Top Menu -->
<div class="container mt-5">
    <!-- tab-menu -->
    <ul class="nav top-menu mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link mr-4 ml-2 active" id="pills-home-tab" data-toggle="pill" href="#detailvideo" role="tab" aria-controls="pills-home" aria-selected="true">
                <h3 class="top-menu font-weight-bold active">Detail</h3>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link mr-4" id="pills-profile-tab" data-toggle="pill" href="#qna" role="tab" aria-controls="pills-profile" aria-selected="false">
                <h3 class="top-menu font-weight-bold">QnA</h3>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#more" role="tab" aria-controls="pills-profile" aria-selected="false">
                <h3 class="top-menu font-weight-bold">More</h3>
            </a>
        </li>
    </ul>
    <!-- end tab menu -->

    <!-- tab content -->
    <div class="tab-content" id="pills-tabContent">
        <!-- .content-detail video -->
        <div class="tab-pane fade show active" id="detailvideo" role="tabpanel" aria-labelledby="pills-home-tab">
            <h4 class="font-weight-bold my-4">Penjelasan</h4>
            <p class="text-justify">{{ $class->keterangan }}</p>
        </div>

        <!-- end content detail video -->

        <!-- content qna -->
        <div class="tab-pane fade show " id="qna" role="tabpanel" aria-labelledby="pills-profile-tab">
            <!-- Form Qna -->

            <div class="form-pengisian mt-4 p-4">
                <h4 class="font-weight-bold mb-3">Ajukan Pertanyaan</h4>
                <form action="" method="">
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Judul">
                    </div>

                    <div class="form-group">
                        <textarea class="form-control mb-2" id="text-area-postingan" rows="5" placeholder="Apa yang ingin kamu tulis?"></textarea>
                        <small>0/200 kata</small>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-posting mt-auto">Posting</button>
                    </div>
                </form>
            </div>

            @foreach ($qna as $tanya)
            <div class="comment-qna p-4 ">
                <!-- profile and hamburger -->
                <div class="d-flex justify-content-between mb-1 ">
                    <!-- profile -->
                    <div class="profile-qna">
                        <img src="{{ asset('assets/img/avatar.png') }}" alt="Avatar " class="float-left mr-3 ">
                        <div class="d-flex flex-column mt-2 ">
                            <h6>{{ $tanya->nama_pengirim }} <img src="{{ asset('assets/img/crown.png') }}" alt="crown "></h6>
                            <p>{{ date('d m Y - H.i', strtotime($tanya->tgl_post)) }}</p>
                        </div>
                    </div>
                    <!-- end profile -->

                    <!-- hamburger dot -->
                    <div class="hamburger-dot ">
                        <button class="btn">
                            <img src="{{ asset('assets/img/3dot.png') }}" alt="">
                        </button>
                    </div>
                    <!-- end hamburger dot -->
                </div>
                <!-- end profile and hamburger -->

                <h5>{{ $tanya->judul }}</h5>
                <div class="d-flex">
                    <h6>di </h6>
                    <a href="{{route('class.video', $tanya->video_uuid)}}" style="text-decoration: none; color: black">
                    <h6 class="text-tag ml-1"> {{ $tanya->video_judul }}</h6>
                    </a>
                </div>
                <!-- like and comment -->
                <div class="d-flex mt-3 like-comment ">
                    <button type="button " class="btn">
                        <i class="fas fa-heart active"></i>
                    </button>
                    <p class="mr-4 my-auto ">{{ $tanya->jml_like }} Suka</p>
                    <button type="button " class="btn">
                        <i class="far fa-comment-alt-dots fa-flip-horizontal"></i>
                    </button>

                    <p class="my-auto ">{{ $tanya->jml_komen }} Comments</p>
                </div>
                <!-- end like and comment -->
            </div>
            @endforeach

            <!-- End Form Qna -->
        </div>
        <!-- end content qna  -->

        <!-- content  -->
        <div class="tab-pane fade show " id="more" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="more d-flex flex-column">
                <button type="button" class="btn btn-more mb-2"><i class="far fa-file-alt"></i> Latihan</button>
                <button type="button" class="btn btn-more"><i class="far fa-microphone"></i> Shadowing</button>
            </div>
        </div>
        <!-- end content qna  -->

    </div>
    <!-- end tab content -->
</div>
<!-- End Top Menu -->

@endsection

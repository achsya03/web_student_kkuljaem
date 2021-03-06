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
                                <div style="background:transparent;opacity:0.5;height:370px;width:730px;position:relative;display: block;z-index: 5;">
                                </div>
                                <div class="embed-responsive">
                                    <video id="vid1" class="video-js vjs-default-skin" controls width="730px" height="400px"
                                        data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{ $class->url_video_mobile }}"}]}'>
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
                            @if ($account->status_member == 'Non-Member')
                                @foreach ($class->content as $index => $item)
                                    @if ($index < 3)
                                        @if ($item->type == 'video')
                                            <a class="list-group-item-action my-2" id="list-messages-list" href="#">
                                            @else
                                                <a class="list-group-item-action my-2" id="list-messages-list" href="#">
                                        @endif
                                        <div class="d-flex list-video align-items-center">
                                            <button class="mr-2 border-0 bg-transparent">
                                                @if ($item->type == 'video')
                                                    <i class="  fas fa-play-circle"></i>
                                                @else
                                                    <i class="rounded-circle play-pause fa fa-lightbulb"></i>
                                                @endif
                                            </button>
                                            <div class="d-flex ml-3 flex-column">
                                                <h6 class="font-weight-bold">{{ $item->judul }}</h6>
                                                @if ($item->type == 'video')
                                                    <p class="info-jumlah pb-0 mb-0">{{ $item->jml_latihan }} Latihan
                                                        {{ $item->jml_shadowing }}
                                                        Shadowing</p>
                                                @else
                                                    <p class="info-jumlah pb-0 mb-0">{{ $item->jml_soal }} Soal</p>
                                                @endif
                                            </div>
                                        </div>
                                        </a>
                                    @elseif ($index == 4)
                                        <a class="list-group-item-action bg-warning" id="list-messages-list" href="#">
                                            <div class="d-flex list-video justify-content-center">
                                                <div class="d-flex align-items-center ">
                                                    <i class="fas fa-lock mr-3"></i>
                                                    <h6 class="font-weight-bold mt-2">Lainnya
                                                    </h6>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            @else
                                @foreach ($class->content as $item)
                                    @if ($item->type == 'video')
                                        <a class="list-group-item-action my-2" id="list-messages-list"
                                            href="{{ route('class.video', $item->content_video_uuid) }}">
                                        @else
                                            <a class="list-group-item-action my-2" id="list-messages-list"
                                                href="{{ route('class.quiz-intro', [urlencode($item->judul), $item->content_quiz_uuid]) }}">
                                    @endif
                                    <div class="d-flex list-video">
                                        <button class="mr-2 border-0 bg-transparent">
                                            @if ($item->type == 'video')
                                                <i class="  fas fa-play-circle"></i>
                                            @else
                                                <i class="rounded-circle play-pause fa fa-lightbulb"></i>
                                            @endif
                                        </button>
                                        <div class="d-flex ml-3 flex-column">
                                            <h6 class="font-weight-bold">{{ $item->judul }}
                                                @if ($item->stat_pengerjaan == 'Selesai')
                                                    <i class="fas fa-check-circle"></i>
                                                @else
                                                @endif
                                            </h6>

                                            @if ($item->type == 'video')
                                                <p class="info-jumlah pb-0 mb-0">{{ $item->jml_latihan }} Latihan
                                                    {{ $item->jml_shadowing }}
                                                    Shadowing</p>
                                            @else
                                                <p class="info-jumlah pb-0 mb-0">{{ $item->jml_soal }} Soal</p>
                                            @endif
                                        </div>
                                    </div>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- End Menu Kanan -->
                    @foreach ($class->content as $item)
                        @if ($item->content_video_uuid ?? '' == $class->video_uuid && $item->stat_pengerjaan == 'Belum')
                            <button type="button"
                                onclick="window.location='{{ URL::route('class.finish_video', $class->video_uuid) }}'"
                                class="btn btn-done my-3">Saya telah Menontonnya</button>
                        @break
                    @else

                    @endif
                    @endforeach


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
                <a class="nav-link mr-4 ml-2 active" id="pills-home-tab" data-toggle="pill" href="#detailvideo" role="tab"
                    aria-controls="pills-home" aria-selected="true">
                    <h3 class="top-menu font-weight-bold active">Detail</h3>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link mr-4" id="pills-profile-tab" data-toggle="pill" href="#qna" role="tab"
                    aria-controls="pills-profile" aria-selected="false">
                    <h3 class="top-menu font-weight-bold">QnA</h3>
                </a>
            </li>
            @if ($account->status_member == 'Non-Member')
            @else
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#more" role="tab"
                        aria-controls="pills-profile" aria-selected="false">
                        <h3 class="top-menu font-weight-bold">Lainnya</h3>
                    </a>
                </li>
            @endif

        </ul>
        <!-- end tab menu -->

        <!-- tab content -->
        <div class="tab-content" id="pills-tabContent">
            <!-- .content-detail video -->
            <div class="tab-pane fade show active" id="detailvideo" role="tabpanel" aria-labelledby="pills-home-tab">
                <h4 class="font-weight-bold my-4">Informasi</h4>
                <p class="text-justify">Silahkan download materi video <a target="_blank"
                        href="{{ $class->keterangan }}">disini</a></p>
            </div>

            <!-- end content detail video -->

            <!-- content qna -->

            <div class="tab-pane fade show " id="qna" role="tabpanel" aria-labelledby="pills-profile-tab">
                <!-- Form Qna -->
                @if ($account->status_member == 'Non-Member')
                @else
                    <div class="form-pengisian mt-4 p-4 mb-3">
                        <h4 class="font-weight-bold mb-3">Ajukan Pertanyaan</h4>
                        <form action="{{ route('class.qnaVideo.process') }}" method="POST">
                            @csrf
                            <input type="hidden" name="video_uuid" value="{{ $class->video_uuid }}">
                            <div class="form-group">
                                <input type="text" class="form-control" required id="" placeholder="Judul" name="judul">
                            </div>

                            <div class="form-group">
                                <textarea class="form-control mb-2" required id="text-area-postingan" rows="5"
                                    placeholder="Apa yang ingin kamu tulis?" name="deskripsi"></textarea>
                                <small id="chars"></small><small> huruf</small>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-posting mt-auto">Posting</button>
                            </div>
                        </form>
                    </div>
                @endif

                @forelse ($qna as $item)
                    <div class="box {{ $item->video_uuid }}">
                        <div class="container mb-2 ">
                            <div class="comment-qna p-4 ">
                                <!-- profile and hamburger -->
                                <div class="d-flex justify-content-between mb-1 ">
                                    <!-- profile -->
                                    <div class="profile-qna">
                                        <img src="
                                   @if ($item->stat_pengirim == 'member data complete' &&
                                        $item->jenis_kelamin == 'L')
                                        {{ asset('assets/img/member_l.png') }}
                                    @elseif($item->stat_pengirim=='member data complete' && $item->jenis_kelamin=='P')
                                        {{ asset('assets/img/member_p.png') }}
                                    @elseif($item->stat_pengirim=='data complete' && $item->jenis_kelamin=='L')
                                        {{ asset('assets/img/non_member_l.png') }}
                                    @elseif($item->stat_pengirim=='data complete' && $item->jenis_kelamin=='P')
                                        {{ asset('assets/img/non_member_p.png') }}
                                    @elseif($item->stat_pengirim=='new user')
                                        {{ asset('assets/img/non_member_new.png') }}
                                    @else
                                        {{ asset('assets/img/avatar.png') }}
                                    @endif
                                    " alt="Avatar "
                                    class="float-left mr-3 rounded-circle  img-detail-comment" width="80px" height="80px">
                <div class="d-flex flex-column mt-2 ">
                    <h6> {{ $item->nama_pengirim }}
                        @if ($item->stat_pengirim == 'admin-mentor')
                            <i class="fas fa-check-circle"></i>
                        @elseif($item->stat_pengirim == 'member data complete')
                            <img src="{{ asset('assets/img/crown_user.png') }}" alt="Profile">
                        @else

                        @endif
                    </h6>
                    <p>{{ date('d.m.Y - H.i A', strtotime($item->tgl_post)) }}</p>
                </div>
            </div>
            <!-- end profile -->

            <!-- hamburger dot -->
            < <div class="dropdown show hamburger-dot ">
                <a class="btn dropdown" href="#" id="deletedropdowm" role="button" data-toggle="dropdown">
                    <img src="{{ asset('assets/img/3dot.png') }}" alt="">
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="delete">

                    @if ($item->nama_pengirim == $account->nama)
                        <a class="dropdown-item d-flex text-center" href="{{ route('class.delete', $item->post_uuid) }}">
                            <h6 class="mx-auto my-auto">Delete</h6>
                        </a>
                    @else
                        <form action="{{ route('class.alert_post') }}" method="POST">
                            @csrf
                            <input type="hidden" name="komentar" value="{{ $item->deskripsi }}">
                            <input type="hidden" name="id" value="{{ $item->post_uuid }}">

                            <button type="submit" class="dropdown-item d-flex text-center">
                                <h6 class="mx-auto my-auto">Laporkan</h6>
                            </button>
                        </form>
                    @endif
                </div>

        </div>

        <!-- end hamburger dot -->
    </div>
    <!-- end profile and hamburger -->

    <h5 class="mt-3">{{ $item->deskripsi }}</h5>
    <div class="d-flex">
        <h6 class="text-tag ml-1"> {{ $item->video_judul }}</h6>

    </div>
    <!-- like and comment -->
    <div class="d-flex mt-3 like-comment ">

        @if ($item->user_like == 'True')
            <a href="{{ route('class.unlike_post', $item->post_uuid) }}" style="text-decoration: none"
                class="btn">
                <i class="fas fa-heart active"></i>
            </a>
        @elseif($item->user_like=='False')
            <a href="{{ route('class.like_post', $item->post_uuid) }}" style="text-decoration: none"
                class="btn">
                <i class="far fa-heart"></i>
            </a>
        @endif


        <p class="mr-4 my-auto ">{{ $item->jml_like }} Suka</p>
        <button type="button " class="btn">
            <i class="far fa-comment-alt-dots fa-flip-horizontal mr-2 my-auto "></i>
        </button>

        <a class="d-flex" href="{{ route('class.detail_qna', $item->post_uuid) }}" style="text-decoration: none">
            <p class="my-auto ">{{ $item->jml_komen }} Comments</p>
        </a>
    </div>
    <!-- end like and comment -->
    </div>
    </div>
    </div>

@empty
    <div id="hero-comment" class="container mt-3">
        <div class="pict-kosong">
            <center><img src="{{ asset('assets/img/NoItem.png') }}" align=" " alt="" srcset="">
            </center>
        </div>
    </div>
    @endforelse <!-- End Form Qna -->
    </div>
    <!-- end content qna  -->
    <!-- content  -->
    @if ($account->status_member == 'Non-Member')
    @else
        <div class="tab-pane fade show " id="more" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="more d-flex flex-column">
                <button type="button" class="btn btn-more mb-2"
                    onclick="window.location='{{ URL::route('class.latihan-intro', $class->video_uuid) }}'"><i
                        class="far fa-file-alt"></i> Latihan</button>
                <button type="button" class="btn btn-more"
                    onclick="window.location='{{ URL::route('class.shadowing', $class->video_uuid) }}'"><i
                        class="far fa-microphone"></i> Shadowing</button>
            </div>
        </div>
    @endif
    </div>
    <!-- end content qna  -->

    </div>
    <!-- end tab content -->
    </div>
    <!-- End Top Menu -->
@endsection
@section('page-js')
    <script>
        $(document).ready(function() {
            $('#like').click(function() {
                $(this).toggleClass('fas active')
            })
        })
    </script>
    <script>
        // Text Counter

        (function($) {
            $.fn.extend({
                limiter: function(limit, elem) {
                    $(this).on("keyup focus", function() {
                        setCount(this, elem);
                    });

                    function setCount(src, elem) {
                        var chars = src.value.length;
                        if (chars > limit) {
                            src.value = src.value.substr(0, limit);
                            chars = limit;
                        }
                        elem.html(limit - chars);
                    }
                    setCount($(this)[0], elem);
                }
            });
        })(jQuery);

        var elem = $("#chars");
        $("#text-area-postingan").limiter(200, elem);
    </script>
@endsection

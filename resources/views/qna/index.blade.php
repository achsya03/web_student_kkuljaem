@extends('layouts.dashboard')

@section('css')
    <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/qna.css') }}" rel="stylesheet" />
@endsection

@section('title')
    {{ env('APP_NAME') }} | Qna
@endsection

@section('content')

    <div class="container mt-5">
        <ul class="nav top-menu mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link mr-4 ml-2 active" id="pills-jelajah-tab" data-toggle="pill" href="#jelajahi" role="tab">
                    <h3 class="top-menu font-weight-bold active">Jelajahi</h3>
                </a>
            </li>
            @php
                use Illuminate\Support\Facades\Auth;
                
            @endphp
            @if (Auth::guest())
                <li class="nav-item">
                    <a class="nav-link mr-4" id="pills-qna-tab" data-toggle="pill" href="#qna-saya" role="tab">
                        <h3 class="top-menu font-weight-bold">QnA Saya</h3>
                    </a>
                </li>
            @else
            @endif
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <!-- .content-jelajahi -->
            <div class="tab-pane fade show active" id="jelajahi" role="tabpanel">
                @if ($account->status_member == 'Non-Member')
                    <div id="hero-promo">
                        <div class="row">
                            <div class="col-lg-12 mx-auto">
                                <img src="{{asset('Assets/img/Bannerpromo.png') }}" height="200px" width="100%" alt="" srcset="">
                            </div>
                        </div>
                    </div>
                @else

                @endif

                <!-- Pilih Kelas -->
                <div class="container">
                    <div class="row pilih-kelas">
                        <div class="col-4 p-0">
                            <div class="left">
                                <div class="form-group px-3 pt-3 pb-2 ">
                                    <label for="list-kelas">Level</label>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="dropdown list-list">
                                            <a class="dropdown-toggle form-control px-3 d-flex justify-content-between align-items-center "
                                                data-toggle="dropdown" id="list-kelas">--
                                                Pilih Level -- <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                @php
                                                    $tab = 1;
                                                    $taba = 1;
                                                @endphp
                                                @foreach ($qnaFilter as $index => $item)
                                                    <li>
                                                        <a class="d-inline-block w-100" href="#tab{{ $tab++ }}"
                                                            role="tab" data-toggle="tab">{{ $item->category_nama }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                                <div class="materi-scroll">
                                    <div class="tab-content">
                                        @php
                                            $tabisi = 1;
                                            $videolist = 1;
                                            $videolistid = 1;
                                        @endphp
                                        @foreach ($qnaFilter as $index => $item)

                                            <div class="tab-pane " id="tab{{ $tabisi++ }}">
                                                @foreach ($item->classes as $itemclass)

                                                    <h5 class="font-weight-bold ml-3">{{ $itemclass->class_nama }}</h5>
                                                    <a class=" list-group-item-action" role="tab" aria-controls="home">
                                                        <div class="d-flex flex-column py-2 px-3">
                                                            @foreach ($itemclass->videos as $classvideo)
                                                                <div class="listmateri my-2 px-2 rounded">
                                                                    <div id="myBtnContainer ">
                                                                        <button
                                                                            class="btn btn-filter d-flex align-items-center"
                                                                            id="{{ $classvideo->video_uuid }}">
                                                                            <i
                                                                                class="d-flex flex-column justify-content-center fas fa-play-circle fa-2x mr-3 "></i>
                                                                            <h6 class="d-flex text-left">
                                                                                {{ $classvideo->video_judul }}</h6>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </a>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 p-0">
                            <div class="container right">
                                <div id="parent">
                                    @forelse ($qna as $item)
                                        <div class="box {{ $item->video_uuid }}">
                                            <div class="container mb-2 ">
                                                <div class="comment-qna p-4 ">
                                                    <!-- profile and hamburger -->
                                                    <div class="d-flex justify-content-between mb-1 ">
                                                        <!-- profile -->
                                                        <div class="profile-qna">                                                           
                                                            <img src="
                                                            @if ($item->stat_pengirim=='member data complete' && $item->jenis_kelamin=='L')
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
                                                                class="float-left mr-3 rounded-circle">
                                                            <div class="d-flex flex-column mt-2 ">
                                                                <h6> {{ $item->nama_pengirim }} <img
                                                                        src="{{ asset('assets/img/crown.png') }} " alt="crown "></h6>
                                                                <p>{{ $item->tgl_post }}</p>
                                                            </div>
                                                        </div>
                                                        <!-- end profile -->

                                                        <!-- hamburger dot -->
                                                        < <div class="dropdown show hamburger-dot ">
                                                            <a class="btn dropdown" href="#" id="deletedropdowm"
                                                                role="button" data-toggle="dropdown">
                                                                <img src="{{ asset('assets/img/3dot.png') }}" alt="">
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right"
                                                                aria-labelledby="delete">

                                                                @if ($item->nama_pengirim == $account->nama)
                                                                    <a class="dropdown-item d-flex text-center"
                                                                        href="{{ route('qna.delete', $item->post_uuid) }}">
                                                                        <h6 class="mx-auto my-auto">Delete</h6>
                                                                    </a>
                                                                @else
                                                                    <form action="{{ route('qna.alert_post') }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="komentar"
                                                                            value="{{ $item->deskripsi }}">
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $item->post_uuid }}">

                                                                        <button type="submit"
                                                                            class="dropdown-item d-flex text-center">
                                                                            <h6 class="mx-auto my-auto">Laporkan</h6>
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                            </div>

                                                    </div>

                                                    <!-- end hamburger dot -->
                                                </div>
                                                <!-- end profile and hamburger -->

                                                <h5>{{ $item->deskripsi }}</h5>
                                                <div class="d-flex">
                                                    <h6 class="text-tag ml-1"> {{ $item->video_judul }}</h6>

                                                </div>
                                                <!-- like and comment -->
                                                <div class="d-flex mt-3 like-comment ">

                                                    @if ($item->user_like == 'True')
                                                        <a href="{{ route('qna.unlike_post', $item->post_uuid) }}"
                                                            style="text-decoration: none" class="btn">
                                                            <i class="fas fa-heart active"></i>
                                                        </a>
                                                    @elseif($item->user_like=='False')
                                                        <a href="{{ route('qna.like_post', $item->post_uuid) }}"
                                                            style="text-decoration: none" class="btn">
                                                            <i class="far fa-heart"></i>
                                                        </a>
                                                    @endif


                                                    <p class="mr-4 my-auto ">{{ $item->jml_like }} Suka</p>
                                                    <button type="button " class="btn">
                                                        <i
                                                            class="far fa-comment-alt-dots fa-flip-horizontal mr-2 my-auto "></i>
                                                    </button>

                                                    <a href="{{ route('qna.detail', $item->post_uuid) }}"
                                                        style="text-decoration: none">
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
                                @endforelse
                            </div>
                        </div>

                        {{-- <!-- pagination -->
                            <nav aria-label="Page navigation example pt-5">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item"><a class="page-link page-prev-next" href="#">Prev</a></li>
                                    <li class="page-item"><a class="page-link page-number" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link page-number" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link page-number" href="#">11</a></li>
                                    <li class="page-item"><a class="page-link page-number active" href="#">12</a></li>
                                    <li class="page-item"><a class="page-link page-number" href="#">13</a></li>
                                    <li class="page-item"><a class="page-link page-number" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link page-number" href="#">15</a></li>
                                    <li class="page-item"><a class="page-link page-prev-next" href="#">Next</a></li>
                                </ul>
                            </nav>
                            <!-- End Pagination --> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="qna-saya" role="tabpanel" aria-labelledby="pills-profile-tab">
            <!-- Title QnA -->
            <div class="container my-4">
                <h4 class="font-weight-bold">Pertanyaan Saya ({{count($user)}})</h4>
            </div>
            <!-- End Title QnA -->
            @if ($account->status_member == 'Non-Member')
                <div id="hero-promo" class="container">
                    <div class="row">
                        <div class="col-lg-12 mx-auto">
                            <img src="{{ asset('assets/img/Bannerpromo.png') }}" width="100%" height="200px" alt=""
                                srcset="">
                        </div>
                    </div>
                </div>
            @else

            @endif

            <!-- Comment QnA -->
            @foreach ($user as $index => $forum)
            
                <div class="container mb-2">
                    <div class="comment-qna p-4 ">
                        <div class="d-flex justify-content-between mb-1 ">
                            <div class="profile-qna">
                                <img src="
                                @if ($item->stat_pengirim=='member data complete' && $item->jenis_kelamin=='L')
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
                                    class="float-left mr-3 rounded-circle">
                                <div class="d-flex flex-column mt-2 ">
                                    <h6>{{ $forum->nama_pengirim }}<img src="{{ asset('assets/img/crown.png') }}"
                                            alt="crown "></h6>
                                    <p>{{ date('d m Y - H.i', strtotime($forum->tgl_post)) }}</p>

                                </div>
                            </div>

                            <!-- hamburger dot -->
                            <div class="dropdown show hamburger-dot ">
                                <a class="btn dropdown" href="#" id="deletedropdowm" role="button" data-toggle="dropdown">
                                    <img src="{{ asset('assets/img/3dot.png') }}" alt="">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="delete">
                                    @if ($forum->nama_pengirim == $account->nama)
                                        <a class="dropdown-item d-flex text-center"
                                            href="{{ route('qna.delete', $forum->post_uuid) }}">
                                            <h6 class="mx-auto my-auto">Delete</h6>
                                        </a>
                                    @else
                                        <form action="{{ route('qna.alert_post') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="komentar" value="{{ $forum->deskripsi }}">
                                            <input type="hidden" name="id" value="{{ $forum->post_uuid }}">

                                            <button type="submit" class="dropdown-item d-flex text-center">
                                                <h6 class="mx-auto my-auto">Laporkan</h6>
                                            </button>
                                        </form>
                                    @endif
                                </div>

                            </div>
                            <!-- end hamburger dot -->
                        </div>
                        <h5>{{ $forum->deskripsi }}</h5>
                        <div class="d-flex">
                            <h6 class="text-tag ml-1"> {{ $forum->video_judul }}</h6>

                        </div>
                        <p>{{ $forum->deskripsi }}
                        </p>
                        <div class="d-flex mt-3 like-comment ">

                            @if ($forum->user_like == 'True')
                                <a href="{{ route('qna.unlike_post', $forum->post_uuid) }}"
                                    style="text-decoration: none" class="btn">
                                    <i class="fas fa-heart active"></i>
                                </a>
                            @elseif($forum->user_like=='False')
                                <a href="{{ route('qna.like_post', $forum->post_uuid) }}"
                                    style="text-decoration: none" class="btn">
                                    <i class="far fa-heart"></i>
                                </a>
                            @endif


                            <p class="mr-4 my-auto ">{{ $forum->jml_like }} Suka</p>
                            <button type="button " class="btn">
                                <i
                                    class="far fa-comment-alt-dots fa-flip-horizontal mr-2 my-auto "></i>
                            </button>

                            <a href="{{ route('qna.detail', $forum->post_uuid) }}"
                                style="text-decoration: none">
                                <p class="my-auto ">{{ $forum->jml_komen }} Comments</p>
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
        <!-- end content qna saya -->
    </div>
    </div>
    </div>
@endsection

@section('page-js')
    <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous">
    </script>
    <script>
        var $btns = $('.btn-filter').click(function() {
            if (this.id == 'all') {
                $('#parent > div').fadeIn(450);
            } else {
                var $el = $('.' + this.id).fadeIn(450);
                $('#parent > div').not($el).hide();
            }
            $btns.removeClass('active');
            $(this).addClass('active');
        })
    </script>

    {{-- <script>
        $('#demo').pagination({
            dataSource: [1, 2, 3, 4, 5, 6, 7, ..., 195],
            callback: function(data, pagination) {
                // template method of yourself
                var html = template(data);
                dataContainer.html(html);
            }
        })
    </script> --}}
@endsection

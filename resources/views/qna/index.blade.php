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
                <a class="nav-link mr-4 ml-2 active" id="pills-jelajah-tab" data-toggle="pill" href="#jelajahi" role="tab" aria-controls="pills-jelajah" aria-selected="true">
                    <h3 class="top-menu font-weight-bold active">Jelajahi</h3>
                </a>
            </li>
            @php
            use Illuminate\Support\Facades\Auth;

            @endphp
            @if (Auth::guest())
            <li class="nav-item">
                <a class="nav-link mr-4" id="pills-qna-tab" data-toggle="pill" href="#qna-saya" role="tab" aria-controls="pills-qna" aria-selected="false">
                    <h3 class="top-menu font-weight-bold">QnA Saya</h3>
                </a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{route('login.index')}}" aria-selected="false">
                    <h3>Histori</h3>
                </a>
            </li>
            @endif
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <!-- .content-jelajahi -->
            <div class="tab-pane fade show active" id="jelajahi" role="tabpanel" aria-labelledby="pills-jelajah-tab">
                <!-- Title QnA -->
                <div class="container my-4">
                    <h4 class="font-weight-bold">QnA Terpopuler</h4>
                    <p class="">Pertanyaan dari banyak pengguna</p>
                </div>
                <!-- End Title QnA -->

                @if (Auth::guest())
                @else
                <div id="hero-promo" class="container">
                    <div class="row">
                        <div class="col-lg-12 mx-auto banner">
                            <img src="Assets/img/Bannerpromo.png" height="200px" alt="" srcset="">
                        </div>
                    </div>
                </div>
                @endif
                @forelse ($qna as $item)
                <div class="container mb-2">
                    <div class="comment-qna p-4 ">
                        <!-- profile and hamburger -->
                        <div class="d-flex justify-content-between mb-1 ">
                            <!-- profile -->
                            <div class="profile-qna">
                                <img src="../Assets/img/avatar.png " alt="Avatar " class="float-left mr-3 ">
                                <div class="d-flex flex-column mt-2 ">
                                    <h6> {{ $item->nama_pengirim }} <img src="../Assets/img/crown.png " alt="crown "></h6>
                                    <p{{ $item->tgl_post }}</p>
                                </div>
                            </div>
                            <!-- end profile -->

                            <!-- hamburger dot -->
                            <div class="hamburger-dot ">
                                <button class="btn">
                                    <img src="{{asset('assets/img/3dot.png')}}" alt="">
                                </button>
                            </div>
                            <!-- end hamburger dot -->
                        </div>
                        <!-- end profile and hamburger -->

                        <h5>{{ $item->deskripsi }}</h5>
                        <div class="d-flex">
                            <h6>di </h6>
                            <h6 class="text-tag ml-1"> {{ $item->video_judul }}</h6>

                        </div>
                        <!-- like and comment -->
                        <div class="d-flex mt-3 like-comment ">
                            <button type="button " class="btn">
                                <i class="fas fa-heart active"></i>
                            </button>
                            <p class="mr-4 my-auto ">{{ $item->jml_like }} Suka</p>
                            <button type="button " class="btn">
                                <i class="far fa-comment-alt-dots fa-flip-horizontal"></i>
                            </button>

                            <p class="my-auto ">{{ $item->jml_komen }} Comments</p>
                        </div>
                        <!-- end like and comment -->
                    </div>
                </div>
                @empty 
                <div id="hero-comment" class="container mt-3">
                <div class="pict-kosong">
                    <center><img src="Assets/img/NoItem.png" align=" " alt="" srcset=""> </center>
                </div>
                </div>
                @endforelse
                
                <!-- pagination -->
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
                <!-- End Pagination -->
            </div>
            

            <div class="tab-pane fade" id="qna-saya" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <!-- Title QnA -->
                    <div class="container my-4">
                        <h4 class="font-weight-bold">Pertanyaan Saya (5)</h4>
                    </div>
                    <!-- End Title QnA -->
                    @if (Auth::guest())
                    @else
                    <div id="hero-promo" class="container">
                        <div class="row">
                            <div class="col-lg-12 mx-auto banner">
                                <img src="Assets/img/Bannerpromo.png" height="200px" alt="" srcset="">
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Comment QnA -->
                    <div class="container mb-2">
                        <div class="comment-qna p-4 ">
                            <!-- profile and hamburger -->
                            <div class="d-flex justify-content-between mb-1 ">
                                <!-- profile -->
                                <div class="profile-qna">
                                    <img src="{{ asset('assets/img/avatar.png')}} " alt="Avatar " class="float-left mr-3 ">
                                    <div class="d-flex flex-column mt-2 ">
                                        <h6>Nanda Mohammad<img src="{{ asset('assets/img/crown.png')}} " alt="crown "></h6>
                                        <p>12 10 2021 - 10.00AM</p>
                                    </div>
                                </div>
                                <!-- end profile -->

                                <!-- hamburger dot -->
                                <div class="hamburger-dot ">
                                    <button class="btn">
                                        <img src="{{ asset('assets/img/3dot.png')}}" alt="">
                                    </button>
                                </div>
                                <!-- end hamburger dot -->
                            </div>
                            <!-- end profile and hamburger -->

                            <h5>Bagaimana menghitung dalam bahasa Korea?</h5>
                            <div class="d-flex">
                                <h6>di </h6>
                                <h6 class="text-tag ml-1"> Pelajaran 12</h6>

                            </div>
                            <!-- like and comment -->
                            <div class="d-flex mt-3 like-comment ">
                                <button type="button " class="btn">
                                    <i class="fas fa-heart active"></i>
                                </button>
                                <p class="mr-4 my-auto ">10 rb Suka</p>
                                <button type="button " class="btn">
                                    <i class="far fa-comment-alt-dots fa-flip-horizontal"></i>
                                </button>

                                <p class="my-auto ">10 rb Comments</p>
                            </div>
                            <!-- end like and comment -->
                        </div>
                    </div>

                    <div class="container mb-2">
                        <div class="comment-qna p-4 ">
                            <!-- profile and hamburger -->
                            <div class="d-flex justify-content-between mb-1 ">
                                <!-- profile -->
                                <div class="profile-qna">
                                    <img src="{{ asset('assets/img/avatar.png')}} " alt="Avatar " class="float-left mr-3 ">
                                    <div class="d-flex flex-column mt-2 ">
                                        <h6>Nanda Mochammad <img src="{{ asset('assets/img/crown.png')}} " alt="crown "></h6>
                                        <p>12 10 2021 - 10.00AM</p>
                                    </div>
                                </div>
                                <!-- end profile -->

                                <!-- hamburger dot -->
                                <div class="hamburger-dot ">
                                    <button class="btn">
                                        <img src="{{ asset('assets/img/3dot.png')}}" alt="">
                                    </button>
                                </div>
                                <!-- end hamburger dot -->
                            </div>
                            <!-- end profile and hamburger -->

                            <h5>Bagaimana menghitung dalam bahasa Korea?</h5>
                            <div class="d-flex">
                                <h6>di </h6>
                                <h6 class="text-tag ml-1"> Pelajaran 12</h6>

                            </div>
                            <!-- like and comment -->
                            <div class="d-flex mt-3 like-comment ">
                                <button type="button " class="btn">
                                    <i class="far fa-heart mt-auto"></i>
                                </button>
                                <p class="mr-4 my-auto ">10 rb Suka</p>
                                <button type="button " class="btn">
                                    <i class="far fa-comment-alt-dots fa-flip-horizontal"></i>
                                </button>

                                <p class="my-auto ">10 rb Comments</p>
                            </div>
                            <!-- end like and comment -->
                        </div>
                    </div>

                    <!-- End Comment Qna -->

                    <!-- pagination -->
                    <nav aria-label="Page navigation example ">
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
                    <!-- End Pagination -->

                </div>
                <!-- end content qna saya -->
                </div>
            </div>
        </div>
    </div>

@endsection

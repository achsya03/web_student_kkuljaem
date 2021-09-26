@extends('layouts.dashboard')

@section('css')
    <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/forum.css') }}" rel="stylesheet" />


@endsection

@section('title')
    {{ env('APP_NAME') }} | Forum
@endsection

@section('content')
@php
use Illuminate\Support\Facades\Auth;

@endphp
 <!-- Top Menu -->
 <div id="title-bar" class="my-3">
    <div class="container">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-jelajahi-tab" data-toggle="pill" href="#pills-jelajahi"
                    role="tab" aria-controls="pills-jelajahi" aria-selected="true">
                    <h3>Jelajah</h3>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-postingan-tab" data-toggle="pill" href="#pills-postingan" role="tab"
                    aria-controls="pills-postingan" aria-selected="false">
                    <h3>Postingan Saya</h3>
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- End Top Menu -->

<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-jelajahi" role="tabpanel" aria-labelledby="pills-jelajahi-tab">
        <!-- Banner Promo -->
        @if ($account->status_member == 'Non-Member')
        <div id="hero-promo" class="container">
            <div class="row">
            <div class="col-lg-12 mx-auto">
                <img src="{{ asset('assets/img/Bannerpromo.png') }}" width="100%" height="200px" alt="" srcset="">
            </div>
            </div>
        </div>
        @else

        @endif
        <!-- End Banner Promo -->

        <!-- Title Forum -->
        <div class="container mt-4">
            <h4 class="font-weight-bold">Topik Terpopuler</h4>
            <p class="">Bacaan terpopuler saat ini</p>
        </div>
        <!-- End Title Forum -->

        <!-- Hastag -->
       
        <div class="container hastag">
           
            <div class="kelas-utama">
                <div class="pilihan-kelas">
                    <div class="card-deck">
                        @foreach ($themes as $index => $theme)
                        @if($index < 3)
                        <button class="topik-tag" href="#"
                            style="background-image: url({{ asset('assets/img/topik-tag.png)') }};">
                            <h3 class="text-white">{{$theme->judul}}</h3>
                        </button>
                        @else
                        @endif
                        @endforeach 
                    </div>
                </div>
    
            </div>
            @foreach ($themes as $index => $theme)
            @if($index > 2)
            <div class="d-flex mt-4">
                <h5 class=" text-hastag"><a href="">#04 Kpop</a></h5>
                <h5 class=" text-hastag"><a href="">#05 Kdrama</a></h5>
                <h5 class=" text-hastag"><a href="">More</a></h5>
            </div>
            @else
            @endif
            @endforeach 
        </div>
        
     
        <!-- End Hastag -->

        <!-- Title Forum Comment -->
        <div class="container mt-5 pt-4">
            <h4 class="font-weight-bold ">Forum Terpilih</h4>
            <p class=" mb-4">Bacaan pilihan editor</p>
        </div>
        <!-- End Title Forum Comment -->


        <!-- Comment Forum -->
        @foreach ($forums as $index => $forum)
        <div class="container mb-2">
            <div class="comment-forum p-4 ">
                <div class="d-flex justify-content-between mb-1 ">
                    <div class="profile-forum">
                        <img src="../Assets/img/avatar.png " alt="Avatar " class="float-left mr-3 ">
                        <div class="d-flex flex-column mt-2 ">
                            <h6>{{ $forum->nama_pengirim }}<img src="../Assets/img/crown.png " alt="crown "></h6>
                            <p>12 10 2021 - 10.00AM</p>

                        </div>
                    </div>
                    <div class="hamburger-dot ">
                        <i class="fa fa-ellipsis-v text-secondary "></i>
                    </div>
                </div>
                <h5>{{ $forum->judul }}a</h5>
                <h6 class="text-tag ">{{ $forum->tema }}</h6>
                <p>{{ $forum->deskripsi }}
                </p>
                <div class="d-flex ">
                    <a href="">
                        <img src="../Assets/img/img-example-rectangle.png " alt="commentimg " class="img-comment ">
                    </a>
                    <a href="">
                        <img src="../Assets/img/img-example-rectangle.png " alt="commentimg " class="img-comment ">
                    </a>
                    <a href="">
                        <img src="../Assets/img/img-example-rectangle.png " alt="commentimg " class="img-comment ">
                    </a>

                </div>

                <div class="d-flex mt-3 like-comment ">
                    <i class="far fa-heart mr-2 my-auto "></i>
                    <p class="mr-4 my-auto ">{{ $forum->jml_like }} Suka</p>

                    <i class="far fa-comment-alt-dots fa-flip-horizontal mr-2 my-auto "></i>
                    <p class="my-auto ">{{ $forum->jml_komen }} Comments</p>
                </div>
            </div>
        </div>
        @endforeach 
    </div>
    <div class="tab-pane fade show" id="pills-postingan" role="tabpanel" aria-labelledby="pills-postingan-tab">
        <div class="container">
            <div class="form-pengisian mt-5 p-4">
                <h4 class="font-weight-bold">Buat Postingan Baru</h4>
                <form action="" method="">
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <input type="text" class="form-control" id="" placeholder="Masukkan judul postingan">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <select id="inputtag" class="form-control">
                                    <option>Lifestyle</option>
                                    <option>Beasiswa</option>
                                    <option>Pendidikan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control mb-2" id="text-area-postingan" rows="5" placeholder="Masukkan isi dari postingan"></textarea>
                                <small>0/200 kata</small>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="tambah-gambar flex-column">
                            <h6>Tambahkan gambar</h6>
                            <div class="flex-row">
                                <a href="">
                                    <img src="../Assets/img/img-example.png" alt="" class="mr-2">
                                </a>
                                <a href="">
                                    <img src="../Assets/img/img-example.png" alt="" class="mr-2">
                                </a>
                                <a href="">
                                    <img src="../Assets/img/img-example.png" alt="">
                                </a>
                            </div>
    
                        </div>
                        <button type="submit" class="btn btn-posting mt-auto">Posting</button>
                    </div>
                </form>
            </div>
        </div>
        @foreach ($forum_user as $index)
        <div class="container mb-2">
            <div class="comment-forum p-4 ">
                <div class="d-flex justify-content-between mb-1 ">
                    <div class="profile-forum">
                        <img src="../Assets/img/avatar.png " alt="Avatar " class="float-left mr-3 ">
                        <div class="d-flex flex-column mt-2 ">
                            <h6>{{ $index->nama_pengirim }} <img src="../Assets/img/crown.png " alt="crown "></h6>
                            <p>12 10 2021 - 10.00AM</p>
    
                        </div>
                    </div>
                    <div class="hamburger-dot ">
                        <i class="fa fa-ellipsis-v text-secondary "></i>
                    </div>
                </div>
                <h5>{{ $index->judul }}</h5>
                <h6 class="text-tag ">{{ $index->tema }}</h6>
                <p>{{ $index->deskripsi }}</p>
                <div class="d-flex ">
                    <a href="">
                        <img src="../Assets/img/img-example-rectangle.png " alt="commentimg " class="img-comment ">
                    </a>
                    <a href="">
                        <img src="../Assets/img/img-example-rectangle.png " alt="commentimg " class="img-comment ">
                    </a>
                    <a href="">
                        <img src="../Assets/img/img-example-rectangle.png " alt="commentimg " class="img-comment ">
                    </a>
    
                </div>
    
                <div class="d-flex mt-3 like-comment ">
                    <i class="far fa-heart mr-2 my-auto "></i>
                    <p class="mr-4 my-auto ">{{ $index->jml_like }} Suka</p>
    
                    <i class="far fa-comment-alt-dots fa-flip-horizontal mr-2 my-auto "></i>
                    <p class="my-auto ">{{ $index->jml_komen }} Comments</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- pagination -->
<nav aria-label="..." class="mt-5">
    <ul class="pagination justify-content-center">
        <li class="page-item disabled">
            <span class="page-link">Previous</span>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active">
            <span class="page-link">
          2
          <span class="sr-only">(current)</span>
            </span>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#">Next</a>
        </li>
    </ul>
</nav>
<!-- End Pagination -->




@endsection

@extends('layouts.dashboard')

@section('css')
    <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/forum.css') }}" rel="stylesheet" />


@endsection

@section('title')
    {{ env('APP_NAME') }} | Forum
@endsection

@section('content')

    <!-- Top Menu -->
    <div id="title-bar" class="my-3">
        <div class="container">
            <ul class="nav top-menu nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active  " id="pills-jelajahi-tab" data-toggle="pill" href="#pills-jelajahi" role="tab"
                        aria-controls="pills-jelajahi" aria-selected="true">
                        <h3 class="top-menu font-weight-bold active">Jelajahi</h3>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ml-3" id="pills-postingan-tab" data-toggle="pill" href="#pills-postingan" role="tab"
                        aria-controls="pills-postingan" aria-selected="false">
                        <h3 class="top-menu font-weight-bold">Postingan Saya</h3>
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
                            <img src="{{ asset('assets/img/Bannerpromo.png') }}" width="100%" height="200px" alt=""
                                srcset="">
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

        <div class="
                    container hastag">
                <div class="kelas-utama">
                    <div class="pilihan-kelas">
                        <div class="container">
                            <div class="card-deck">
                                @foreach ($themes as $index => $theme)
                                    @if ($index == 0)
                                        <a href="{{ route('forum.topik', $theme->theme_uuid) }}" class="topik-tag"
                                            style="background-image: url({{ asset('assets/img/tag-makanan.jpg)') }}; text-decoration: none">
                                            <h3 class="text-white">#{{ $theme->judul }}</h3>
                                        </a>
                                    @elseif ($index == 1)
                                        <a href="{{ route('forum.topik', $theme->theme_uuid) }}" class="topik-tag"
                                            style="background-image: url({{ asset('assets/img/tag-aktor.jpg)') }}; text-decoration: none">
                                            <h3 class="text-white">#{{ $theme->judul }}</h3>
                                        </a>
                                    @elseif ($index == 2)
                                        <a href="{{ route('forum.topik', $theme->theme_uuid) }}" class="topik-tag"
                                            style="background-image: url({{ asset('assets/img/tag-artis.jpg)') }}; text-decoration: none">
                                            <h3 class="text-white">#{{ $theme->judul }}</h3>
                                        </a>
                                    @elseif ($index > 2)
                                        <div class="d-flex mt-4">
                                            <h5 class="text-hastag"><a
                                                    href="{{ route('forum.topik', $theme->theme_uuid) }}">{{ $theme->judul }}</a>
                                            </h5>
                                        </div>
                                    @endif

                                @endforeach
                            </div>
                        </div>

                    </div>

                </div>
                {{-- @foreach ($themes as $index => $theme)
                    
                    @else
                    @endif
                @endforeach --}}
            </div>


            <!-- End Hastag -->

            <!-- Title Forum Comment -->
            <div class="container mt-5 pt-4">
                <h4 class="font-weight-bold ">Forum Terpilih</h4>
                <p class=" mb-4">Bacaan pilihan editor</p>
            </div>
            <!-- End Title Forum Comment -->

            <!-- <forum-component :data='@json($forums)'></forum-component> -->

            <!-- Comment Forum -->
            @foreach ($forums as $index => $forum)
                <div class="container mb-2">
                    <div class="comment-forum p-4 ">
                        <div class="d-flex justify-content-between mb-1 ">
                            <div class="profile-forum">
                                <img src="{{ asset('assets/img/avatar.png') }}" alt="Avatar " class="float-left mr-3 ">
                                <div class="d-flex flex-column mt-2 ">
                                <h6>{{ $forum->nama_pengirim }} @if ($account->status_member == 'Non-Member') @else
                                            <img src="{{ asset('assets/img/crown_user.png') }}" alt="Crown">
                                        @endif
                                        <p class="mt-2">{{ date('d m Y - H.i', strtotime($forum->tgl_post)) }}
                                        </p>

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
                                            href="{{ route('forum.delete', $forum->post_uuid) }}">
                                            <h6 class="mx-auto my-auto">Delete</h6>
                                        </a>
                                        <a class="dropdown-item d-flex text-center"
                                            href="{{ route('forum.delete', $forum->post_uuid) }}">
                                            <h6 class="mx-auto my-auto">Laporkan</h6>
                                        </a>
                                    @else
                                        <a class="dropdown-item d-flex text-center"
                                            href="{{ route('forum.delete', $forum->post_uuid) }}">
                                            <h6 class="mx-auto my-auto">Laporkan</h6>
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <!-- end hamburger dot -->
                        </div>
                        <h5>{{ $forum->judul }}</h5>
                        <h6 class="text-tag ">{{ $forum->tema }}</h6>
                        <p>{{ $forum->deskripsi }}
                        </p>
                        @if (@!isset($forum->gambar))
                        @else
                            <div class="card-deck">
                                <div class="d-flex ">
                                    @foreach ($forum->gambar as $gambaritem)
                                        <a><img src="{{ $gambaritem->url_gambar }}" alt="No Image"
                                                class="img-comment mx-2"></a>
                                    @endforeach
                                </div>
                            </div>

                        @endif
                        <div class="d-flex mt-3 like-comment ">
                            @if ($forum->user_like == 'True')
                                <a href="{{ route('forum.unlike_post', $forum->post_uuid) }}"
                                    style="text-decoration: none" class="btn">
                                    <i class="fas fa-heart active"></i>
                                </a>
                            @elseif($forum->user_like=='False')
                                <a href="{{ route('forum.like_post', $forum->post_uuid) }}" style="text-decoration: none"
                                    class="btn">
                                    <i class="far fa-heart"></i>
                                </a>
                            @endif
                            <p class="mr-4 mt-2 ">{{ $forum->jml_like }} Suka</p>

                            <a href="{{ route('forum.detail', $forum->post_uuid) }}" style="text-decoration: none"
                                class="btn">
                                <div class="d-flex">
                                    <i class="far fa-comment-alt fa-flip-horizontal mr-2"></i>
                                    <p class="">{{ $forum->jml_komen }} Comments</p>
                        </div>
                    </a>


                </div>
            </div>
        </div>
        @endforeach
        <!-- pagination -->
                                    <nav aria-label="
                                        Page navigation example pt-5">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item"><a class="page-link page-prev-next" href="#">Prev</a>
                                        </li>
                                        <li class="page-item"><a class="page-link page-number" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link page-number" href="#">...</a></li>
                                        <li class="page-item"><a class="page-link page-number" href="#">11</a></li>
                                        <li class="page-item"><a class="page-link page-number active" href="#">12</a>
                                        </li>
                                        <li class="page-item"><a class="page-link page-number" href="#">13</a></li>
                                        <li class="page-item"><a class="page-link page-number" href="#">...</a></li>
                                        <li class="page-item"><a class="page-link page-number" href="#">15</a></li>
                                        <li class="page-item"><a class="page-link page-prev-next" href="#">Next</a>
                                        </li>
                                    </ul>
                                    </nav>
                                    <!-- End Pagination -->
                                </div>
                                <div class="tab-pane fade show" id="pills-postingan" role="tabpanel"
                                    aria-labelledby="pills-postingan-tab">
                                    <div class="container">
                                        <div class="form-pengisian mt-3 p-4">
                                            <h4 class="font-weight-bold">Buat Postingan Baru</h4>
                                            <form enctype="multipart/form-data" class="form theme-form pb-5 f1"
                                                action="{{ route('forum.create_post') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" required name="judul" class="form-control"
                                                                id="" placeholder="Masukkan judul postingan">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <select id="inputtag" name="theme" class="form-control">
                                                                @foreach ($themes as $index => $theme)
                                                                    <option value="{{ $theme->theme_uuid }}">
                                                                        {{ $theme->judul }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control mb-2" id="text-area-postingan"
                                                                name="deskripsi" rows="5"
                                                                placeholder="Masukkan isi dari postingan"></textarea>
                                                            <small id="chars"></small><small> huruf</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <div class="row">
                                                        <div class="form-group increment">
                                                            <div class="input-group">
                                                                <div
                                                                    class="tambah-gambar d-flex flex-column align-items-center">

                                                                    <input type="file" id="photo" name="post_image[]"
                                                                        onchange="loadFile(event)" hidden />
                                                                    <label for="photo">+ Gambar</label>

                                                                    {{-- <label for="photo" class="btn-choose text-center">Choose File</label> --}}
                                                                    <img src="{{ asset('assets/img/plus-foto.png') }}"
                                                                        class="btn-add" id="output" width="100px"
                                                                        height="100px" />
                                                                </div>
                                                                
                                                                <div class="clone invisible">
                                                                <div class="input-group">
                                                                    <div
                                                                        class="tambah-gambar d-flex flex-column align-items-center">
                                                                        <input type="file" id="photo" name="post_image[]"
                                                                            onchange="loadFile(event)">
                                                                        <div class="input-group-append">
                                                                            <button type="button"
                                                                                class="btn btn-outline-danger btn-remove">
                                                                                <i class="fas fa-minus-square"></i>

                                                                            </button>
                                                                            {{-- <img src="{{ asset('assets/img/plus-foto.png') }}" class="btn-remove" id="output"
                                                width="100px" height="100px" /> --}}
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            </div>

                                                            

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
                                                        <img src="{{ asset('assets/img/avatar.png') }}" alt="Avatar "
                                                            class="float-left mr-3 ">
                                                        <div class="d-flex flex-column mt-2 ">
                                                            <h6>{{ $index->nama_pengirim }} @if ($account->status_member == 'Non-Member')
                                                                @else
                                                                    <img src="{{ asset('assets/img/crown_user.png') }}"
                                                                        alt="Crown">
                                                                @endif
                                                            </h6>
                                                            <p class="mt-2">
                                                                {{ date('d m Y - H.i', strtotime($index->tgl_post)) }}
                                                            </p>

                                                        </div>
                                                    </div>
                                                    <!-- hamburger dot -->
                                                    <div class="dropdown hamburger-dot ">
                                                        <a class="btn dropdown" href="#" id="deletedropdowm"
                                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <img src="{{ asset('assets/img/3dot.png') }}" alt="">
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right"
                                                            aria-labelledby="delete">
                                                            @if ($index->nama_pengirim == $account->nama)
                                                                <a class="dropdown-item d-flex text-center"
                                                                    href="{{ route('forum.delete', $forum->post_uuid) }}">
                                                                    <h6 class="mx-auto my-auto">Delete</h6>
                                                                </a>
                                                                <a class="dropdown-item d-flex text-center"
                                                                    href="{{ route('forum.delete', $forum->post_uuid) }}">
                                                                    <h6 class="mx-auto my-auto">Laporkan</h6>
                                                                </a>
                                                            @else
                                                                <a class="dropdown-item d-flex text-center"
                                                                    href="{{ route('forum.delete', $forum->post_uuid) }}">
                                                                    <h6 class="mx-auto my-auto">Laporkan</h6>
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <!-- end hamburger dot -->
                                                </div>
                                                <h5>{{ $index->judul }}</h5>
                                                <h6 class="text-tag ">{{ $index->tema }}</h6>
                                                <p>{{ $index->deskripsi }}</p>
                                                @if (@!isset($index->gambar))
                                                @else
                                                    <div class="card-deck">
                                                        <div class="d-flex ">
                                                            @foreach ($index->gambar as $gambaritem)
                                                                <a><img src="{{ $gambaritem->url_gambar }}"
                                                                        alt="No Image" class="img-comment mx-2"></a>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                @endif
                                                <div class="d-flex mt-3 like-comment ">
                                                    @if ($index->user_like == 'True')
                                                        <a href="{{ route('forum.unlike_post', $index->post_uuid) }}"
                                                            style="text-decoration: none" class="btn">
                                                            <i class="fas fa-heart active"></i>
                                                        </a>
                                                    @elseif($index->user_like=='False')
                                                        <a href="{{ route('forum.like_post', $index->post_uuid) }}"
                                                            style="text-decoration: none" class="btn">
                                                            <i class="far fa-heart"></i>
                                                        </a>
                                                    @endif
                                                    <p class="mr-4 my-auto ">{{ $index->jml_like }} Suka</p>
                                                    <i class="far fa-comment-alt fa-flip-horizontal mr-2 my-auto "></i>
                                                    <a href="{{ route('forum.detail', $index->post_uuid) }}"
                                                        style="text-decoration: none">
                                                        <p class="my-auto ">{{ $index->jml_komen }} Comments</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- pagination -->
                                <nav aria-label="Page navigation example pt-5">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item"><a class="page-link page-prev-next" href="#">Prev</a>
                                        </li>
                                        <li class="page-item"><a class="page-link page-number" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link page-number" href="#">...</a></li>
                                        <li class="page-item"><a class="page-link page-number" href="#">11</a></li>
                                        <li class="page-item"><a class="page-link page-number active" href="#">12</a>
                                        </li>
                                        <li class="page-item"><a class="page-link page-number" href="#">13</a></li>
                                        <li class="page-item"><a class="page-link page-number" href="#">...</a></li>
                                        <li class="page-item"><a class="page-link page-number" href="#">15</a></li>
                                        <li class="page-item"><a class="page-link page-prev-next" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- End Pagination -->
                        </div>






                    @endsection
                    @section('page-js')
                        <script>
                            var loadFile = function(event) {
                                var output = document.getElementById('output');
                                output.src = URL.createObjectURL(event.target.files[0]);
                                output.onload = function() {
                                    URL.revokeObjectURL(output.src) // free memory
                                }
                            };
                            var loadFil = function(event) {
                                var output = document.getElementById('outpu');
                                output.src = URL.createObjectURL(event.target.files[0]);
                                output.onload = function() {
                                    URL.revokeObjectURL(output.src) // free memory
                                }
                            };
                        </script>
                        <script>
                            window.action = "submit"
                            jQuery(document).ready(function() {
                                jQuery(".btn-add").click(function() {
                                    let markup = jQuery(".invisible").html();
                                    jQuery(".increment").append(markup);
                                });
                                jQuery("body").on("click", ".btn-remove", function() {
                                    jQuery(this).parents(".input-group").remove();
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
                        <script src="{{ mix('js/app.js') }}"></script>
                    @endsection

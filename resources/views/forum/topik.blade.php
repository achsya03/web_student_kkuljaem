@extends('layouts.dashboard')

@section('css')
    <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/forum.css') }}" rel="stylesheet" />


@endsection

@section('title')
    {{ env('APP_NAME') }} | Topik
@endsection

@section('content')
<!-- Title Topic -->
<div class="container">
    <h3 class="my-5 font-weight-bold">Lifestyle</h3>
</div>
<!-- End Title Topic -->

<!-- Top Menu -->
<div class="container">
    <div class="d-flex mt-5 pb-3">
        <h3 class="top-menu mr-4 ml-3 font-weight-bold "><a href="" class="pb-2 active">Terpopuler</a></h3>
        <h3 class="top-menu font-weight-bold"><a href="" class="pb-2">Terbaru</a></h3>
    </div>
</div>

<!-- End Top Menu -->

<!-- Banner Promo -->
<div class="container my-4">
    <img src="../Assets/img/banner-promo.png" alt="Banner Promo" class="banner-promo">
</div>
<!-- End Banner Promo -->

<!-- Comment Forum -->
<div class="container mb-2">
    <div class="comment-forum p-4 ">
        <div class="d-flex justify-content-between mb-1 ">
            <div class="profile-forum">
                <img src="../Assets/img/avatar.png " alt="Avatar " class="float-left mr-3 ">
                <div class="d-flex flex-column mt-2 ">
                    <h6>Nanda Mochammad <img src="../Assets/img/crown.png " alt="crown "></h6>
                    <p>12 10 2021 - 10.00AM</p>

                </div>
            </div>
            <div class="hamburger-dot ">
                <i class="fa fa-ellipsis-v text-secondary "></i>
            </div>
        </div>
        <h5>Hal Seru yang ada di Korea</h5>
        <h6 class="text-tag ">#Lifestyle</h6>
        <p>Korea Selatan adalah sebuah negara di Asia Timur yang meliputi bagian selatan Semenanjung Korea. Di sebelah utara, Republik Korea berbataskan Korea Utara, di mana keduanya bersatu sebagai sebuah negara hingga tahun 1948. Laut Kuning di sebelah
            barat, Jepang berada di seberang Laut Jepang (disebut "Laut Timur " oleh orang-orang Korea) dan Selat Korea berada di bagian... Selengkapnya
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
            <p class="mr-4 my-auto ">10 rb Suka</p>

            <i class="far fa-comment-alt-dots fa-flip-horizontal mr-2 my-auto "></i>
            <p class="my-auto ">10 rb Comments</p>
        </div>
    </div>
</div>

<div class="container mb-2">
    <div class="comment-forum p-4 ">
        <div class="d-flex justify-content-between mb-1 ">
            <div class="profile-forum">
                <img src="../Assets/img/avatar.png " alt="Avatar " class="float-left mr-3 ">
                <div class="d-flex flex-column mt-2 ">
                    <h6>Nanda Mochammad <img src="../Assets/img/crown.png " alt="crown "></h6>
                    <p>12 10 2021 - 10.00AM</p>

                </div>
            </div>
            <div class="hamburger-dot ">
                <i class="fa fa-ellipsis-v text-secondary "></i>
            </div>
        </div>
        <h5>Hal Seru yang ada di Korea</h5>
        <h6 class="text-tag ">#Lifestyle</h6>
        <p>Korea Selatan adalah sebuah negara di Asia Timur yang meliputi bagian selatan Semenanjung Korea. Di sebelah utara, Republik Korea berbataskan Korea Utara, di mana keduanya bersatu sebagai sebuah negara hingga tahun 1948. Laut Kuning di sebelah
            barat, Jepang berada di seberang Laut Jepang (disebut "Laut Timur " oleh orang-orang Korea) dan Selat Korea berada di bagian... Selengkapnya
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
            <p class="mr-4 my-auto ">10 rb Suka</p>

            <i class="far fa-comment-alt-dots fa-flip-horizontal mr-2 my-auto "></i>
            <p class="my-auto ">10 rb Comments</p>
        </div>
    </div>
</div>
<div class="container mb-2">
    <div class="comment-forum p-4 ">
        <div class="d-flex justify-content-between mb-1 ">
            <div class="profile-forum">
                <img src="../Assets/img/avatar.png " alt="Avatar " class="float-left mr-3 ">
                <div class="d-flex flex-column mt-2 ">
                    <h6>Nanda Mochammad <img src="../Assets/img/crown.png " alt="crown "></h6>
                    <p>12 10 2021 - 10.00AM</p>

                </div>
            </div>
            <div class="hamburger-dot ">
                <i class="fa fa-ellipsis-v text-secondary "></i>
            </div>
        </div>
        <h5>Hal Seru yang ada di Korea</h5>
        <h6 class="text-tag ">#Lifestyle</h6>
        <p>Korea Selatan adalah sebuah negara di Asia Timur yang meliputi bagian selatan Semenanjung Korea. Di sebelah utara, Republik Korea berbataskan Korea Utara, di mana keduanya bersatu sebagai sebuah negara hingga tahun 1948. Laut Kuning di sebelah
            barat, Jepang berada di seberang Laut Jepang (disebut "Laut Timur " oleh orang-orang Korea) dan Selat Korea berada di bagian... Selengkapnya
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
            <p class="mr-4 my-auto ">10 rb Suka</p>

            <i class="far fa-comment-alt-dots fa-flip-horizontal mr-2 my-auto "></i>
            <p class="my-auto ">10 rb Comments</p>
        </div>
    </div>
</div>
<div class="container mb-2">
    <div class="comment-forum p-4 ">
        <div class="d-flex justify-content-between mb-1 ">
            <div class="profile-forum">
                <img src="../Assets/img/avatar.png " alt="Avatar " class="float-left mr-3 ">
                <div class="d-flex flex-column mt-2 ">
                    <h6>Nanda Mochammad <img src="../Assets/img/crown.png " alt="crown "></h6>
                    <p>12 10 2021 - 10.00AM</p>

                </div>
            </div>
            <div class="hamburger-dot ">
                <i class="fa fa-ellipsis-v text-secondary "></i>
            </div>
        </div>
        <h5>Hal Seru yang ada di Korea</h5>
        <h6 class="text-tag ">#Lifestyle</h6>
        <p>Korea Selatan adalah sebuah negara di Asia Timur yang meliputi bagian selatan Semenanjung Korea. Di sebelah utara, Republik Korea berbataskan Korea Utara, di mana keduanya bersatu sebagai sebuah negara hingga tahun 1948. Laut Kuning di sebelah
            barat, Jepang berada di seberang Laut Jepang (disebut "Laut Timur " oleh orang-orang Korea) dan Selat Korea berada di bagian... Selengkapnya
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
            <p class="mr-4 my-auto ">10 rb Suka</p>

            <i class="far fa-comment-alt-dots fa-flip-horizontal mr-2 my-auto "></i>
            <p class="my-auto ">10 rb Comments</p>
        </div>
    </div>
</div>
<div class="container mb-2">
    <div class="comment-forum p-4 ">
        <div class="d-flex justify-content-between mb-1 ">
            <div class="profile-forum">
                <img src="../Assets/img/avatar.png " alt="Avatar " class="float-left mr-3 ">
                <div class="d-flex flex-column mt-2 ">
                    <h6>Nanda Mochammad <img src="../Assets/img/crown.png " alt="crown "></h6>
                    <p>12 10 2021 - 10.00AM</p>

                </div>
            </div>
            <div class="hamburger-dot ">
                <i class="fa fa-ellipsis-v text-secondary "></i>
            </div>
        </div>
        <h5>Hal Seru yang ada di Korea</h5>
        <h6 class="text-tag ">#Lifestyle</h6>
        <p>Korea Selatan adalah sebuah negara di Asia Timur yang meliputi bagian selatan Semenanjung Korea. Di sebelah utara, Republik Korea berbataskan Korea Utara, di mana keduanya bersatu sebagai sebuah negara hingga tahun 1948. Laut Kuning di sebelah
            barat, Jepang berada di seberang Laut Jepang (disebut "Laut Timur " oleh orang-orang Korea) dan Selat Korea berada di bagian... Selengkapnya
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
            <p class="mr-4 my-auto ">10 rb Suka</p>

            <i class="far fa-comment-alt-dots fa-flip-horizontal mr-2 my-auto "></i>
            <p class="my-auto ">10 rb Comments</p>
        </div>
    </div>
</div>

<!-- End Comment Forum -->

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

<!-- Title Forum -->
<div class="container mt-4">
    <h4 class="font-weight-bold">Topik Lainnya</h4>
    <p class="">Bacaan yang tidak kalah menarik</p>
</div>
<!-- End Title Forum -->

<!-- Hastag -->
<div class="container hastag">
    <div class="d-flex justify-content-between img-hastag">
        <a href=""><img src="../Assets/img/img-tag-2.png"></a>
        <a href=""><img src="../Assets/img/img-tag-3.png"></a>
        <a href=""><img src="../Assets/img/img-tag-4.png"></a>
    </div>
</div>
<!-- End Hastag -->



@endsection

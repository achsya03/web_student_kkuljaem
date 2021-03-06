<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('assets/img/Logo.png') }}" type="image/x-icon">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- Docs styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/CDNSFree2/Plyr/plyr.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="{{ asset('assets/vendor/video.js/dist/video-js.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/video.js/dist/video-js.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/vendor/fontawesome/css/fontawesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/fontawesome/css/light.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/fontawesome/css/regular.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/fontawesome/css/all.min.css') }}" rel="stylesheet" />

    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-messaging.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-functions.js"></script>
    <link rel="manifest" href="manifest.json">

    @yield('css')
</head>

<body>
    <header id="header" class="bg-light fixed-top position-fixed">
        <div class="container d-flex align-items-center">
            <h1 class="logo mr-auto my-auto">
                <a href="/">
                    <img src="{{ asset('assets/img/Logo.png') }}" alt="" srcset="" /></a>
            </h1>
            <form action="{{ route('dashboard.search') }}" method="POST" style="width: 450px;">
                <div class="input-group border rounded-pill my-1 mr-4 bg-white py-1">

                    @csrf
                    <input type="text" name="keyword" placeholder="Pencarian..." aria-describedby="button-addon3"
                        class="form-control ml-3 bg-none border-0">
                    <div class="input-group-append border-0">
                        <button id="button-addon3" type="submit" class="btn btn-link text-success"><i
                                class="fa fa-search"></i></button>
                    </div>

                </div>
            </form>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link my-1 mx-2 {{ Request::routeIs('') ? 'active' : '' }}"
                        href="{{ route('dashboard.index') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link my-1 mx-2 {{ Request::routeIs('class') ? 'active' : '' }}"
                        href="{{ route('class.index') }}">Kelas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link my-1 mx-2 {{ Request::routeIs('forum') ? 'active' : '' }}"
                        href="{{ route('forum.index') }}">Forum</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link my-1 mx-2 {{ Request::routeIs('qna') ? 'active' : '' }}"
                        href="{{ route('qna.index') }}">QnA</a>
                </li>
                <li class="nav-item dropdown no-arrow my-1 mx-2">
                    @php
                        
                        $response = new \GuzzleHttp\Client();
                        $a = $response->request('GET', 'https://kkuljaem-api-new-3-ft4mz.ondigitalocean.app/api/user/notification', [
                            'headers' => [
                                'Accept' => 'application/json',
                                'user-uuid' => '9993367b6505470fa2d1fad8c3990754',
                                'authorization' => 'Bearer ' . session()->get('bearer_token'),
                            ],
                        ]);
                        $responseApi = json_decode($a->getBody()->getContents());
                        $data = $responseApi->data;
                        
                    @endphp

                    <a class="nav-link" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-bell" style="color:#ef9c23"></i>
                        <!-- Counter - Alerts -->
                        @if ($data->number_unread_notif == 0)
                        @else
                            <span class="badge badge-counter "><i class="fas fa-circle"
                                    style="color:#ef9c23"></i></i></span>
                        @endif
                    </a>
                    <!-- Dropdown - Alerts -->

                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="alertsDropdown">
                        <div class="row">
                            <div class="col-lg-5 ml-4 p-3">
                                <h6>Notifikasi</h6>
                            </div>
                            <div class="col-lg-6 justify-content-end mr-2 py-3 px-4">
                                <h6 class="text-right">
                                    Baru <span>({{ $data->number_unread_notif }})</span>
                                </h6>
                            </div>
                        </div>
                        <div class="notif-scroll">
                            @if ($data->list_notif == null)
                                <a class="dropdown-item d-flex align-items-center">
                                    <div>
                                        <h5 style="margin-right: 150px; margin-left:150px;">Tidak Ada Notifikasi</h5>
                                    </div>
                                </a>
                            @else
                                @foreach ($data->list_notif as $item)

                                    <form action="{{ route('read_notif', $item->uuid_notif) }}" method="POST"
                                        class="d-flex">
                                        @csrf
                                        <input type="hidden" name="id_target" value="{{ $item->uuid_target }}">
                                        <input type="hidden" name="posisi" value="{{ $item->posisi }}">
                                        <button type="submit" class="dropdown-item d-flex align-items-center px-0 ml-4">
                                            @if ($item->status == 'unread')
                                                <div class="px-3 border-notif">
                                                    <div class="icon-circle">
                                                        <i class="far fa-bell" style="color:#fff"></i>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="px-3 non-border-notif">

                                                    {{-- sudahdibaca --}}
                                                    <div class="icon-circle"">
                                        <i class=" far fa-bell" style="color:#fff"></i>
                                                    </div>
                                                </div>
                                            @endif
                                            <div>
                                                <div class="small text-gray-500 font-weight-bold">{{ $item->judul }}
                                                </div>
                                                <h6 class="mb-0">{{ $item->deskripsi }}</h6>
                                            </div>
                                            <div>
                                                <h6 class="p-3 mb-0">
                                                    {{ $item->tgl_notif }}
                                                </h6>
                                            </div>

                                        </button>
                                        <div class="d-flex flex-column justify-content-center">
                                            <i class="far fa-trash ml-2 mr-5 btn-delete-notif"
                                                onclick="window.location='{{ URL::route('delete_notif', $item->uuid_notif) }}'"
                                                style="color:#ef9c23"></i>
                                        </div>
                                    </form>

                                @endforeach
                            @endif

                        </div>
                    </div>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link dropdown" href="#" id="deletedropdowm" role="button" data-toggle="dropdown">
                        <img class="img-profile rounded-circle" src="
                        {{ asset('assets/img/avatar.png') }}
                        ">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="delete">
                        <a class="dropdown-item d-flex text-center" href="{{ route('profil.index') }}">
                            <h6 class="mx-auto my-auto">Pengaturan</h6>
                        </a>
                        <div class="list-group font-weight-bold align-items-center keluar-hover" href="#">
                            <form action="{{ route('dashboard.noauth') }}" method="POST">
                                @csrf
                                <button type="submit" class="mx-auto my-auto text-center text-keluar"> Keluar </button>
                            </form>


                        </div>
                    </div>
                    {{-- <a class="nav-link" href="{{ route('profil.index') }}">
                        <img class="img-profile rounded-circle" src="{{ asset('assets/img/profile.png') }}">
                    </a> --}}
                </li>
            </ul>
        </div>
    </header>

    <div id="main">
        <div id="app">
            @yield('content')
        </div>
    </div>
    <footer id="footer" class="mastfoot mt-auto">
        <div class="inner">
            <div class="d-flex">
                <div class="col-4 logo justify-content-center d-flex align-items-center">
                    <div class="row">
                        <a class="text-dark" href="https://www.instagram.com/kkuljaemkorean/"><i
                                class="icon fab fa-instagram"></i></a>
                        <a class="text-dark" href="https://www.youtube.com/channel/UCN1OeEpWXav3ME1K068H-JA"><i
                                class="icon fab fa-youtube"></i></a>
                        <a class="text-dark" href="https://kkuljaemkorean.com/"><i
                                class="icon fas fa-globe-asia"></i></a>
                        <a class="text-dark" href="https://www.tiktok.com/@kkuljaemkorean"><i
                                class="icon fab fa-tiktok"></i></a>
                        <a class="text-dark"
                            href="https://api.whatsapp.com/send/?phone=6283804749226&text&app_absent=0"><i
                                class="icon fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="col-4 justify-content-center d-flex align-items-center">
                    <img src="{{ asset('assets/img/Logo2.png') }}" width="100px" alt="" srcset="">
                </div>
                <div class="col-4 justify-content-center d-flex align-items-center">
                    <h4 class="copyright">Copyright 2021</h4>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('assets/vendor/video.js/dist/video.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/videojs-youtube/dist/Youtube.min.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
        integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.plyr.io/3.6.8/plyr.js"></script>
    <script src="https://cdn.plyr.io/3.6.9/plyr.polyfilled.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
    <script src="{{ asset('assets/js/player.js') }}"></script>
    <script src="https://cdn.plyr.io/3.6.9/demo.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/CDNSFree2/PrismJS@latest/prism.min.js"></script>
    <script>
        $(document).ready(function() {
            var url = '{{ env('BASE_URL_API') }}';
            var bearer = '{{ Session::get('bearer_token') }}';
            $('.slider').slick({
                infinite: true,
                dots: true,
                autoplay: true,
                autoplaySpeed: 5000,
            });
            const firebaseConfig = {
                apiKey: "AIzaSyCOCndwu1sUu8w2FDALq_mTkw7XsZsLKaE",
                authDomain: "kkuljaem-korean-810c1.firebaseapp.com",
                projectId: "kkuljaem-korean-810c1",
                storageBucket: "kkuljaem-korean-810c1.appspot.com",
                messagingSenderId: "435982918944",
                appId: "1:435982918944:web:a16f995018ca6d46fee345",
                measurementId: "G-FD7DWRZ36Y"
            };
            // Initialize Firebase
            firebase.initializeApp(firebaseConfig);
            //firebase.analytics();
            const messaging = firebase.messaging();
            messaging
                .requestPermission()
                .then(function() {
                    //MsgElem.innerHTML = "Notification permission granted." 
                    console.log("Notification permission granted.");

                    // get the token in the form of promise
                    return messaging.getToken()
                })
                .then(function(token) {
                    // print the token on the HTML page     
                    console.log(token);
                    request = $.ajax({
                        url: url + "/api/user/notification/update",
                        beforeSend: function(xhr) {
                            xhr.setRequestHeader('Authorization', 'Bearer ' + bearer);
                        },
                        header: {
                            "Accept": "application/json",
                        },
                        crossDomain: true,
                        dataType: "json",
                        type: "post",
                        data: {
                            device_id: token
                        },
                        success: function(response) {
                            console.log(response);
                        }
                    });

                })
                .catch(function(err) {
                    console.log("Unable to get permission to notify.", err);
                });

            messaging.onMessage(function(payload) {
                console.log(payload);
                var notify;
                notify = new Notification(payload.notification.title, {
                    body: payload.notification.body,
                    icon: payload.notification.icon,
                    tag: "Dummy"
                });
                console.log(payload.notification);
            });

            //firebase.initializeApp(config);
            var database = firebase.database().ref().child("/users/");

            database.on('value', function(snapshot) {
                renderUI(snapshot.val());
            });

            // On child added to db
            database.on('child_added', function(data) {
                console.log("Comming");
                if (Notification.permission !== 'default') {
                    var notify;

                    notify = new Notification('CodeWife - ' + data.val().username, {
                        'body': data.val().message,
                        'icon': 'bell.png',
                        'tag': data.getKey()
                    });
                    notify.onclick = function() {
                        alert(this.tag);
                    }
                } else {
                    alert('Please allow the notification first');
                }
            });

            self.addEventListener('notificationclick', function(event) {
                event.notification.close();
            });
        });
    </script>

    <script type=???text/javascript???>
        $(function() {
            $('.fancybox-effects-d').lightBox();
        });
    </script>
    @yield('page-js')
</body>

</html>

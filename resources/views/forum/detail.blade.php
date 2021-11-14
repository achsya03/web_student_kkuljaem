@extends('layouts.dashboard')

@section('css')
    <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/forum.css') }}" rel="stylesheet" />


@endsection

@section('title')
    {{ env('APP_NAME') }} | Forum
@endsection

@section('content')
    <!-- Detail Comment QnA -->
    <div class="container my-4">
        @if (session('success'))

            <div class="alert alert-profile-premium mt-4 mb-5" style="background-color: rgb(104, 248, 111)" role="alert">
                <i class="far fa-check-circle ml-1 mr-3"></i> {{ session('success') }}
            </div>
        @endif

        @if (session('failed'))
            <!-- alert -->
            <div class="alert alert-profile mt-4 mb-5" style="background-color: rgb(248, 104, 104)" role="alert">
                <i class="far fa-info-alt ml-1 mr-3"></i> {{ session('failed') }}
            </div>
        @endif

        @foreach ($forum->posting as $item)

            <div class="comment-qna p-4 detail" id="qna-detail">
                <div class="d-flex justify-content-between mb-1 ">
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
        class="float-left mr-3 rounded-circle  img-detail-comment">
        <div class="d-flex flex-column mt-2 ">
            <h6 class="font-weight-bold">{{ $item->nama_pengirim }}
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
    <!-- hamburger dot -->

    <!-- end hamburger dot -->
    </div>
    <h5 class="font-weight-bold">{{ $item->judul }}</h5>
    <h6 class="text-tag">#{{ $item->tema }}</h6>
    <p>{{ $item->deskripsi }}</p>
    @if (@!isset($item->gambar))
    @else
        <div class="card-deck">
            <div class="d-flex ">
                @foreach ($item->gambar as $gambaritem)
                    <a href="{{ $gambaritem->url_gambar }}"><img src="{{ $gambaritem->url_gambar }}" alt="No Image" class="img-comment ml-3 mx-2" height="120px"></a>
                @endforeach
            </div>
        </div>

    @endif
    <!-- like and comment -->
    <div class="d-flex mt-3 like-comment ">
        @if ($item->user_like == 'True')
            <a href="{{ route('forum.unlike_post', $item->post_uuid) }}" style="text-decoration: none"
                class="btn">
                <i class="fas fa-heart active"></i>
            </a>
        @elseif($item->user_like=='False')
            <a href="{{ route('forum.like_post', $item->post_uuid) }}" style="text-decoration: none"
                class="btn">
                <i class="far fa-heart"></i>
            </a>
        @endif
        <p class="mr-4 my-auto ">{{ $item->jml_like }} Suka</p>
        <button type="button " class="btn">
            <i class="far fa-comment-alt-dots fa-flip-horizontal"></i>
        </button>

        <p class="my-auto ">{{ $item->jml_komen }} Comments</p>
    </div>
    <!-- end like and comment -->
    </div>
    @endforeach
    <!-- Form Send -->
    <form action="{{ route('forum.create_comment') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $id }}">
        <div class="d-flex justify-content-between align-items-center form-send">
            <img src="
                     @if ($account->status_member == 'member data complete' &&
            $account->jenis_kelamin == 'L')
            {{ asset('assets/img/member_l.png') }}
        @elseif($account->status_member=='member data complete' && $account->jenis_kelamin=='P')
            {{ asset('assets/img/member_p.png') }}
        @elseif($account->status_member=='data complete' && $account->jenis_kelamin=='L')
            {{ asset('assets/img/non_member_l.png') }}
        @elseif($account->status_member=='data complete' && $account->jenis_kelamin=='P')
            {{ asset('assets/img/non_member_p.png') }}
        @elseif($account->status_member=='new user')
            {{ asset('assets/img/non_member_new.png') }}
        @else
            {{ asset('assets/img/avatar.png') }}
            @endif" alt="Avatar " class="img-comment-form" width="80px" height="80px">
            <textarea class="form-control" name="komentar" id="" required placeholder="Tulis Jawabanmu..."></textarea>
            <button type="submit" class="btn btn-send-circle rounded-circle"><img
                    src="{{ asset('assets/img/send-icon.png') }}" alt="send" class="rounded-circle p-2"></button>

        </div>
    </form>
    <!-- End Form Send -->
    </div>

    <!-- Detail Comment -->
    <div class="container ">
        @foreach ($forum->comment as $value)
            <div class="all-list-detail-comment">
                <div class="detail-comment p-2">
                    <div class="d-flex justify-content-between mb-1 ">
                        <div class="profile-qna">
                            <img src="
                         @if ($value->stat_pengirim == 'member data complete' &&
                            $value->jenis_kelamin == 'L')
                            {{ asset('assets/img/member_l.png') }}
                        @elseif($value->stat_pengirim=='member data complete' && $value->jenis_kelamin=='P')
                            {{ asset('assets/img/member_p.png') }}
                        @elseif($value->stat_pengirim=='data complete' && $value->jenis_kelamin=='L')
                            {{ asset('assets/img/non_member_l.png') }}
                        @elseif($value->stat_pengirim=='data complete' && $value->jenis_kelamin=='P')
                            {{ asset('assets/img/non_member_p.png') }}
                        @elseif($value->stat_pengirim=='new user')
                            {{ asset('assets/img/non_member_new.png') }}
                        @else
                            {{ asset('assets/img/avatar.png') }}
        @endif
        " alt="Avatar "
        class="float-left mr-3 rounded-circle  img-detail-comment">
        <div class="d-flex flex-column mt-2 ">
            <h6 class="font-weight-bold">{{ $value->comment_nama }}
                @if ($value->stat_pengirim == 'admin-mentor')
                    <i class="fas fa-check-circle"></i>
                @elseif($value->stat_pengirim == 'member data complete')
                    <img src="{{ asset('assets/img/crown_user.png') }}" alt="Profile">
                @else

                @endif
            </h6>
            <p>{{ date('d m Y - H.i', strtotime($value->comment_tgl)) }}</p>
        </div>
    </div>
    <!-- hamburger dot -->

    <!-- hamburger dot -->
    <div class="dropdown show hamburger-dot ">
        <a class="btn dropdown" href="#" id="deletedropdowm" role="button" data-toggle="dropdown">
            <img src="{{ asset('assets/img/3dot.png') }}" alt="">
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="delete">
            @if ($value->comment_nama == $account->nama)
                <form action="{{ route('forum.delete_comment') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $value->comment_uuid }}">
                    <input type="hidden" name="detail_id" value="{{ $id }}">
                    <button type="submit" class="dropdown-item d-flex text-center">
                        <h6 class="mx-auto my-auto">Delete</h6>
                    </button>
                </form>

            @else
                <form action="{{ route('forum.alert_comment') }}" method="POST">
                    @csrf
                    <input type="hidden" name="komentar" value="{{ $value->comment_isi }}">
                    <input type="hidden" name="id" value="{{ $value->comment_uuid }}">
                    <input type="hidden" name="detail_id" value="{{ $id }}">
                    <button type="submit" class="dropdown-item d-flex text-center">
                        <h6 class="mx-auto my-auto">Laporkan</h6>
                    </button>
                </form>
            @endif
        </div>
    </div>

    <!-- end hamburger dot -->



    <!-- end hamburger dot -->
    </div>
    <p><b>{{ $value->comment_isi }}</b>
    </p>
    </div>
    @endforeach

    </div>
    </div>
    <!-- End Detail Comment -->

@endsection

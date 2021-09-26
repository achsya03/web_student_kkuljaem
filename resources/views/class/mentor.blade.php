@extends('layouts.dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/class.css') }}">
@endsection

@section('title')
    {{ env('APP_NAME') }} | Detail Mentor
@endsection

@section('content')


    <div id="hero-detail" class="container mb-4 mt-4">
        <div class="profil-mentor">
            <div class="row mb-4 py-4">
                <div class="col-lg-1 pl-4">
                    <img class="rounded-circle" src="{{$class->mentor_foto}}" width="80px" height="80px"  alt="Profile">
                </div>
                <div class="col-lg-10 pl-4 ml-4 mt-2">
                    <h4>{{$class->mentor_nama}}  <i class="fas fa-check-circle"></i></h4>
                    <h6>Menjadi Mentor sejak {{$class->mentor_lama}}</h6s>
                </div>
            </div>
        </div>
        <h3><Strong> Bio</Strong></h3>
        <p>{{$class->mentor_bio}}</p>
    </div>
    <div id="hero-kelas" class="container ">
        <div class="tittle-kelas mb-2">
            <h3 class="mb-2 pb-3">Kelas yang Diempuh</h3>
        </div>
        <div class="kelas-utama">
            <div class="pilihan-kelas">
                <div class="card-deck">
                    @forelse ($class->classroom as $item)
                    <button class="kelas">
                        <div class="row py-4">
                            <div class="col-lg-6">
                                <img  class="gambar-kelas mt-2" src="{{$item->class_url_web}}"  width="273px" height="158px" srcset="">
                            </div>
                            <div class="col-lg-5 ml-2 text-left">
                                <div class="nama-kelas">
                                    <a href="{{route('class.detail', $item->class_uuid)}}" style="text-decoration: none; color: black">
                                    <h5>{{$item->class_nama}}</h5></a>
                                </div>                            

                                <div class="jumlah-materi mt-5">
                                    <h5>{{$item->class_jml_materi}} Materi</h5>
                                </div>
                            </div>
                        </div>
                    </button>
                    @empty
                        
                    @endforelse
                    
                    
                </div>
            </div>
        </div>
    </div>

    </div>



@endsection

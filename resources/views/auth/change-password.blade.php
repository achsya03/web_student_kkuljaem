@extends('layouts.auth')

@section('title')
    {{env('APP_NAME')}} | Login
@endsection

@section('content')
  <div id="hero-login" class="container">
    <div class="row">
      <div class="col-lg-7 justify-content-center slider">
        <div class="col-lg-12 mx-auto banner">
          <img src="assets/img/Property1.png" height="auto" alt="" srcset="">
          <h1>Metode Belajar Yang Seru</h1>
          <p>Belajar tidak harus menegangkan dan menyulitkan</p>
        </div>
        <div class="col-lg-12 mx-auto banner justify-content-center">
          <img src="assets/img/Property2.png" height="auto" alt="" srcset="">
          <h1>Asah Kemampuanmu</h1>
          <p>Belajar Bahasa Korea makin seru dengan berbagai fitur di dalam satu aplikasi</p>
        </div>
        <div class="col-lg-12 mx-auto banner">
          <img src="assets/img/Property3.png" height="auto" alt="" srcset="">
          <h1>Mari Mulai Semua</h1>
          <p>bergabung lah dengan komunitas belajar bahasa Korea No. 1 Indonesia</p>
        </div>
      </div>
      <div class="col-lg-5 justify-content-center log-in">
        <div class="title-bar">
          <h2>Mengubah kata sandi</h2>
          <p>Masukan password baru anda.</p>
        </div>
        @if ($errors->any())
            <div class="notifikasi-login">
                  <div class="notifikasi-login">
                    {!! implode('', $errors->all('<h2>:message</h2>')) !!}
                  </div>
            </div>
        @endif
       
        @if(empty(session()->get( 'status' )))
        <form action="{{route('changePass.process')}}" method="POST" autocomplete="off">
            {{-- {{route('login.process')}} --}}
          @csrf
          <div class="form-group">
              <input type="hidden" name="token" id="token" class="form-control" disabled required="" value="{{ session()->get( 'token' ) }}">
            <label for="InputEmail">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Masukkan password baru Anda" required=""
              autofocus="">
          </div><br/>
          <div class="form-group">
            <label for="InputEmail">Konfirmasi Password</label>
            <input type="password" name="confirm_password" id="inputConfirmPassword" class="form-control" placeholder="Konfirmasi password baru Anda" required=""
              autofocus="">
          </div><br/>
          <button type="submit" class="btn-login">Ubah Password</button>
        </form>
        @endif
      </div>
    </div>
  </div>
@endsection
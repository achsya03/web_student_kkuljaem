@extends('layouts.auth')

@section('title')
Kkuljaem Korean | Login
@endsection

@section('content')
  <div id="hero-login" class="container">
    <div class="row">
      <div class="col-lg-7 justify-content-center slider">
        <div class="col-lg-12 mx-auto banner">
          <img src="assets/img/Property1.png" height="auto" alt="" srcset="">
          <h1>Belajar dengan Fleksibel</h1>
          <p>Ikuti kelasnya, uji kemampuanmu, dan tanyakan materi yang tidak kamu pahami kapan saja!</p>
        </div>
        <div class="col-lg-12 mx-auto banner justify-content-center">
          <img src="assets/img/Property2.png" height="auto" alt="" srcset="">
          <h1>Berdiskusi Bersama</h1>
          <p>Dapatkan dan bagikan informasi seputar studi dan hobi di Korea Selatan dalam forum</p>
        </div>
        <div class="col-lg-12 mx-auto banner">
          <img src="assets/img/Property3.png" height="auto" alt="" srcset="">
          <h1>Siap?</h1>
          <p>Mari mulai perjalanan bahasa Koreamu dengan Kkuljaem Korean!</p>
        </div>
      </div>
      <div class="col-lg-5 justify-content-center log-in">
        <div class="title-bar">
          <h2>Masuk</h2>
          <p>Masuk untuk melanjutkan</p>
        </div>
        @if ($errors->any())
            <div class="notifikasi-login">
                  <div class="notifikasi-login">
                    {!! implode('', $errors->all('<h2>:message</h2>')) !!}
                  </div>
            </div>
        @endif
        <form action="{{route('login.process')}}" method="POST" autocomplete="off">
          @csrf
          <div class="form-group">
            <label for="InputEmail">Email</label>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Masukkan email Anda" required=""
              autofocus="">
          </div>
          <div class="form-group">
            <label for="InputSandi">Kata Sandi</label>
            <input type="password" name="password" id="inputSandi" class="form-control" placeholder="Masukkan kata sandi Anda"
              required="" >
              <span id="mybutton" onclick="change()"><i class="fas fa-eye"></i></span>
          </div>
          <button type="submit" class="btn-login">Masuk</button>
        </form>
        <h5><a href="{{route('forgot.index')}}">Lupa kata sandi?</a></h5>
        <h6><a href="{{route('register.index')}}">Belum Punya Akun? <span>Daftar</span></a></h6>
      </div>
    </div>
  </div>
@endsection
@section('page-js')
<script type="text/javascript">
    function change() {
        var x = document.getElementById('inputSandi').type;

        if (x == 'password') {
            document.getElementById('inputSandi').type = 'text';
            document.getElementById('mybutton').innerHTML = '<i class="fas fa-eye-slash"></i>';
        } else {
            document.getElementById('inputSandi').type = 'password';
            document.getElementById('mybutton').innerHTML = '<i class="fas fa-eye"></i>';
        }
    }
</script>
@endsection

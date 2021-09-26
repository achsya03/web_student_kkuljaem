@extends('layouts.dashboard')

@section('css')
    <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet" />
@endsection

@section('title')
    {{ env('APP_NAME') }} | Pembayaran
@endsection

@section('content')
<div class="container">
    <div class="text-center mt-5 mb-5 pb-4">
        <img src="../Assets/img/berlangganan.png" alt="LogoPremium" class="img-langganan">
    </div>

    <div class="row ">
        <div class="col-6">
            <div class="content-berlangganan">
                <h2 class="font-weight-bold ">Jadi Member Premium</h2>
                <p class="content-berlangganan">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et eu, diam lacus, turpis non. Eget malesuada tortor at leo. Est aliquam.</p>

                <h4 class="">Keuntungan Menjadi Member Premium</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                <ul>
                    <li>Id arcu tristique id elementum enim, nisl orci ac dis. </li>
                    <li>Elit vulputate venenatis cursus vel in purus morbi. Vitae turpis et enim.</li>
                    <li>Id arcu tristique id elementum enim, nisl orci ac dis. </li>
                    <li>Id arcu tristique id elementum enim, nisl orci ac dis. </li>
                </ul>
            </div>
        </div>
        <div class="col-6 mb-4 ">
            <div id="pilih-paket" class="ml-auto">
                <h3 class="mb-4">Pilihan Paket</h3>
                <input type="radio" id="paket1" name="paket" value="">
                <label for="age1">12 Bulan <b>Rp. 500.000</b></label><br>
                <input type="radio" id="paket2" name="paket" value="">
                <label for="age2">6 Bulan <b>Rp. 250.000</b></label><br>
                <input type="radio" id="paket3" name="paket" value="">
                <label for="age3">3 Bulan <b>Rp. 125.000</b></label><br><br>

                <h6>Punya Reference ID?</h6>
                <div class="input-group mb-5 ">
                    <input type="text" class="form-control input-reference" placeholder="Masukan reference ID..." aria-label="referenceid" aria-describedby="basic-addon1">
                </div>
                <button type="button" class="btn btn-premium d-flex align-items-center" data-toggle="modal" data-target="#modalbayar">Beralih ke Premium</button>

                <!-- Modal -->
                <div class="modal fade" id="modalbayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content" id="detail-pesanan">
                            <h2 class="font-weight-bold mb-5 title-detail"><img src="../Assets/img/icon-detail-pesanan.png" alt=""> Detail Pesanan</h2>

                            <div class="row">
                                <div class="col-8">
                                    <div class="d-flex flex-column">
                                        <p class="mb-0">Label Pesanan</p>
                                        <h4 class="text-uppercase font-weight-bold">Paket Premium 12 Bulan</h4>
                                        <br>
                                        <p class="mb-0">Tanggal Pesanan</p>
                                        <h4 class="text-uppercase font-weight-bold">12 Jan 2021</h4>
                                        <br>
                                        <p class="mb-0">Reference ID</p>
                                        <h4 class="text-uppercase font-weight-bold">JUNK2021</h4>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex flex-column align-items-end">
                                        <p class="mb-0">Label Pesanan</p>
                                        <h4 class="text-uppercase font-weight-bold">Rp 500.000</h4>
                                        <br>
                                        <p class="mb-0">Berakhir</p>
                                        <h4 class="text-uppercase font-weight-bold">- 12 Jan 2022</h4>
                                        <br>
                                        <p class="mb-0">Pemilik</p>
                                        <h4 class="text-uppercase font-weight-bold">JUNKOOK </h4>
                                    </div>
                                </div>
                            </div>
                            <a href="" class="text-center my-4"><button type="button" class="btn btn-pesan mt-5">Pesan Sekarang</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal -->
        </div>

    </div>
</div>
</div>


@endsection

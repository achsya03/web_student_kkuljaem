@extends('layouts.dashboard')

@section('css')
<link href="{{ asset('assets/css/home.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pembayaran.css') }}" rel="stylesheet" />
@endsection

@section('title')
{{ env('APP_NAME') }} | Pembayaran
@endsection

@section('content')
<div class="container" style="height: 70vh">
    {{-- <form class="form theme-form pb-5 f1" action="{{ route('pembayaran.pesan-packet') }}" method="POST">
        @csrf --}}
        <!-- Modal -->
        <div class="modal fade" id="subs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center" role="document">
                    <div class="modal-content" id="detail-pesanan">
                        @if ($status == 'completed')
                        <div class="text-center">
                            <i class="far fa-check-circle fa-5x" style="color: green;"></i>
                        </div>
                        <div class="text-center mt-3">
                            <h2>
                                Pembayaran Berhasil
                            </h2>
                        </div>
                        @endif
                        @if ($status == 'failed')
                        <div class="text-center">
                            <i class="fas fa-times-circle fa-5x" style="color: red;"></i>
                        </div>
                        <div class="text-center mt-3">
                            <h3>
                                Pembayaran tidak dapat diproses
                            </h3>
                        </div>
                        @endif
                        <a class="text-center" href="{{route('dashboard.index')}}"><button class="btn btn-pesan mt-4">Kembali ke Halaman Utama</button></a>
                    </div>
                </div>
            </div>

        </div>
        {{--
    </form> --}}

</div>
@endsection

@section('page-js')
<script>
    $('#subs').modal({backdrop: 'static', keyboard: false});
    $('#subs').modal('show');
</script>
<script>
    $(document).ready(function() {
            $('.slider').slick({
                infinite: true,
                dots: true,
            });
        });
</script>
@endsection
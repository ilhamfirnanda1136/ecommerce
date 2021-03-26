@extends('layouts.front',['title'=>'lihat Transaksi Jogjess cell e-commerce'])
@section('header')
<link rel="stylesheet" href="{{asset('css/transaksi.css')}}">
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h3 class="text-center judul">PROSES TRANSAKSI PEMBELIAN</h3>
                <div class="card-head">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active nav-bayar" id="nav-bayar-tab" data-toggle="tab" href="#nav-bayar" role="tab" aria-controls="nav-bayar" aria-selected="false">{{strtoupper('belum bayar')}}</a>
                            <a class="nav-item nav-link nav-kirim" id="nav-kirim-tab" data-toggle="tab" href="#nav-kirim" role="tab" aria-controls="nav-kirim" aria-selected="false">{{strtoupper('dikirim')}}</a>
                            <a class="nav-item nav-link nav-selesai" id="nav-selesai-tab" data-toggle="tab" href="#nav-selesai" role="tab" aria-controls="nav-selesai" aria-selected="false">{{strtoupper('selesai')}}</a>
                        </div>
                    </nav>
                </div>
                <div class="card-body">
                    <section id="tabs" class="project-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-bayar" role="tabpanel">
                                        faw
                                    </div>
                                    <div class="tab-pane fade " id="nav-kirim" role="tabpanel">
                                        sd
                                    </div>
                                    <div class="tab-pane fade " id="nav-selesai" role="tabpanel">
                                        sda
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('footer')
@endsection
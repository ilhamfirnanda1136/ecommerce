@extends('layouts.front',['title'=>'lihat produk Jogjess cell e-commerce'])
@section('header')
@stop
@section('content')
<div class="row mb-5">
    <div class="col-md-4">
        <img src="{{asset('images/produk')}}/{{$produk->gambar}}" alt="{{$produk->nama_produk}}" style="width:100%" >
    </div>
    <div class="col-md-6" style="margin-top:50px">
        <h2>{{$produk->nama_produk}}</h2>
        <h4>Merk  : {{$produk->merk->nama_merk}}</h4>
        <h4>Warna : {{$produk->warna}}</h4>
        <h5>Rp.{{number_format($produk->harga,0,'','.')}}</h5>
        Spesifikasi <br> <hr>
        <p>{{$produk->spesifikasi}}</p>
        Keterangan <br><hr>
        <p>{{$produk->keterangan}}</p>
          @if($produk->stok > 0)
        <a href="{{url('produk/add/cart/')}}/{{$produk->uuid}}" class="btn btn-outline-dark"><i class="fa fa-cart-plus"></i> Tambah ke Keranjang</a>
        @else
        <span class="badge badge-secondary">Stok habis</span>
        @endif
    </div>
</div>
@endsection
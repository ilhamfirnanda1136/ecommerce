@extends('layouts.front',['title'=>'Beranda Jogjess cell e-commerce'])
@section('header')
@stop
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            @if($produk->count()>0)
                @foreach($produk as $m)
                <div class="form-group col-lg-3 col-sm-12 col-md-4 ">
                    <div class="card" style="width: 100%; height:100%;">
                        <?php
                            if($m->gambar == null) {
                                $foto = url('images/noimages.jpg');
                            } else {
                                $foto = url('images/produk')."/".$m->gambar;
                            }
                        ?>
                        <img src="{{$foto}}" class="card-img-top" alt="{{$m->nama_produk}}" style="height: 50%;">
                        <div class="card-body">
                            <h4 class="card-title text-center">{{$m->nama_produk}}</h4>
                            <h5 class="card-title">Merk : {{$m->merk->nama_merk}}</h5>
                            <h5 class="card-title">Harga : Rp.{{number_format($m->harga,0,'','.')}}</h5>
                            <h5 class="card-title">Stok : {{$m->stok}} </h5>
                            @if($m->stok > 0)
                                 <a href="{{url('produk/add/cart/')}}/{{$m->uuid}}" class="btn btn-sm btn-danger btn-cart" data-id="{{$m->id}}"><i class="fa fa-shopping-cart"></i></a>
                            @else
                                <span class="badge badge-secondary">Stok habis</span>
                            @endif
                            <a href="{{url('produk/view/')}}/{{$m->uuid}}" class="btn btn-sm btn-primary btn-detail" data-id="{{$m->id}}"><i
                                    class="fa fa-eye"></i></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else 
                <div class="col-md-12">
                    <h1 class="text-center">Tidak ada Produk</h1>
                </div>
            @endif
        </div>
    </div>
    <div class="text-center">
        @include('admin.customer.paginate', ['paginator' => $produk])
    </div>
</div>
@stop
@section('footer')
<script>
    document.addEventListener('DOMContentLoaded',function(){

    });
</script>
@endsection

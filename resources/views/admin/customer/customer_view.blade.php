@extends('layouts.back',['title'=>'pelanggan admin e-commerce'])
@section('header')
@stop
@section('content')
<div class="container-fluid" style="margin-top: -50px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Pelanggan/Customer </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($customer as $m)
                        <div class="col-lg-3 col-sm-12 col-md-4 ">
                            <?php
                                if($m->avatar == null) {
                                    $foto = url('images/guest.png');
                                } else {
                                    $foto = url("images/customer/".$m->avatar);
                                }
                            ?>
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="{{$foto}}"
                                            alt="{{$m->nama}}">
                                    </div>
                                    <h3 class="profile-username text-center">{{$m->nama}}</h3>
                                    <p class="text-muted text-center">{{$m->email}}</p>
                                    <p class="text-muted text-center">{{$m->username}}</p>
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Tanggal Daftar</b> <a class="float-right">{{$m->created_at->format("d-m-Y")}}</a>
                                        </li>
                                    </ul>
                                    <a href="{{url('pelanggan/detail')}}/{{$m->uuid}}" class="btn btn-sm btn-primary btn-detail col-md-12" data-id="{{$m->id}}"><i class="fa fa-info"></i> Detail</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                 @include('admin.customer.paginate', ['paginator' => $customer])
            </div>
        </div>
    </div>
</div>
@endsection

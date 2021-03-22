@extends('layouts.back',['title'=>'detail pelanggan admin e-commerce'])
@section('header')
@stop
@section('content')
<div class="container-fluid" style="margin-top: -50px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Profile Pelanggan e-commerce</h4>
                </div>
                <div class="card-body table-responsive">
                    <?php
                            if($customer->avatar == null ) {
                                $foto = url('images/guest.png');
                            }  else {
                               $foto = url("images/customer/".$customer->avatar);
                            }    
                        ?>
                    <center>
                        <div class="d-inline p-2 mb-2" id="foto">
                            <img src="{{$foto}}" width="120px">
                        </div>
                    </center>
                    <form action="{{url('/customer/simpan/profile')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="idcustomer" value="{{$customer->id}}">
                        <table class="table table-hover table-bordered mt-2">
                            <tr>
                                <td>Nama Pelanggan</td>
                                <td>:</td>
                                <td>{{$customer->nama}}</td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>:</td>
                                <td>{{$customer->username}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{$customer->email}}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{$customer->alamat}}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td>{{$customer->gender == 1 ? 'Laki-Laki' : 'Perempuan'}}</td>
                            </tr>
                            <tr>
                                <td>Nomor Telpon</td>
                                <td>:</td>
                                <td>{{$customer->no_telp}}</td>
                            </tr>
                            <tr>
                                <td>Provinsi</td>
                                <td>:</td>
                                <td>{{$customer->provinsi->nama_provinsi}}</td>
                            </tr>
                            <tr>
                                <td>Kabupaten</td>
                                <td>:</td>
                                <td>{{$customer->kabupaten->nama_kabupaten}}</td>
                            </tr>
                            <tr>
                                <td>Kode Pos</td>
                                <td>:</td>
                                <td>{{$customer->kode_pos}}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Daftar</td>
                                <td>:</td>
                                <td>{{$customer->created_at->format("d-m-Y")}}</td>
                            </tr>
                        </table>
                        <div class="row">
                            <a  href="{{url('pelanggan')}}" class="btn btn-warning col-md-12 mt-2 mb-2"><i
                                    class="fa fa-backward"></i> Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
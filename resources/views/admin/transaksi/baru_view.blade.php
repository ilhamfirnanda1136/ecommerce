@extends('layouts.back',['title'=>'Transaksi Baru Jogjest Cell'])
@section('content')
<div class="container-fluid" style="margin-top: -50px;">
    <div class="row">
        <div class="col-md-12 ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Transaksi Baru Datang </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table width="100%" id="table-transaksi" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NO Transaksi</th>
                                        <th>Nama Customer</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Alamat Pengiriman</th>
                                        <th>Pesan</th>
                                        <th>Produk</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1;  @endphp
                                    @foreach($transaksi as $t)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$t->no_transaksi}}</td>
                                        <td>{{$t->customer->nama}}</td>
                                        <td>{{$t->created_at->format("d-m-Y")}}</td>
                                        <td>{{$t->alamat_pengiriman == null ? Session::get('customer')->alamat : $t->alamat_pengiriman}}</td>
                                        <td>{{$t->pesan}}</td>
                                        <td><button class="btn btn-md btn-primary btn-produk" data-id="{{$t->id}}">Total Produk</button></td>
                                        <td> <a href="{{url('transaksi/pdf/')}}/{{$t->id}}" target="_blank" class="btn btn-danger btn-md text-white"><i class="fa fa-download"></i> Download PDF</a>
                                        @if($t->bukti == null)
                                        <button class="btn btn-md btn-warning btn-upload" data-id="{{$t->id}}" data-transaksi="{{$t->no_transaksi}}"><i class="fa fa-upload"></i> Upload Bukti</button></td>
                                        @else
                                        <span class="badge badge-success">Mohon Tunggu Konfirmasi Admin</span>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>NO Transaksi</th>
                                        <th>Nama Customer</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Alamat Pengiriman</th>
                                        <th>Pesan</th>
                                        <th>Produk</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    </div>
</div>
@stop
@section('footer')
<script>
    $('document').ready(function(){
        $('#table-transaksi').dataTable();

    })
</script>
@endsection
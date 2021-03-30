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
                                        <div class="float-right mb-3 ">
                                           
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>NO Transaksi</th>
                                                        <th>Tanggal Transaksi</th>
                                                        <th>Alamat Pengiriman</th>
                                                        <th>Pesan</th>
                                                        <th>Produk</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $no = 1;  @endphp
                                                    @foreach ($transaksi as $t)
                                                        <tr>
                                                            <td>{{$no++}}</td>
                                                            <td>{{$t->no_transaksi}}</td>
                                                            <td>{{$t->created_at->format("d-m-Y")}}</td>
                                                            <td>{{$t->alamat_pengiriman == null ? Session::get('customer')->alamat : $t->alamat_pengiriman}}</td>
                                                            <td>{{$t->pesan}}</td>
                                                            <td><button class="btn btn-md btn-primary btn-produk" data-id="{{$t->id}}">Total Produk</button></td>
                                                            <td> <a href="" class="btn btn-danger btn-md text-white"><i class="fa fa-download"></i> Download PDF</a>  <button class="btn btn-md btn-success btn-upload">Upload Bukti</button></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
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

  <!-- Modal Produk-->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Transaksi Produk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body table-responsive" id="modal-produk">
            <table class="table table-bordered table-hover" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Jumlah Beli</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody id="table-produk"></tbody>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@stop
@section('footer')
<script>
    const url = "{{url('')}}";
    $(document).ready(function(){
        /* produk view */
        $('body').on('click','.btn-produk',function(){
            const id = $(this).data('id');
            fetch(`${url}/transaksi/produk/${id}`)
            .then(res => res.json())
            .then(data => {
                console.log(data);
            });
        })
    });

</script>
@endsection
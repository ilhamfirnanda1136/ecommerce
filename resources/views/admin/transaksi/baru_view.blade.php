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
                                        <th>Bukti Bayar</th>
                                        <th>Status</th>
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
                                        <td>
                                        @if($t->bukti != null)
                                        <a href="{{asset('images/bukti/')}}/{{$t->bukti}}" class="btn btn-md btn-success btn-upload" target="_blank">Bukti Bayar</a>
                                        @else
                                        <span class="badge badge-danger">Customer belum Mengupload Bukti Bayar</span>
                                        @endif
                                        </td>
                                        <td>
                                            <button class="btn-md btn btn-primary" data-id="{{$t->id}}">Konfirmasi Pemesanan</button>
                                        </td>
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
                                        <th>Bukti Bayar</th>
                                        <th>Status</th>
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

  <!-- Modal Produk-->
  <div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
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
                        <th>Foto Produk</th>
                        <th>Nama Produk</th>
                        <th>Harga Produk</th>
                        <th>Jumlah Beli</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody id="table-produk"></tbody>
            </table>
        </div>
        <div class="modal-footer">
            <h5 class="modal-title" id="total-nilai"></h5>
        </div>
      </div>
    </div>
  </div>

    <!-- Modal Kirim-->
    <div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Transaksi Produk</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body table-responsive" id="modal-produk">
                
            </div>
            <div class="modal-footer">
                <h5 class="modal-title" id="total-nilai"></h5>
            </div>
          </div>
        </div>
      </div>

@stop
@section('footer')
<script>
    $('document').ready(function(){
        $('#table-transaksi').dataTable();
        const url = "{{url('')}}";

        /* produk view */
        $('body').on('click','.btn-produk',function(){
            const id = $(this).data('id');
            fetch(`${url}/transaksi/produk/${id}`)
            .then(res => res.json())
            .then(data => {
                const {transaksi:[{cart}]} = data;
                let html  = '';
                let total = 0;
                cart.map((data,index)=>{
                    const {jumlah_beli,total_harga,produk:{nama_produk,gambar,harga}} = data;
                    const image = gambar == null ? "{{url('images/noimage.jpg')}}" : "{{asset('images/produk')}}"+"/"+gambar;
                    html += `
                        <tr>
                            <td>${++index}</td>
                            <td><img src="${image}" width="50" alt="${nama_produk}" /></td>
                            <td>${nama_produk}</td>
                            <td>RP.${formatAngka(harga)}</td>
                            <td>${jumlah_beli} Buah</td>
                            <td>RP.${formatAngka(total_harga)}</td>
                        </tr>`;
                    total += parseInt(total_harga);
                }); 
                $('#table-produk').html(html);
                $('#total-nilai').text(`Total Harga : ${formatAngka(total)}`);
                $('#modal-detail').modal({backdrop:'static'});
            });
        })


    })
</script>
@endsection
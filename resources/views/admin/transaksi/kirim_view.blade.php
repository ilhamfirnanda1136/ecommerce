@extends('layouts.back',['title'=>'Transaksi Baru Jogjest Cell'])
@section('content')
<div class="container-fluid" style="margin-top: -50px;">
    <div class="row">
        <div class="col-md-12 ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Transaksi Sedang dikirim </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table width="100%" id="table-transaksi" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>No Transaksi</th>
                                        <th>Tanggal Sampai</th>
                                        <th>Keterangan Sampai</th>
                                        <th>Nama Customer</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Alamat Pengiriman</th>
                                        <th>Pesan</th>
                                        <th>Produk</th>
                                        <th>Bukti Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1;  @endphp
                                    @foreach($transaksi as $t)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$t->no_transaksi}}</td>
                                         <td>{{Helper::formatTanggal($t->kirim[0]->tanggal_sampai)}}</td>
                                        <td>{{$t->kirim[0]->keterangan}}</td>
                                        <td>{{$t->customer->nama}}</td>
                                        <td>{{$t->created_at->format("d-m-Y")}}</td>
                                        <td>{{$t->alamat_pengiriman == null ? Session::get('customer')->alamat : $t->alamat_pengiriman}}</td>
                                        <td>{{$t->pesan}}</td>
                                        <td><button class="btn btn-md btn-primary btn-produk" data-id="{{$t->id}}">Total Produk</button></td>
                                        <td>
                                        <a href="{{asset('images/bukti/')}}/{{$t->bukti}}" class="btn btn-md btn-success btn-upload" target="_blank">Bukti Bayar</a>
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
    <div class="modal fade" id="modal-kirim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post"  >
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Kirim Transaksi Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="">Tanggal Estimasi Sampai</label>
                        <input type="date" name="tanggal_sampai" id="tanggal_sampai" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim Produk</button>
                </div>
            </form>
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
        });

        $('body').on('click','.btn-konfirmasi',function(){
            $('#modal-kirim').modal({backdrop:'static'});
            $('#id').val($(this).data('id'));
        })


    })
</script>
@endsection
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
                                                    @if($transaksi->count() == 0) 
                                                        <tr>
                                                            <td colspan="7" align="center">Tidak ada transaksi</td>
                                                        </tr>
                                                    @else
                                                        @foreach ($transaksi as $t)
                                                        <tr>
                                                            <td>{{$no++}}</td>
                                                            <td>{{$t->no_transaksi}}</td>
                                                            <td>{{$t->created_at->format('d-m-Y')}}</td>
                                                            <td>{{$t->alamat_pengiriman == null ? Session::get('customer')->alamat : $t->alamat_pengiriman}}</td>
                                                            <td>{{$t->pesan}}</td>
                                                            <td><button class="btn btn-md btn-primary btn-produk" data-id="{{$t->id}}">Total Produk</button></td>
                                                            <td> <a href="{{url('transaksi/pdf/')}}/{{$t->id}}" target="_blank" class="btn btn-danger btn-md text-white"><i class="fa fa-download"></i>Laporan</a>
                                                            @if($t->bukti == null)
                                                            <button class="btn btn-md btn-warning btn-upload" data-id="{{$t->id}}" data-transaksi="{{$t->no_transaksi}}"><i class="fa fa-upload"></i> Upload Bukti</button></td>
                                                            @else
                                                            <span class="badge badge-success">Mohon Tunggu Konfirmasi Admin</span>
                                                            @endif
                                                        </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="nav-kirim" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>NO Transaksi</th>
                                                        <th>Tanggal Sampai</th>
                                                        <th>Keterangan Sampai</th>
                                                        <th>Tanggal Transaksi</th>
                                                        <th>Alamat Pengiriman</th>
                                                        <th>Pesan</th>
                                                        <th>Produk</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $no = 1;  @endphp
                                                    @if($transaksiKirim->count() == 0) 
                                                        <tr>
                                                            <td colspan="9" align="center">Tidak ada transaksi</td>
                                                        </tr>
                                                    @else
                                                        @foreach ($transaksiKirim as $t)
                                                        <tr>
                                                            <td>{{$no++}}</td>
                                                            <td>{{$t->no_transaksi}}</td>
                                                            <td>{{Helper::formatTanggal($t->kirim[0]->tanggal_sampai)}}</td>
                                                            <td>{{$t->kirim[0]->keterangan}}</td>
                                                            <td>{{$t->created_at->format('d-m-Y')}}</td>
                                                            <td>{{$t->alamat_pengiriman == null ? Session::get('customer')->alamat : $t->alamat_pengiriman}}</td>
                                                            <td>{{$t->pesan}}</td>
                                                            <td><button class="btn btn-md btn-primary btn-produk" data-id="{{$t->id}}">Total Produk</button></td>
                                                            <td> 
                                                                <a href="{{url('transaksi/pdf/')}}/{{$t->id}}" target="_blank" class="btn btn-danger btn-md text-white"><i class="fa fa-download"></i>Laporan</a>
                                                                <button class="btn btn-md btn-secondary btn-konfirmasi" data-id="{{$t->id}}" > Konfirmasi Sampai</button>
                                                            </td>
                                                          
                                                        </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="nav-selesai" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>NO Transaksi</th>
                                                        <th>Tanggal Sampai</th>
                                                        <th>Keterangan Sampai</th>
                                                        <th>Tanggal Transaksi</th>
                                                        <th>Alamat Pengiriman</th>
                                                        <th>Pesan</th>
                                                        <th>Produk</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $no = 1;  @endphp
                                                    @if($transaksiSelesai->count() == 0) 
                                                        <tr>
                                                            <td colspan="9" align="center">Tidak ada transaksi</td>
                                                        </tr>
                                                    @else
                                                        @foreach ($transaksiSelesai as $t)
                                                        <tr>
                                                            <td>{{$no++}}</td>
                                                            <td>{{$t->no_transaksi}}</td>
                                                            <td>{{Helper::formatTanggal($t->kirim[0]->tanggal_sampai)}}</td>
                                                            <td>{{$t->kirim[0]->keterangan}}</td>
                                                            <td>{{$t->created_at->format('d-m-Y')}}</td>
                                                            <td>{{$t->alamat_pengiriman == null ? Session::get('customer')->alamat : $t->alamat_pengiriman}}</td>
                                                            <td>{{$t->pesan}}</td>
                                                            <td><button class="btn btn-md btn-primary btn-produk" data-id="{{$t->id}}">Total Produk</button></td>
                                                            <td> 
                                                                <a href="{{url('transaksi/pdf/')}}/{{$t->id}}" target="_blank" class="btn btn-danger btn-md text-white"><i class="fa fa-download"></i>Laporan</a>
                                                            </td>
                                                          
                                                        </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
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


    <!-- Modal -->
    <div class="modal fade" id="modal-foto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
         <form action="{{url('transaksi/upload/bukti')}}" method="post" id="formUpload"  enctype="multipart/form-data" >
            @csrf
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="title-bayar">Upload Bukti Bayar</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <div class="modal-body">
                   <input type="hidden" name="id" id="id">
                   <div id="foto-update"></div>
                   <div class="form-group">
                       <input type="file" name="foto" id="foto" accept=".jpg,.png,.jpeg,.pdf" class="form-control" required>
                   </div>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="submit" id="simpan-update" class="btn btn-primary">Save changes</button>
               </div>
             </div>
         </form>
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
                        </tr>
                    `;
                    total += parseInt(total_harga);
                }); 
                $('#table-produk').html(html);
                $('#total-nilai').text(`Total Harga : ${formatAngka(total)}`);
                $('#modal-detail').modal({backdrop:'static'});
            });
        })

        /* upload Bukti */
        $('body').on('click','.btn-upload',function(){
            const id = $(this).data('id');
            const transaksi = $(this).data('transaksi');
            $('#title-bayar').text(`Upload Bukti Bayar No transaksi : ${transaksi}`);
            $('#id').val(id);
            $('#modal-foto').modal({backdrop:'static'});
        });

        /* konfirmasi barang datang */
        $('body').on('click','.btn-konfirmasi',function(){
            const id = $(this).data('id');
            swal({
              title: "Yakin?",
              text: "anda yakin ingin mengkonfirmasi produk telah sampai??",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                window.location="{{url('transaksi/konfirmasi/')}}/"+id;
              } else {
                swal("Anda membatalkan mengkonfirmasi data");
              }
            });
        });

    });

</script>
@endsection
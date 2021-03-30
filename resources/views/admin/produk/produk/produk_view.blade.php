@extends('layouts.back',['title'=>'produk Jogjest Cell'])
@section('content')
<div class="container-fluid" style="margin-top: -50px;">
    <div class="row">
        <div class="col-md-12 ">
            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Form produk </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" id="formProduk" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nama">Nama produk *</label>                         
                                <input type="text" class="form-control" name="nama_produk" id="nama_produk"
                                    placeholder="Masukkan Nama produk">
                                <span class="text-danger nama_produk"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Spesifikasi *</label>
                            <textarea  name="spesifikasi" id="spesifikasi" class="form-control" placeholder="Masukkan Spesifikasi"></textarea>
                            <span class="text-danger spesifikasi"></span>
                        </div>   
                        <div class="form-group col-md-6">
                            <label>Warna *</label>
                            <input type="text" name="warna" id="warna" class="form-control" placeholder="Masukkan Warna">
                            <span class="text-danger warna"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Merk *</label>
                            <select name="merk_id" id="merk_id" class="form-control">
                                @foreach ($merk as $m)
                                    <option value="{{$m->id}}">{{$m->nama_merk}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Keterangan *</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan Keterangan"></textarea>
                            <span class="text-danger keterangan"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Harga *</label>
                            <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukkan Harga" />
                            <span class="text-danger harga"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Stok Awal (boleh dikosongi)</label>
                            <input type="number" name="stok" id="stok" class="form-control" placeholder="Masukkan Stok" />
                            <span class="text-danger stok"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Foto (boleh dikosongi)</label>
                            <input type="file" name="gambar" class="form-control" id="gambar" >
                            <span class="text-danger gambar"></span>
                        </div>
                        <div class="form-group col-md-6">
                           <img src="{{asset('images/guest.png')}}" width="100" src="70" id="image">
                        </div>
                    </div>
                 </div>
                    <!-- /.card-body -->
                    <div class="card-footer" style="margin-top: -31px">
                        <button type="button" id="simpan" class="btn btn-danger col-md-12"><i class="fa fa-save"></i>
                            Simpan</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data produk </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table width="100%" id="table-produk" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor produk</th>
                                    <th>Foto produk</th>
                                    <th>Merk Produk</th>
                                    <th>Nama produk</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Spesifikasi</th>
                                    <th>Warna</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor produk</th>
                                    <th>Foto produk</th>
                                    <th>Merk Produk</th>
                                    <th>Nama produk</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Spesifikasi</th>
                                    <th>Warna</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="edit-modal-produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" id="formProdukEdit">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit_id">
                    @csrf
                       <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nama">Nama produk *</label>                         
                                <input type="text" class="form-control" name="nama_produk" id="edit_nama_produk"
                                    placeholder="Masukkan Nama produk">
                                <span class="text-danger edit_nama_produk"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Spesifikasi *</label>
                            <textarea type="text" name="spesifikasi" id="edit_spesifikasi" class="form-control" placeholder="Masukkan Spesifikasi"></textarea>
                            <span class="text-danger edit_spesifikasi"></span>
                        </div>   
                        <div class="form-group col-md-6">
                            <label>Warna *</label>
                            <input type="text" name="warna" id="edit_warna" class="form-control" placeholder="Masukkan Warna">
                            <span class="text-danger edit_warna"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Merk *</label>
                            <select name="merk_id" id="edit_merk_id" class="form-control">
                                @foreach ($merk as $m)
                                    <option value="{{$m->id}}">{{$m->nama_merk}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Keterangan *</label>
                            <textarea name="keterangan" id="edit_keterangan" class="form-control" placeholder="Masukkan Keterangan"></textarea>
                            <span class="text-danger edit_keterangan"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Harga *</label>
                            <input type="number" name="harga" id="edit_harga" class="form-control" placeholder="Masukkan Harga" />
                            <span class="text-danger edit_harga"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Foto</label>
                            <input type="file" name="gambar" class="form-control" id="gambar" >
                            <span class="text-danger edit_gambar"></span>
                        </div>
                        <div class="form-group col-md-6">
                             <div class="gambar "></div>
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" id="simpan-edit" class="btn btn-danger col-md-12"><i class="fa fa-save"></i>
                        Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="edit-modal-stok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" id="formStok">
                <div class="modal-header">
                    <h5 class="modal-title" id="title-edit-stok"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit_id_stok">
                    <input type="hidden" name="edit_stok" id="edit_stok">
                    @csrf
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="number" name="stok" class="form-control" id="edit_stok" placeholder="Masukkan Jumlah Stok yang masuk/kurang" >
                            <span class="text-danger edit_stok"></span>
                        </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" id="simpan-stok" class="btn btn-danger col-md-12"><i class="fa fa-save"></i>
                        Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop
@section('footer')
<script type="text/javascript">
    function bacaLink(inputan,image) {
        if (inputan.files && inputan.files[0]) {
            var baca=new FileReader();
            baca.onload=function(e)
            {
                image.attr('src',e.target.result);
                image.hide();
                image.fadeIn(650);
            }
            baca.readAsDataURL(inputan.files[0]);
        }
    }
    const simpanproduk = (edit = false) => {
        const form = edit === true ? $('#formProdukEdit')[0] : $('#formProduk')[0];
        const formData = new FormData(form);
        $.ajax({
            url: "{{route('simpan.produk')}}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            beforeSend: function () {
                loading();
            },
            success: function (data) {
                matikanLoading();
                if ($.isEmptyObject(data.errors)) {
                    $.each(data.success, function (key) {
                        hapusvalidasi(key,edit);
                    });
                    swal({
                        title: "Pesan!",
                        text: data.message,
                        icon: "success",
                    });
                    form.reset();
                    $('#edit-modal-produk').modal('hide');
                    $('#table-produk').DataTable().ajax.reload();
                } else {
                    $.each(data.errors, function (key, value) {
                        hapusvalidasi(key,edit);
                        tambahvalidasi(key,edit,value);
                    });
                    swal({
                        title: "Pesan!",
                        text: "dimohon untuk mengisi data dengan benar !",
                        icon: "error",
                    });
                }
            },
        })
    }

    const updateStok = (type,id) => {
        $("#edit_id_stok").val(id);
        if (type === 'increase') $('#title-edit-stok').text(`Tambah Stok Produk`)
        else $('#title-edit-stok').text(`Kurangi Stok Produk`)
        $('#edit_stok').val(type);
        $('#edit-modal-stok').modal({backdrop:'static'})
    };

    const simpanStok = () => {
        const form = $('#formStok')[0];
        const formData =new FormData(form);
        $.ajax({
            url: "{{route('simpan.stok.produk')}}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            beforeSend: function () {
                loading();
            },
            success: function (data) {
                matikanLoading();
                if ($.isEmptyObject(data.errors)) {
                    $.each(data.success, function (key) {
                        hapusvalidasi(key,true);
                    });
                    swal({
                        title: "Pesan!",
                        text: data.message,
                        icon: "success",
                    });
                    form.reset();
                    $('#edit-modal-stok').modal('hide');
                    $('#table-produk').DataTable().ajax.reload();
                } else {
                    $.each(data.errors, function (key, value) {
                        hapusvalidasi(key,true);
                        tambahvalidasi(key,true,value);
                    });
                    swal({
                        title: "Pesan!",
                        text: "dimohon untuk mengisi data dengan benar !",
                        icon: "error",
                    });
                }
            },
        })
    };



    $(document).ready(function () {

        $('#gambar').change(function(){
            bacaLink(this,$('#image'));
        });

         $('#edit_foto').change(function(){
            bacaLink(this,$('.gambar'));
        });

        $('#simpan').click(simpanproduk);

        $('#simpan-edit').click(function () {
            simpanproduk(true);
        });

        $('body').on('click','.btn-decrease',function(){
            updateStok("decrease",$(this).data('id'));
        });

        $('body').on('click','.btn-increase',function(){
            updateStok("increase",$(this).data('id'));
        });

        $('#simpan-stok').click(simpanStok);

        $('#table-produk').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,   
            ajax: "{{route('table.produk')}}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id'
                },
                {
                    data: 'no_produk',
                    name: 'no_produk'
                },
                {
                    data: 'gambar_produk',
                    name: 'gambar_produk'
                },
                {
                    data: 'nama_merk',
                    name: 'merk.nama_merk'
                },
                {
                    data: 'nama_produk',
                    name: 'nama_produk'
                },
                {
                    data: 'stok_produk',
                    name: 'stok_produk'
                },
                {
                    data: 'harga_produk',
                    name: 'harga_produk'
                },
                {
                    data: 'spesifikasi',
                    name: 'spesifikasi'
                },
                {
                    data: 'warna',
                    name: 'warna'
                },
                {
                    data: 'keterangan',
                    name: 'keterangan'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ],
            "order": [
                [0, "desc"]
            ],
        });

        $('body').on('click', '.btn-edit', function () {
           const id = $(this).data('id');
           const url = "{{url('produk/ambil')}}/"+id;
           fetch(url)
           .then(res => res.json())
           .then(data => {
               for (const i in data) {
                   if (i !== null && i !== 'created_at' && i !== 'updated_at' && i !== 'gambar' && i !== 'no_produk' && i !== 'uuid' && i !== 'stok' ) {
                       document.getElementById(`edit_${i}`).value = data[i];
                   }
                }
                if (data.gambar == null) {
                    $('.gambar').children().remove();
                } else {
                    $('.gambar').html(`
                    <img src="{{asset('images/produk/`+data.gambar`')}}" class="float-left edit_gambar" width="70" height="70">
                    `);
                }
                $('#edit-modal-produk').modal({backdrop:'static'});
           })
        });
          
    })

</script>
@endsection
 
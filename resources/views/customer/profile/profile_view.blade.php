@extends('layouts.front',['title'=>'Profile Customer'])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Profile Customer</h4>
                </div>
                <div class="card-body table-responsive">
                    <?php
                            if(Session::get('customer')->avatar == null) {
                                $foto = url('images/guest.png');
                            } else {
                                $foto =url('images/avatar/'.Session::get('customer')->avatar);
                            } 
                        ?>
                    <center>
                        <div class="d-inline p-2 mb-2" id="foto">
                            <img src="{{$foto}}" width="120px">
                            <button class="btn btn-md btn-warning" data-id="" id="btn-update"><i class="fa fa-camera"></i></button>
                        </div>
                    </center>
                     <form action="" method="post" id="formRegister">
                         @csrf
                        <div class="row">
                            <div class="form-group col-md-6 ">
                                <label for="nama">Nama *</label>
                                <input type="text" class="form-control" name="nama" id="nama"
                                    placeholder="Masukkan Nama Anda" value="{{$customer->nama}}" required>
                                <span class="text-danger nama"></span>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="username">Username *</label>
                                <input type="text" class="form-control" name="username" id="username"
                                    placeholder="Masukkan Username" value="{{$customer->username}}" required>
                                <span class="text-danger username"></span>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Masukkan email" value="{{$customer->email}}" required>
                                <span class="text-danger email"></span>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="gender">Jenis Kelamin *</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="1" {{$customer->gender == 1 ? 'selected' : ''}}>Laki-Laki</option>
                                    <option value="2" {{$customer->gender == 2 ? 'selected' : ''}}>Perempuan</option>
                                </select>
                                <span class="text-danger gender"></span>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="no_telp">No Telpon *</label>
                                <input type="text" name="no_telp" id="no_telp" class="form-control"
                                    placeholder="masukkan telpon" value="{{$customer->no_telp}}" required>
                                <span class="text-danger no_telp"></span>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="alamat">Alamat *</label>
                                <textarea name="alamat" id="alamat" class="form-control"
                                    placeholder="masukkan alamat" required>{{$customer->alamat}}</textarea>
                                <span class="text-danger alamat"></span>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="provinsi_id">Provinsi *</label>
                                <select name="provinsi_id" id="provinsi_id" class="form-control">
                                    <option value="">--Pilih Provinsi--</option>
                                    @foreach($provinsi as $p)
                                        <option value="{{$p->id}}" {{$customer->provinsi_id == $p->id ? 'selected' : ''}}>{{$p->nama_provinsi}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger provinsi_id"></span>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="kabupaten_id">kabupaten/kota *</label>
                                <select name="kabupaten_id" id="kabupaten_id" class="form-control"> 
                                      @foreach($kabupaten as $k)
                                        <option value="{{$k->id}}" {{$customer->kabupaten_id == $k->id ? 'selected' : ''}}>{{$k->nama_kabupaten}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger kabupaten_id"></span>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="kode_pos">Kode Pos *</label>
                                <input type="text" name="kode_pos" id="kode_pos" class="form-control"
                                    placeholder="masukkan kode pos" value="{{$customer->kode_pos}}" required>
                                <span class="text-danger kode_pos"></span>
                            </div>
                            <button type="submit" class="btn btn-primary btn-md text-center col-md-12"
                                id="btn-profile"><i class="fa fa-edit"></i> Update Profil</button>
                        </div>
                     </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="modal-foto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
     <form action="" method="post" id="formUpload"  enctype="multipart/form-data" onsubmit="event.preventDefault()">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Update Foto</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
               <input type="hidden" name="id" id="id">
               <div id="foto-update"></div>
               <div class="form-group">
                   <input type="file" name="foto" id="foto" accept=".jpg,.png,.jpeg" class="form-control">
               </div>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <button type="button" id="simpan-update" class="btn btn-primary">Save changes</button>
           </div>
         </div>
     </form>
    </div>
  </div>


@stop
@section('footer')
<script>
    $(document).ready(function(){
        $('body').on('click','#btn-update',function(){
            const id = $(this).data('id');
            $.ajax({
                url:"{{url('detail/member')}}",
                method:"GET",
                data:{
                    id:id
                },
                dataType:'JSON',
                success:function(datas) {
                    const data = datas.member;
                    $('#id').val(id);
                    if(data.foto != '')
                    {
                        $('#foto-update').html(`<img src="http://dpd.asppi.or.id/foto/${data.foto}" width="120px">`);
                    } else {
                        $('#foto-update').html(`<img src="{{url('images/noimage.jpg')}}" width="120px">`);
                    }
                    $('#modal-foto').modal({backdrop:'static'});
                }
            })
        });

        $('#simpan-update').click(function(){
            let form = $('#formUpload')[0];
            let formData = new FormData(form);
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                url: "https://dpd.asppi.or.id/updatefoto.php",
                beforeSend: function () {
                  loading();
                },
                success: function (data) {
                    matikanLoading();
                    if(data.status == 'success') {
                        $('#modal-foto').modal('hide');
                        swal({
                            title: "Pesan!",
                            text: data.messages,
                            icon: "success",
                        }).then(function(){
                            location.reload();
                        });
                    } else {
                        swal({
                            title: "Pesan!",
                            text: data.messages,
                            icon: "error",
                        })
                    }
                },
                error:function() {
                    matikanLoading();
                    alert('maaf ada kesalahan server');
                }
            })
        });
        
        const url = "{{url('')}}";

        $('#provinsi_id').change(function(){
            var provinsi = $('#provinsi_id').val();
            fetch(`${url}/api/kabupaten/${provinsi}`)
            .then(res => res.json())
            .then(data => {
                if (data.status == 404) {
                     $('#kabupaten_id').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                } else {
                      $("#kabupaten_id").html('');
                    data.kabupaten.map(kabupaten => {
                        $('#kabupaten_id').append($('<option>').text(kabupaten.nama_kabupaten).attr('value', kabupaten.id));
                    });
                }
            })
        });
    })
</script>
@endsection

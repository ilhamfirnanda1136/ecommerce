@extends('layouts.front',['title'=>'Sign Up Jogjess Cell'])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">Sign Up Customer</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post" id="formRegister">
                        <div class="row">
                            <div class="form-group col-md-6 ">
                                <label for="nama">Nama *</label>
                                <input type="text" class="form-control" name="nama" id="nama"
                                    placeholder="Masukkan Nama Anda">
                                <span class="text-danger nama"></span>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="username">Username *</label>
                                <input type="text" class="form-control" name="username" id="username"
                                    placeholder="Masukkan Username">
                                <span class="text-danger username"></span>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Masukkan email">
                                <span class="text-danger email"></span>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="password">Password *</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Masukkan password">
                                <span class="text-danger password"></span>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="gender">Jenis Kelamin *</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="1">Laki-Laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                                <span class="text-danger gender"></span>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="no_telp">No Telpon *</label>
                                <input type="text" name="no_telp" id="no_telp" class="form-control"
                                    placeholder="masukkan telpon">
                                <span class="text-danger no_telp"></span>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="alamat">Alamat *</label>
                                <textarea name="alamat" id="alamat" class="form-control"
                                    placeholder="masukkan alamat"></textarea>
                                <span class="text-danger alamat"></span>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="provinsi_id">Provinsi *</label>
                                <select name="provinsi_id" id="provinsi_id" class="form-control">
                                    <option value="">--Pilih Provinsi--</option>
                                    @foreach($provinsi as $p)
                                        <option value="{{$p->id}}">{{$p->nama_provinsi}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger provinsi_id"></span>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="kabupaten_id">kabupaten/kota *</label>
                                <select name="kabupaten_id" id="kabupaten_id" class="form-control"> 
                                    <option value="">--Pilih Kabupaten--</option>
                                </select>
                                <span class="text-danger kabupaten_id"></span>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="kode_pos">Kode Pos *</label>
                                <input type="text" name="kode_pos" id="kode_pos" class="form-control"
                                    placeholder="masukkan kode pos">
                                <span class="text-danger kode_pos"></span>
                            </div>
                            <button type="button" class="btn btn-primary btn-md text-center col-md-12"
                                id="btn-register"><i class="fa fa-cog"></i> Sign Up</button>
                        </div>
                     </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@stop
@section('footer')
<script>
    function register() {
        const button = $('#btn-register');
        button.attr("disabled", 'disabled');
        button.text('Loading.....');
        const form = $('#formRegister')[0];
        const formData = new FormData(form);
        axios({
            method: "post",
            data: formData,
            url: "{{route('register.customer')}}",
        }).then(datas => {
            button.removeAttr('disabled');
            button.html('<i class="fa fa-cog"></i> Sign Up');
            const {data} = datas;
            console.log(data);
            if ($.isEmptyObject(data.errors)) {
                $.each(data.success, function (key) {
                    hapusvalidasi(key);
                });
                toastr.success(data.message, 'Pesan Berhasil!')
                swal({
                    title: "Pesan!",
                    text: data.message,
                    icon: "success",
                }).then(function() {
                    window.location.href="{{url('home/customer')}}";			  
                });
            } else {
                $.each(data.errors, function (key, value) {
                    hapusvalidasi(key);
                    tambahvalidasi(key,false,value);
                });
                swal({
                    title: "Pesan!",
                    text: "dimohon untuk mengisi data dengan benar !",
                    icon: "error",
                });
                toastr.error('isi form dengan benar', 'Pesan Error!')
            }
        })
        .catch(err => {
            button.removeAttr('disabled');
            button.html('<i class="fa fa-cog"></i> Sign Up');
            alert("maaf ada kesalahan diserver");
            console.log(err)
        });
    }

    document.addEventListener('DOMContentLoaded',function(){

        $('#btn-register').click(register);

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

    });
</script>
@endsection

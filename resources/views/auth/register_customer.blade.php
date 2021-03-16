@extends('layouts.front',['title'=>'Register Jogjess Cell'])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">Register Customer</h3>
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
                                <label for="provinsi">Provinsi *</label>
                                <input type="text" name="provinsi" id="provinsi" class="form-control"
                                    placeholder="masukkan provinsi">
                                <span class="text-danger provinsi"></span>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="kota">Kota *</label>
                                <input type="text" name="kota" id="kota" class="form-control"
                                    placeholder="masukkan kota">
                                <span class="text-danger kota"></span>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="kode_pos">Kode Pos *</label>
                                <input type="text" name="kode_pos" id="kode_pos" class="form-control"
                                    placeholder="masukkan kode pos">
                                <span class="text-danger kode_pos"></span>
                            </div>
                            <button class="btn btn-primary btn-md text-center col-md-12"
                                id="btn-register">Register</button>
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
        const form = $('#formRegister')[0];
        const formData = new FormData(form);
    }

    document.addEventListener('DOMContentLoaded',function(){
        $('#btn-register').click(register);
    });
</script>
@endsection

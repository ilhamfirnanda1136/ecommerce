@extends('layouts.back',['title'=>'update profile admin'])
@section('header')
@stop
@section('content')
<div class="container-fluid">
  @if(Session::has('successMSG'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil &nbsp</strong>{{session('successMSG')}}.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ubah Profile </h3>
              </div>
              <form role="form" action="{{route('simpan.user.ubah')}}" method="post" enctype="multipart/form-data">
                <div class="card-body">
                   <div class="form-group">
                     @csrf
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control @if($errors->has('nama')) is-invalid @endif " name="nama" id="nama" value="{{$user->name}}" placeholder="Masukkan Nama Lengkap">
                     @if($errors->has('nama'))
                    <span class="help-block">{{$errors->first('nama')}}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control @if($errors->has('username')) is-invalid @endif" name="username" id="username" value="{{$user->username}}" >
                    @if($errors->has('username'))
                    <span class="help-block">{{$errors->first('username')}}</span>
                    @endif
                  </div>
                </div>

                <div class="card-footer">
                	<div class="col-md-12">
                		  <button  style="width: 100%" type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Ubah Profile</button>
                	</div>

                </div>
              </form>
            </div>
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
	$(document).ready(function(){
		$('#foto').change(function(){
				bacaLink(this,$('#image'));
		});
	});
</script>
@endsection

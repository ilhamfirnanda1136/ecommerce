@extends('layouts.front',['title'=>'Sign In Jogjess Cell'])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal &nbsp</strong>{{session('error')}}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">Sign In Customer</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('login.customer')}}" method="post" id="formLogin">
                        @csrf
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Masukkan email" required>
                                <span class="text-danger email"></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password *</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Masukkan password" required>
                                <span class="text-danger password"></span>
                            </div>
                            <button type="submit" class="btn btn-primary btn-md text-center col-md-12"
                                id="btn-register"><i class="fa fa-cog"></i> Sign In</button>
                     </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@section('footer')
<script>
    @if(Session::has('error'))
     toastr.error("isi form login dengan benar", 'Pesan Error!')
    @endif
</script>
@endsection

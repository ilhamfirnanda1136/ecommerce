<?php
  $merk = \App\Models\Merk::orderBy('nama_merk')->get();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{url('')}}">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <form class="form-inline" method="get" action="{{url('')}}">
          <input class="form-control mr-sm-2" name="nama" type="search" placeholder="Cari Produk" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
        </form>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Merk
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach ($merk as $m)
                  <a class="dropdown-item" href="{{url('cari')}}/{{$m->nama_merk}}">{{$m->nama_merk}}</a>
                @endforeach
              </div>
            </li>
            @if(!Session::has('customer'))
            <li class="nav-item active">
              <a class="btn btn-primary btn-md" href="{{url("login/customer")}}">Sign In</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-warning btn-md" href="{{url("register/customer")}}">Sign Up</a>
            </li>
            
            @else
             <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa fa-history"></i></a>
            </li>
              <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown"
                        aria-expanded="false">
                        <?php
                            if(Session::get('customer')->avatar == null) {
                                $foto = url('images/guest.png');
                            } else {
                                $foto =url('images/customer/'.Session::get('customer')->avatar);
                            }
                        ?>
                        <img class="img-xs rounded-circle" src="{{$foto}}"
                            alt="Profile image" width="40"> </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <div class="dropdown-header text-center">
                            <img class="img-md rounded-circle" src="{{$foto}}"
                                alt="Profile image" width="40">
                            <p class="mb-1 mt-3 font-weight-semibold" >{{ Session::get('customer')->nama }}</p>
                            <p class="font-weight-light text-muted mb-0">{{ Session::get('customer')->email }}</p>
                        </div>
                        <a href="{{url('customer/profile')}}" class="dropdown-item"><i
                                class="dropdown-item-icon mdi mdi-account-outline text-primary"></i> My Profile</a>
                        <a href="{{url('logout/customer')}}" class="dropdown-item" ><i class="dropdown-item-icon mdi mdi-power text-primary"></i>Sign
                            Out</a>
                    </div>
                </li>
            </ul>
            @endif
          </ul>
        </div>
    </div>
  </nav>
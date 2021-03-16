<?php
  $merk = \App\Models\Merk::orderBy('nama_merk')->get();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Merk
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach ($merk as $m)
                  <a class="dropdown-item" href="#">{{$m->nama_merk}}</a>
                @endforeach
              </div>
            </li>
            <li class="nav-item active">
              <a class="btn btn-primary btn-md" href="{{url("login/customer")}}">Sign In</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-warning btn-md" href="{{url("register/customer")}}">Sign Up</a>
            </li>
          </ul>
        </div>
    </div>
  </nav>
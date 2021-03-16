<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('home')}}" class="brand-link">
      <img src="{{asset('img/logo.png')}}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('images/guest.png')}}" class="elevation-2" alt="User Image" style="width:10px">
        </div>
        <div class="info">
          <a href="#" class="d-block">Super Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
           <a href="{{url('home')}}" class="nav-link {{request()->segment(1)=='home'? 'active' :''}}">
            <i class="nav-icon fa fa-home"></i>
             <p>
              Beranda
             </p>
           </a>
         </li>
         <li class="nav-item">
          <a href="{{url('home')}}" class="nav-link">
           <i class="nav-icon fa fa-users"></i>
            <p>
             Pelanggan
            </p>
          </a>
        </li>
        {{-- <li class="nav-item">
          <a href="{{url('banner')}}" class="nav-link {{request()->segment(1)=='banner'? 'active' :''}}">
           <i class="nav-icon fa fa-balance-scale"></i>
            <p>
             Banner
            </p>
          </a>
        </li> --}}
         <li class="nav-item has-treeview {{request()->segment(1)=='produk'? 'menu-open' :''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-archive"></i>
              <p>
                Master Produk
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview active">
              <li class="nav-item ">
                <a href="{{url('/produk/merk')}}" class="nav-link {{request()->segment(2)=='merk'? 'active' :''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Merk</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{url('/produk')}}" class="nav-link {{request()->segment(2)=='' && request()->segment(1)=='produk' ? 'active' :''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Produk</p>
                </a>
              </li>
          </ul>
          </li>
          <li class="nav-item">
            <a href="{{url('home')}}" class="nav-link">
             <i class="nav-icon fa fa-cart-plus"></i>
              <p>
               Transaksi
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Profile
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/ubah/profile')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Ubah Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/ubah/password')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Ubah Password</p>
                </a>
              </li>
            <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link" onclick="logout(event)">
             <i class="fa fa-sign-out nav-icon"></i>
              <p>
              Logout
              </p>
            </a>
          </li>
          </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>
<script type="text/javascript">
  function logout(e)
  {
    e.preventDefault();
    document.getElementById('logout-form').submit();
  }
</script>
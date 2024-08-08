<div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white {{ Request::routeIs('dashboard') ? 'active bg-gradient-primary' : '' }}" href="{{ route('dashboard') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">dashboard</i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ Request::routeIs('transaksi') ? 'active bg-gradient-primary' : '' }} " href="{{ route('transaksi') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
          </div>
          <span class="nav-link-text ms-1">Transaksi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ Request::routeIs('alat') ? 'active bg-gradient-primary' : '' }} " href="{{ route('alat') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">toll</i>
          </div>
          <span class="nav-link-text ms-1">Alat</span>
        </a>
      </li>
      <li class="nav-item">
        <a data-bs-toggle="collapse" href="#componentsProduk" class="nav-link text-white" aria-controls="basicExamples" role="button" aria-expanded="false">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">table_view</i>
          </div>
          <span class="nav-link-text ms-1">Produk</span>
        </a>
      
        <div class="collapse" id="componentsProduk" style="">
          <ul class="nav ">
            @php
            $kategori_m = App\Models\KategoriModel::get();
            @endphp
            @foreach ($kategori_m as $item)
          <li class="nav-item ">
          <a class="nav-link text-white " href="{{ route('produk_kategori', ['id'=>$item->id]) }}">
          <span class="sidenav-mini-icon"> {{substr($item->nama, 0, -((strlen($item->nama))-1))}} </span>
          <span class="sidenav-normal ms-2  ps-1"> {{$item->nama}} </span>
          </a>
          </li>
          @endforeach
          </ul>
        </div>
       
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="{{ route('saldo') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">receipt_long</i>
          </div>
          <span class="nav-link-text ms-1">Saldo</span>
        </a>
      </li>
      
    </ul>
  </div>
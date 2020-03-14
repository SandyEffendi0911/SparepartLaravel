<div id="sidebar-nav" class="sidebar">
      <div class="sidebar-scroll">
        <nav>
          <ul class="nav">
            <li><a href="/dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
            @if(auth()->user()->role == 'admin')
            <li><a href="/sparepart/penjualan" class=""><i class="lnr lnr-code"></i> <span>Data Penjualan</span></a></li>
            <li><a href="/sparepart/stock" class=""><i class="lnr lnr-code"></i> <span>Data Stock</span></a>
            </li>
            <li><a href="/sparepart/pelanggan" class=""><i class="lnr lnr-user"></i> <span>Pelanggan</span></a>
            </li>
            <li>
              <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Data Barang</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
              <div id="subPages" class="collapse ">
                <ul class="nav">
                  <li><a href="/sparepart" class="">Master Barang</a></li>
                  <li><a href="/sparepart/penjualan" class="">Data Penjualan</a></li>
                  <li><a href="/sparepart/stock" class="">Data Stock</a></li>
                </ul>
              </div>
            </li>
            @endif
          </ul>
        </nav>
      </div>
    </div>
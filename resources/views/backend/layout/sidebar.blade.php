<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <!-- ! Hide app brand if navbar-full -->
    <div class="text-center mt-2">
        <a href="/dashboard">
            <img src="{{ asset('assets/img/logo-pvc.png') }}" class="img-fluid" alt="Gambar"
                style="width: 50%; height:100%; ">
        </a>
    </div>
    <div class="app-brand demo">
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
        @if (request()->user()->role_id == 1)
        <ul class="menu-inner py-1">
            <li class="menu-item">
                <a href="/dashboard" class="menu-link ">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div>Dashboards</div>
                </a>
            </li>
            <li class="menu-item ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-book"></i>
                    <div>Master data</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item ">
                        <a href="/barang" class="menu-link">
                            <div>Kelola Barang</div>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a href="/distributor" class="menu-link">
                            <div>Kelola Distributor</div>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a href="/penjab" class="menu-link">
                            <div>Kelola Penanggung Jawab</div>
                        </a>
                    </li>

                    <li class="menu-item ">
                        <a href="/cm" class="menu-link">
                            <div>Kelola Count Manager</div>
                        </a>
                    </li>
                    {{-- <li class="menu-item ">
                        <a href="/penjualan" class="menu-link">
                            <div>Penjualan</div>
                        </a>
                    </li> --}}
                    <li class="menu-item ">
                        <a href="/pemesanan" class="menu-link">
                            <div>Pemesanan</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item ">
                <a href="/role" class="menu-link">
                    <i class='menu-icon tf-icons bx bx-directions'></i>
                    <div>Role Management</div>
                </a>
            </li>

            {{-- <li class="menu-item ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class='menu-icon tf-icons bx bx-cog'></i>
                    <div>Setting</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item ">
                        <a href="/aplikasi" class="menu-link">
                            <div>Aplikasi</div>
                        </a>
                    </li>
                </ul>
            </li> --}}
        </ul>
        @elseif(request()->user()->role_id == 3)
        <ul class="menu-inner py-1">
            <li class="menu-item">
                <a href="/dashboard" class="menu-link ">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div>Dashboards</div>
                </a>
            </li>
            <li class="menu-item ">
                <a href="/barang-bos" class="menu-link">
                    <i class='menu-icon tf-icons bx bx-cart'></i>
                    <div>Katalog Barang</div>
                </a>
            </li>
            <li class="menu-item ">
                <a href="/pemesanan" class="menu-link">
                    <i class='menu-icon tf-icons bx bx-box'></i>
                    <div>Pemesanan</div>
                </a>
            </li>
            <li class="menu-item ">
                <a href="/rekap-penjualan" class="menu-link">
                    <i class='menu-icon tf-icons bx bx-directions'></i>
                    <div>Rekap Penjualan</div>
                </a>
            </li>
        </ul>
        @endif


        {{-- <ul class="menu-inner py-1">
            <li class="menu-item">
                <a href="/dashboard" class="menu-link ">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div>Dashboard</div>
                </a>
        <li class="menu-item ">
            <a href="/pemesanan" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div>Pemesanan</div>
            </a>
        </li>
    </ul> --}}




</aside>

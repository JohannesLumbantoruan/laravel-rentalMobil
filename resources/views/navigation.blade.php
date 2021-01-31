<nav class="navbar navbar-expand-md bg-light navbar-light mb-5">
    <div class="container">
        <!-- Brand -->
        <a href="{{ route('dashboard') }}" class="navbar-brand">Rental Mobil</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link"><i class="fa fa-home"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('mobil') }}" class="nav-link"><i class="fa fa-folder-open"></i> Data Mobil</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kostumer') }}" class="nav-link"><i class="fa fa-user"></i> Data Kostumer</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('transaksi') }}" class="nav-link"><i class="fa fa-exchange-alt"></i> Transaksi Rental</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('laporan') }}" class="nav-link"><i class="fa fa-book"></i> Laporan</a>
                </li>
            </ul>

            <div class="dropdown ml-auto">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    Hai, {{ Auth::guard('admin')->user()->admin_username }}
                </button>
                <div class="dropdown-menu">
                    <a href="{{ route('gantiPassword') }}" class="dropdown-item"><i class="fa fa-lock"></i> Ganti Password</a>
                    <a href="{{ route('logout') }}" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="nk-sidebar">           
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">  
            <li>
                <a  href="/home" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>

            @guest
            @else
            @if (Auth::user()->level == 'bptd')
            <li class="nav-label">DATA WILAYAH</li>
                <ul>
                    <li><a href="/kecamatan">Data Kecamatan</a></li>
                    <li><a href="/desa">Data Desa</a></li>
                    <li><a href="/map">Sebaran</a></li>
                </ul>
            </li>
            <li class="nav-label">MANAGEMENT DATA</li>
                <ul>
                    <li><a href="/dataperiode">Data Periode</a></li>
                    <li><a href="{{ url('pengguna') }}">Data Pengguna</a></li>
                    <li><a href="/laporan">Laporan Data Pravelensi</a></li>
                </ul>
            </li>
            @elseif (Auth::user()->level == 'admin')
            <li class="nav-label">DATA WILAYAH</li>
                <ul>
                    <li><a href="/kecamatan">Data Kecamatan</a></li>
                    <li><a href="/desa">Data Desa</a></li>
                    <li><a href="/map">Sebaran</a></li>
                </ul>
            </li>
            <li class="nav-label">MANAGEMENT DATA</li>
                <ul>
                    <li><a href="/dataperiode">Data Periode</a></li>
                    <li><a href="{{ url('pengguna') }}">Data Pengguna</a></li>
                    <li><a href="/laporan">Laporan Data Pravelensi</a></li>
                </ul>
            </li>
            @endif
            @endguest


            @guest
            @else
            @if (Auth::user()->level=='puskes')
            <li class="nav-label">DATA WILAYAH</li>
                <ul>
                    <li><a href="/balita">Data Penderita Stunting</a></li>
                    <li><a href="/map">Data Sebaran</a></li>
                </ul>
            </li>
            <li class="nav-label">MANAGEMENT DATA</li>
                <ul>
                    <li><a href="/laporan">Laporan Data Pravelensi</a></li>
                </ul>
            </li>
            @elseif (Auth::user()->level=='admin')
            <li class="nav-label">DATA WILAYAH</li>
                <ul>
                    <li><a href="/balita">Data Penderita Stunting</a></li>
                    <li><a href="/map">Data Sebaran</a></li>
                </ul>
            </li>
            <li class="nav-label">MANAGEMENT DATA</li>
                <ul>
                    <li><a href="/dpravelensi">Laporan Data Pravelensi</a></li>
                </ul>
            </li>  
            @endif
            @endguest
            
            @guest
            @else
            @if (Auth::user()->level=='dinkes') 
            <li class="nav-label">DATA WILAYAH</li>
                <ul>
                    <li><a href="/puskes">Data Puskesmas</a></li>
                    <li><a href="/dpravelensi">Data Pravelensi</a></li>
                    <li><a href="/map">Data Sebaran</a></li>
                </ul>
            </li>
            <li class="nav-label">MANAGEMENT DATA</li>
                <ul>
                    <li><a href="/penderita">Laporan Penderita Stunting</a></li>
                </ul>
            </li> 
            @elseif (Auth::user()->level=='admin')
            <li class="nav-label">DATA WILAYAH</li>
                <ul>
                    <li><a href="/puskes">Data Puskesmas</a></li>
                    <li><a href="/dpravelensi">Data Pravelensi</a></li>
                    <li><a href="/map">Data Sebaran</a></li>
                </ul>
            </li>
            <li class="nav-label">MANAGEMENT DATA</li>
                <ul>
                    <li><a href="/balita">Data Penderita Stunting</a></li>
                </ul>
            </li> 
            @endif
            @endguest

            <li class="nav-label">Belajar</li>
                <ul>
                    <li><a href="/belajar">KECAMATAN</a></li>
                </ul>
            </li>

            @guest
            @else 
            @if (Auth::user()->level=='admin')            
            <li class="mega-menu mega-menu-sm">
                <a href="{{ url('user') }}" aria-expanded="false">
                    <i class="icon-user menu-icon"></i><span class="nav-text"> Data Admin</span>
                </a>
            </li>
            @endif
            @endguest
            <br>
            <br>

            <center>
                <div class="button-icon btn-sm">
                    <button type="button" class="btn mb-1 btn-rounded btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="btn-icon-center"><i class="fa fa-sign-out color-success"></i> </span>{{ __('Logout') }}</button>     
                </div>
            </center>

      


    </div>
</div>
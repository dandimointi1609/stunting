<div class="nk-sidebar">           
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">  
         <li class="nav-label">Dashboard</li>
            <li>
                <a  href="/home" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>
            @guest
            @else
            @if (Auth::user()->level=='bptd')
            @elseif (Auth::user()->level=='admin')
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Data Wilayah</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="/kecamatan">Data Kecamatan</a></li>
                    <li><a href="/desa">Data Desa</a></li>
                    <li><a href="/map">Data Map</a></li>
                </ul>
            </li>
            @endif
            @endguest

            @guest
            @else
            @if (Auth::user()->level=='puskes')
            @elseif (Auth::user()->level=='admin')
            <li class="mega-menu mega-menu-sm">
                <a  href="/puskes" aria-expanded="false">
                    <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Data Puskesmas</span>
                </a>
            </li>
            @endif
            @endguest

            @guest
            @else
            @if (Auth::user()->level=='puskes')
            @elseif (Auth::user()->level=='admin')
            <li class="mega-menu mega-menu-sm">
                <a href="/balita" aria-expanded="false">
                    <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Data Penderita Stunting</span>
                </a>
            </li>
            @endif
            @endguest
            
            @guest
            @else
            @if (Auth::user()->level=='dinkes') 
            @elseif (Auth::user()->level=='admin')
            <li class="mega-menu mega-menu-sm">
                <a  href="/dpravelensi" aria-expanded="false">
                    <i class="icon-globe-alt menu-icon"></i><span class="nav-text"> Data Pravelensi</span>
                </a>
            </li>
            @endif
            @endguest

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

            @guest
            @else 
            @if (Auth::user()->level=='dinkes')
            @elseif (Auth::user()->level=='admin')
            <li class="mega-menu mega-menu-sm">
                <a  href="/laporan" aria-expanded="false">
                    <i class="icon-notebook menu-icon"></i><span class="nav-text"> Laporan Data Penderita</span>
                </a>
            </li>
            @endif
            @endguest
    </div>
</div>
<ul class="side-menu app-sidebar3">
    <li class="slide">
        <a class="side-menu__item"  href="{{ route('dashboard') }}">
        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
        <span class="side-menu__label">Dashboard</span></a>
    </li>
    <li class="side-item side-item-category">Surat</li>
    
    <li class="slide {{ Request::is('surat*') ? 'is-expanded' : '' }}">
        <a class="side-menu__item {{ Request::is('surat*') ? 'active' : '' }}" data-toggle="slide" href="#">
            <i class="fas fa-warehouse  side-menu__icon" style="height: 24px;width:24px"></i>
            <span class="side-menu__label">Surat</span><i class="angle fa fa-angle-right"></i>
        </a>
        <ul class="slide-menu ">
            <li class="{{ (request()->routeIs('surat.baru.*')) ? 'active' : '' }}"><a href="{{ route('surat.baru') }}" class="slide-item" {{ (request()->routeIs('surat.baru.*')) ? 'active' : '' }}>Baru</a></li>
            <li class="{{ (request()->routeIs('surat.semua.*')) ? 'active' : '' }}"><a href="{{ route('surat.semua') }}" class="slide-item" {{ (request()->routeIs('surat.semua.*')) ? 'active' : '' }}>Semua</a></li>
        </ul>
    </li>
    <li class="side-item side-item-category">Master</li>
    <li class="slide {{ Request::is('master*') ? 'is-expanded' : '' }}">
        <a class="side-menu__item {{ Request::is('master*') ? 'active' : '' }}" data-toggle="slide" href="#">
            <i class="fas fa-warehouse  side-menu__icon" style="height: 24px;width:24px"></i>
            <span class="side-menu__label">Master</span><i class="angle fa fa-angle-right"></i>
        </a>
        <ul class="slide-menu ">
            <li class="{{ (request()->routeIs('master.jabatan.*')) ? 'active' : '' }}"><a href="{{ route('master.jabatan.index') }}" class="slide-item" {{ (request()->routeIs('master.jabatan.*')) ? 'active' : '' }}>Jabatan</a></li>
            <li class="{{ (request()->routeIs('master.jenis-dinas.*')) ? 'active' : '' }}"><a href="{{ route('master.jenis-dinas.index') }}" class="slide-item" {{ (request()->routeIs('master.jenis-dinas.*')) ? 'active' : '' }}>Jenis Dinas</a></li>
            <li class="{{ (request()->routeIs('master.dinas.*')) ? 'active' : '' }}"><a href="{{ route('master.dinas.index') }}" class="slide-item" {{ (request()->routeIs('master.dinas.*')) ? 'active' : '' }}>Dinas</a></li>
            <li class="{{ (request()->routeIs('master.pegawai.*')) ? 'active' : '' }}"><a href="{{ route('master.pegawai.index') }}" class="slide-item" {{ (request()->routeIs('master.pegawai.*')) ? 'active' : '' }}>Pegawai</a></li>
            <li class="{{ (request()->routeIs('master.surat.*')) ? 'active' : '' }}"><a href="{{ route('master.surat.index') }}" class="slide-item" {{ (request()->routeIs('master.surat.*')) ? 'active' : '' }}>Surat</a></li>
        </ul>
    </li>
</ul>
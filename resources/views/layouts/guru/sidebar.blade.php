        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/halaman/guru">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">E-learning <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/halaman/guru">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                guru
            </div>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('jadwals-mengajar') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Jadwals</span></a>
            </li>
{{-- 
            <li class="nav-item">
                <a class="nav-link" href="{{ route('semua-nilai') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>nilai</span></a>
            </li> --}}

            @php
                $wali_kelas = \App\Models\guru_kelas::where('guru_id', Auth::guard('guru')->user()->id)->first();  
            @endphp
    
    @if ($wali_kelas)
        <li class="nav-item">
             <a class="nav-link" href="{{ route('wali_kelas_nilai') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Nilai akses wali kelas</span></a>
        </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('wali_kelas_raport') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Raport akses wali kelas</span></a>
            </li>
    @endif
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
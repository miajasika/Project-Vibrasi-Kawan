@php
    $role = auth()->user()->role ?? 'klien';
    $menuKlien = [
        ['route' => 'klien.dashboard', 'label' => 'Dashboard', 'icon' => 'bi-grid'],
        ['route' => 'klien.cari-psikolog.index', 'label' => 'Cari Psikolog', 'icon' => 'bi-search'],
        ['route' => 'klien.riwayat-konseling.index', 'label' => 'Riwayat Konseling', 'icon' => 'bi-clock-history'],
    ];
@endphp
<aside class="app-sidebar vk-sidebar" data-bs-theme="light">
    <div class="sidebar-brand">
        <a href="{{ $role === 'admin' ? route('admin.dashboard') : ($role === 'psikolog' ? route('psikolog.dashboard') : route('klien.dashboard')) }}" class="brand-link vk-brand">
            <span class="vk-logo"><i class="bi bi-flower1"></i></span>
            <span class="brand-text">Vibrasi Kawan</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-3">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu">
                @if ($role === 'klien')
                    @foreach ($menuKlien as $item)
                        <li class="nav-item">
                            <a href="{{ route($item['route']) }}" class="nav-link {{ request()->routeIs($item['route']) ? 'active' : '' }}">
                                <i class="nav-icon bi {{ $item['icon'] }}"></i><p>{{ $item['label'] }}</p>
                            </a>
                        </li>
                    @endforeach
                @elseif ($role === 'psikolog')
                    <li class="nav-item"><a href="{{ route('psikolog.dashboard') }}" class="nav-link {{ request()->routeIs('psikolog.dashboard') ? 'active' : '' }}"><i class="nav-icon bi bi-grid"></i><p>Dashboard</p></a></li>
                @else
                    <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="nav-icon bi bi-grid"></i><p>Dashboard</p></a></li>
                @endif
            </ul>
        </nav>
    </div>
    <div class="vk-sidebar-bottom">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="nav-link vk-logout" type="submit"><i class="bi bi-box-arrow-left"></i><span>Keluar</span></button>
        </form>
    </div>
</aside>

<nav class="app-header navbar navbar-expand vk-topbar">
    <div class="container-fluid">
        <button class="btn btn-link vk-sidebar-toggle" type="button" data-lte-toggle="sidebar" aria-label="Buka/tutup menu">
            <i class="bi bi-list"></i>
        </button>
        <div class="ms-auto d-flex align-items-center gap-3">
            <button class="vk-icon-button" type="button" aria-label="Notifikasi"><i class="bi bi-bell"></i></button>
            <a class="vk-icon-button" href="#" aria-label="Bantuan"><i class="bi bi-question-circle"></i></a>
            <div class="vk-user-chip">
                <span class="vk-avatar vk-avatar-small"><i class="bi bi-person"></i></span>
                <span><strong>{{ auth()->user()->name ?? 'Pengguna' }}</strong><small>{{ ucfirst(auth()->user()->role ?? 'Akun') }}</small></span>
            </div>
        </div>
    </div>
</nav>

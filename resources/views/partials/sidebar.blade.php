<!-- Sidebar -->
<aside class="aside" id="aside-menu">
    <div class="aside-tools">
        <div class="aside-tools-content">
            <div class="mobile-aside-button" id="toggle-menu" style="margin-right: 25px;">
                <i class="mdi mdi-menu mdi-24px"></i>
            </div>
            <div class="aside-title">
                <img src="/img/silebar.png" alt="Logo" style="height: 60px;">
            </div>
        </div>
    </div>

    <div class="menu is-menu-main">
        <ul class="menu-list">
            <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                    <span class="menu-item-label">Beranda</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('folders.index') ? 'active' : '' }}">
                <a href="{{ route('folders.index') }}">
                    <span class="icon"><i class="mdi mdi-folder"></i></span>
                    <span class="menu-item-label">Folder</span>
                </a>
            </li>
        </ul>
    </div>
    
        <ul class="menu-list">
            <li class="{{ request()->routeIs('logout') ? 'active' : '' }}">
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" style="color: white;">
                <span class="icon"><i class="mdi mdi-logout"></i></span>
                <span class="menu-item-label">Keluar</span>
                </a>
            </form>
            </li>
        </ul>
</aside>

<!-- Script untuk toggle sidebar -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toggleButton = document.getElementById('toggle-menu');
        const asideMenu = document.getElementById('aside-menu');
        const asideTitle = document.querySelector('.aside-title');
        const appContent = document.getElementById('app');
        const navbarMain = document.getElementById('navbar-main');

        toggleButton.addEventListener('click', () => {
            asideMenu.classList.toggle('is-minimized');
            asideTitle.classList.toggle('is-hidden');
            appContent.classList.toggle('is-expanded');
            navbarMain.classList.toggle('is-expanded');
        });
    });
</script>

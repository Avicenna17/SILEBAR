<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Silebar')</title>
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">

    <!-- Tailwind is included -->
    <link rel="stylesheet" href="{{ asset('css/main.css?v=1628755089081') }}">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}" />
    <link rel="mask-icon" href="{{ asset('safari-pinned-tab.svg') }}" color="#00b4b6" />

    <meta name="description" content="Admin One - free Tailwind dashboard">

    <meta property="og:url" content="https://justboil.github.io/admin-one-tailwind/">
    <meta property="og:site_name" content="JustBoil.me">
    <meta property="og:title" content="Admin One HTML">
    <meta property="og:description" content="Admin One - free Tailwind dashboard">
    <meta property="og:image" content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1920">
    <meta property="og:image:height" content="960">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="Admin One HTML">
    <meta property="twitter:description" content="Admin One - free Tailwind dashboard">
    <meta property="twitter:image:src" content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png">
    <meta property="twitter:image:width" content="1920">
    <meta property="twitter:image:height" content="960">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-130795909-1');
    </script>
</head>

<body>
    <div class="overlay"></div>
    <div id="app">
        <nav id="navbar-main" class="navbar is-fixed-top">
            <div class="navbar-brand">
                <a class="navbar-item mobile-aside-button">
                    <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
                </a>
            </div>
            <div class="navbar-brand is-right">
                <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
                    <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
                </a>
            </div>
            <div class="navbar-menu" id="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="#">
                        <img src="{{ asset('img/bumn.png') }}" alt="Logo Left" style="height: 50px;">
                    </a>
                </div>
                <div class="navbar-end">
                    <a class="navbar-item" href="#">
                        <img src="{{ asset('img/ptpn.png') }}" alt="Logo Right 1" style="height: 40px;">
                    </a>
                    <a class="navbar-item" href="#">
                        <img src="{{ asset('img/ptpn4.png') }}" alt="Logo Right 2" style="height: 50px;">
                    </a>
                    <div class="navbar-item dropdown has-divider has-user-avatar">
                    </div>
                </div>
            </div>
        </nav>

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
                    <li class="{{ request()->routeIs('folders.index') || request()->routeIs('folders.files.*') ? 'active' : '' }}">
                        <a href="{{ route('folders.index') }}">
                            <span class="icon"><i class="mdi mdi-folder"></i></span>
                            <span class="menu-item-label">Folder</span>
                        </a>
                    </li>
                </ul>
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
            </div>
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

        <section class="is-hero-bar" style="background-color: #111827;">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <h1 class="title" style="color: white;">
                    Edit
                </h1>
            </div>
        </section>

        <section class="section main-section">
            <div class="card mb-6">
                <header class="card-header" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-file-edit-outline"></i></span>
                        File
                    </p>
                </header>
                <div class="card-content"
                    style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); background-color: #f9f9f9;">
                    <form method="POST" action="{{ route('folders.files.update', ['folder' => $folder->id, 'file' => $file->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="field">
                            <label class="label">Nama File</label>
                            <div class="field-body"></div>
                            <div class="field is-expanded">
                                <div class="control icons-left">
                                    <input class="input" type="text" name="name" value="{{ $file->name }}" placeholder="Nama File">
                                    <span class="icon left"><i class="mdi mdi-file"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Tanggal</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control icons-left">
                                        <input class="input" type="text" id="tanggal-input" name="date" value="{{ $file->date }}" placeholder="Tanggal/Bulan/Tahun">
                                        <span class="icon left"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pikaday JS -->
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.8.2/pikaday.min.js"></script>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const tanggalInput = document.getElementById('tanggal-input');

                                // Initialize Pikaday
                                const picker = new Pikaday({
                                    field: tanggalInput,
                                    format: 'DD/MM/YYYY', // Format tanggal
                                    toString(date, format) {
                                        const day = ("0" + date.getDate()).slice(-2); // Format dua digit untuk hari
                                        const month = ("0" + (date.getMonth() + 1)).slice(-2); // Bulan dimulai dari 0
                                        const year = date.getFullYear();
                                        return `${day}/${month}/${year}`;
                                    }
                                });

                                tanggalInput.addEventListener('focus', function() {
                                    picker.show();
                                });
                            });
                        </script>
                        <div class="field grouped">
                            <div class="control">
                                <button type="submit" class="button green">
                                    Kirim
                                </button>
                            </div>
                            <div class="control">
                                <button type="reset" class="button red">
                                    Atur Ulang
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    </div>
    </section>
    </div>

    <!-- Scripts below are for demo only -->
    <!-- <script type="text/javascript" src="../js/main.min.js?v=1628755089081"></script> -->
    <script type="text/javascript" src="../../js/main.min.js?v=1628755089081"></script>

    <!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

</body>

</html>

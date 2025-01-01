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
                    File
                </h1>
            </div>
        </section>


        <section class="section main-section">
            <div class="card has-table">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="control">
                            <input placeholder="Cari di sini..." class="input" id="searchInput" onkeyup="filterFiles()">
                        </span>
                    </p>
                    <div class="navbar-item">
                        <div class="buttons">
                            <button class="button medium blue"
                                onclick="window.location.href='{{ route('folders.files.create', ['folder' => $folder->id]) }}'"
                                type="button">
                                <span>Tambah File</span>
                            </button>
                        </div>
                    </div>
                    <a href="#" class="card-header-icon" onclick="location.reload();">
                        <span class="icon"><i class="mdi mdi-reload"></i></span>
                    </a>
                </header>

                <div class="card-content" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
                    <table>
                        <thead>
                            <tr>
                                <th class="image-cell"></th>
                                <th style="padding-left: 2px; text-align: center;">Nama File</th>
                                <th style="padding-left: 2px; text-align: center;">Detail</th>
                                <th style="padding-left: 2px; text-align: center;">Tanggal</th>
                                <th style="padding-right: 2px; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($files as $file)
                                <tr>
                                    <td class="image-cell">{{ ($files->currentPage() - 1) * $files->perPage() + $loop->iteration }}</td>
                                    <td style="padding-left: 2px; text-align: center;">{{ $file->name }}</td>
                                    <td style="padding-left: 2px; text-align: center;">{{ $file->detail }}</td>
                                    <td style="padding-left: 2px; text-align: center;">
                                        {{ \Carbon\Carbon::parse($file->date)->format('d/m/Y') }}
                                    </td>
                                    <td class="actions-cell" style="text-align: center;">
                                        <div class="buttons nowrap" style="display: inline-flex;">
                                            <a href="{{ asset("storage/{$file->path}") }}" class="button small green" download="{{ $file->name }}">
                                                <span class="icon"><i class="mdi mdi-download"></i></span>
                                            </a>
                                            <button class="button small blue"
                                                onclick="window.location.href='{{ route('folders.files.edit', ['folder' => $folder->id, 'file' => $file->id]) }}'"
                                                type="button">
                                                <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                                            </button>
                                            <form
                                                action="{{ route('folders.files.destroy', ['folder' => $folder->id, 'file' => $file->id]) }}"
                                                method="POST" style="display:inline-block;"
                                                id="deleteForm{{ $file->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="button small red --jb-modal" data-target="sample-modal"
                                                    type="button" onclick="confirmDelete({{ $file->id }})">
                                                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" style="text-align: center;">Tidak ada file tersedia di folder
                                        ini.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="table-pagination">
                        <div class="flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0">
                            <div class="flex justify-center items-center space-x-2" style="margin: 0 auto;">
                                <a href="{{ $files->previousPageUrl() }}" class="button small" {{ $files->onFirstPage() ? 'disabled' : '' }} style="border: 1px solid #ccc;">
                                    <span class="icon"><i class="mdi mdi-chevron-left"></i></span>
                                </a>
                                <small class="text-center md:text-left" style="margin: 0 10px;">Halaman {{ $files->currentPage() }} Dari {{ $files->lastPage() }}</small>
                                <a href="{{ $files->nextPageUrl() }}" class="button small" {{ $files->hasMorePages() ? '' : 'disabled' }} style="border: 1px solid #ccc;">
                                    <span class="icon"><i class="mdi mdi-chevron-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="sample-modal" class="modal">
                    <div class="modal-background --jb-modal-close"></div>
                    <div class="modal-card">
                        <header class="modal-card-head">
                            <p class="modal-card-title">Hapus File</p>
                            <button class="delete --jb-modal-close" aria-label="close"></button>
                        </header>
                        <section class="modal-card-body">
                            <p>Apakah Anda yakin ingin menghapus file ini?</p>
                        </section>
                        <footer class="modal-card-foot">
                            <button class="button --jb-modal-close">Batal</button>
                            <button class="button red" id="confirmDeleteBtn">Hapus</button>
                        </footer>
                    </div>
                </div>

                <script>
                    // Function to confirm delete action in modal
                    function confirmDelete(fileId) {
                        const modal = document.getElementById('sample-modal');
                        const confirmButton = document.getElementById('confirmDeleteBtn');

                        confirmButton.onclick = function() {
                            document.getElementById(`deleteForm${fileId}`).submit();
                        };

                        modal.classList.add('is-active');
                    }

                    // Close modal event listeners
                    document.querySelectorAll('.--jb-modal-close').forEach(button => {
                        button.addEventListener('click', function() {
                            document.getElementById('sample-modal').classList.remove('is-active');
                            document.getElementById('sample-modal-2').classList.remove('is-active');
                            document.getElementById('document-viewer').src = ''; // Clear iframe src on close
                        });
                    });
                </script>

                <script>
                    // Function to filter files
                    function filterFiles() {
                        const input = document.getElementById('searchInput');
                        const filter = input.value.toLowerCase();
                        const table = document.querySelector('.card-content table');
                        const tr = table.getElementsByTagName('tr');

                        for (let i = 1; i < tr.length; i++) {
                            const td = tr[i].getElementsByTagName('td');
                            let found = false;

                            for (let j = 0; j < td.length; j++) {
                                if (td[j]) {
                                    const txtValue = td[j].textContent || td[j].innerText;
                                    if (txtValue.toLowerCase().indexOf(filter) > -1) {
                                        found = true;
                                        break;
                                    }
                                }
                            }

                            if (found) {
                                tr[i].style.display = '';
                            } else {
                                tr[i].style.display = 'none';
                            }
                        }
                    }
                </script>

            </div>

            <!-- Scripts below are for demo only -->
            <!-- <script type="text/javascript" src="../js/main.min.js?v=1628755089081"></script> -->
            <script type="text/javascript" src="{{ asset('js/main.min.js?v=1628755089081') }}"></script>

            <!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
            <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
</body>

</html>

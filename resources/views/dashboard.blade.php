@extends('layout')

@section('isi')
    <main class="app-content">
        <section class="is-hero-bar" style="background-color: #111827;">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <h1 class="title" style="color: white;">Beranda</h1>
            </div>
        </section>

        <section class="section main-section">
            <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
                <!-- Card untuk menampilkan jumlah folder -->
                <div class="card" onclick="location.href='{{ route('folders.index') }}';"
                    style="cursor: pointer; margin-bottom: 20px; margin-right: 20px;">
                    <div class="card-content" style="background-color: #459dba; border-radius: 8px; height: 100%;">
                        <div class="flex items-center justify-between">
                            <div class="widget-label">
                                <h3 style="color: white; font-weight: bold;">Folder</h3>
                                <h1 style="color: white;">{{ $totalFolders }}</h1>
                            </div>
                            <span class="icon widget-icon text-black"><i class="mdi mdi-folder mdi-48px"></i></span>
                        </div>
                    </div>
                </div>

                <!-- Card untuk menampilkan jumlah file -->
                <div class="card" style="cursor: pointer; margin-bottom: 20px; margin-right: 20px;">
                    <div class="card-content" style="background-color: #54cf81; border-radius: 8px; height: 100%;">
                        <div class="flex items-center justify-between">
                            <div class="widget-label">
                                <h3 style="color: white; font-weight: bold;">File</h3>
                                <h1 style="color: white;">{{ $totalFiles }}</h1>
                            </div>
                            <span class="icon widget-icon text-black"><i class="mdi mdi-file mdi-48px"></i></span>
                        </div>
                    </div>
                </div>

                <!-- Card untuk menampilkan jumlah pengguna aktif -->
                <div class="card" style="cursor: pointer; margin-bottom: 20px; margin-right: 20px;">
                    <div class="card-content" style="background-color: rgb(210, 98, 98); border-radius: 8px; height: 100%;">
                        <div class="flex items-center justify-between">
                            <div class="widget-label">
                                <h3 style="color: white; font-weight: bold;">Pengguna Aktif</h3>
                                <h1 style="color: white;">{{ $activeUsersCount }}</h1>
                            </div>
                            <span class="icon widget-icon text-black"><i
                                    class="mdi mdi-account-multiple mdi-48px"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Bagian Tabel untuk menampilkan daftar pengguna -->
        <div class="card has-table" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); margin: 20px;">
            <header class="card-header" style="box-shadow: 0 4px 8px rgba(0.1, 0.1, 0.1, 0);">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                    Pengguna
                </p>
                <a href="#" class="card-header-icon" onclick="location.reload();">
                    <span class="icon"><i class="mdi mdi-reload"></i></span>
                </a>
            </header>
            <div class="card-content">
                <table>
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->username }}</td>
                                <td class="status-cell">
                                    @if ($user->status === 'online')
                                        <span class="status online" style="color: green;">Online</span>
                                    @else
                                        <span class="status offline" style="color: red;">Offline</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection

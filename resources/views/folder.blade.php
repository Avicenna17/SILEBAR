@extends('layout')

@section('isi')
<main class="app-content">
    <section class="is-hero-bar" style="background-color: #111827;">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <h1 class="title" style="color: white;">
                Folder
            </h1>
        </div>
    </section>
    <section class="section main-section">
        <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
            @foreach($folders as $folder)
                <div class="card" style="background-color: #E8EAE6; border-radius: 10px; margin: 10px;">
                    <a href="{{ route('folders.files.index', ['folder' => $folder->id]) }}">
                        <header class="card-header" style="background-color: {{ $folder->color }}; border-radius: 7px 7px 0 0;">
                            <p class="card-header-title">
                                <span class="icon"><i class="mdi mdi-folder"></i></span>
                                {{ $folder->name }}
                            </p>
                        </header>
                        <div class="card-content" style="background: url('{{ $folder->image_url }}') no-repeat center center; background-size: cover; height: 100px;">
                            <div class="content"></div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
</main>
@endsection

<!DOCTYPE html>
<html lang="en" class="form-screen">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Silebar</title>
    <link rel="icon" href="../img/favicon.png" type="image/png">

    <!-- Tailwind is included -->
    <link rel="stylesheet" href="../css/main.css?v=1628755089081">

    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png"/>
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png"/>
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png"/>
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#00b4b6"/>

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
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-130795909-1');
    </script>

</head>
<body>

<div class="card-background"></div>

    <div style="display: flex; height: 100vh;">
        <!-- Div untuk gambar di sebelah kiri -->
            <div style="flex: 1; position: relative; background-image: url('../img/logo-utama.png'); background-color: #fff; background-size: cover; background-position: center; width: 50%; height: 115vh;">
        <!-- Logo kiri atas -->
            <img src="../img/bumn.png" alt="Logo Kiri Atas" style="position: absolute; top: 8px; left: 20px; width: 120px; height: auto;">
        <!-- Logo kanan atas -->
            <img src="../img/ptpn.png" alt="Logo Kanan Atas" style="position: absolute; top: 20px; right: 20px; width: 100px; height: auto;">
            </div>
        <!-- Right side with login card -->
            <section class="section main-section" style="flex: 1; display: flex; justify-content: center; align-items: center; position: relative;">
        <!-- Logo above the card -->
            <img src="../img/silebar.png" alt="Logo Atas Card" style="position: absolute; top: 10px; width: 250px; height: auto;">
            <div class="card" style="width: 100%; max-width: 350px; margin-top: 100px;">
            <header class="card-header" style="border-radius: 10px;">
                <p class="card-header-title" style="background-color: #ffffff; border-radius: 10px 10px 0 0;">
                <span class="icon"><i class="mdi mdi-login" style="color: rgb(0, 0, 0);"></i></span>
                <span style="color: rgb(0, 0, 0);">Login</span>
            </header>

            <div class="card-content" style="border-radius: 10px;">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="field spaced">
                        <label class="label">Username</label>
                        <div class="control icons-left">
                            <input class="input" type="text" name="username" placeholder="Masukkan Username Anda" autocomplete="username">
                            <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
                        </div>
                    </div>

                    <div class="field spaced">
                        <label class="label">Password</label>
                        <p class="control icons-left icons-right">
                            <input class="input" type="password" name="password" placeholder="Masukkan Password" id="password-input">
                            <span class="icon is-small left"><i class="mdi mdi-lock"></i></span>
                            <span class="icon is-small right" onclick="togglePasswordVisibility()">
                                <i class="mdi mdi-eye" id="toggle-password-icon"></i>
                            </span>
                        </p>
                    </div>

                    <script>
                        function togglePasswordVisibility() {
                            const passwordInput = document.getElementById('password-input');
                            const togglePasswordIcon = document.getElementById('toggle-password-icon');
                            if (passwordInput.type === 'password') {
                                passwordInput.type = 'text';
                                togglePasswordIcon.classList.remove('mdi-eye');
                                togglePasswordIcon.classList.add('mdi-eye-off');
                            } else {
                                passwordInput.type = 'password';
                                togglePasswordIcon.classList.remove('mdi-eye-off');
                                togglePasswordIcon.classList.add('mdi-eye');
                            }
                        }
                    </script>

                    <div class="field grouped">
                        <div class="control">
                            <button type="submit" class="button is-primary" style="background-color: rgb(31, 41, 55); color: white;">Masuk</button>
                        </div>
                    </div>
                </form>
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/img/efo-logo.png') }}" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--=============== REMIX ICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- CSS Style -->
    @yield('css')
    <title>@yield('title') | Election for Everyone</title>
</head>
<body>
    <header class="header" id="header">
        <nav class="nav container">
            <div class="nav-data">
                <a href="{{ route('dashboard') }}" class="nav-logo">
                        <img src="{{ asset('assets/img/efo-logo.png') }}" alt="" srcset="">
                        <i>Election For Everyone</i>
                </a>

               <div class="nav-toggle" id="nav-toggle">
                    <i class="ri-menu-line nav-burger"></i>
                    <i class="ri-close-line nav-close"></i>
               </div>
            </div>

            <!--=============== NAV MENU ===============-->
            <div class="nav-menu" id="nav-menu">
                <ul class="nav-list">
                    <li class="dropdown-item">
                        <div class="nav-link">
                            Beranda<i class="ri-arrow-down-s-line dropdown-arrow"></i>
                        </div>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('dashboard') }}" class="dropdown-link">
                                    <i class="ri-article-line"></i> Tentang Kami
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('pemilu') }}" class="dropdown-link">
                                    <i class="fa-solid fa-asterisk"></i> Pemilu
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('tujuan') }}" class="dropdown-link">
                                    <i class="fa-solid fa-list-check"></i> Tujuan Pemilu
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li><a href="{{ route('data-diri') }}" class="nav-link">Data Diri</a></li>

                    <!--=============== DROPDOWN 1 ===============-->
                    <li class="dropdown-item">
                        <div class="nav-link">
                            Pindah Memilih <i class="ri-arrow-down-s-line dropdown-arrow"></i>
                        </div>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('urgensi') }}" class="dropdown-link">
                                    <i class="ri-article-line"></i> Deskripsi
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('syarat-ketentuan') }}" class="dropdown-link">
                                    <i class="fa-solid fa-asterisk"></i> Syarat & Ketentuan
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('tata-cara') }}" class="dropdown-link">
                                    <i class="fa-solid fa-list-check"></i> Tata Cara
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('pengajuan') }}" class="dropdown-link">
                                    <i class="fa-solid fa-file-import"></i> Pengajuan
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="search-icon">
                        <input type="search" placeholder="Search">
                        <span class="fas fa-search"></span>
                    </li>

                    <li class="user-icon">
                        <i class="fa-solid fa-user"></i>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <!--=============== MAIN JS ===============-->
    <script src="{{ asset('assets/js/navbar.js') }}"></script>
</body>
</html>

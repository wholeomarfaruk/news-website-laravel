<!doctype html>
<html lang="bn">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Default meta --}}
    <title>@yield('meta_title', 'The Message Today – Latest Breaking News & Headlines') </title>
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('meta_og_title', 'The Message Today– Latest Breaking News & Headlines')">
    <meta name="twitter:description"
        content="Get the latest breaking news, sports updates, politics, and trending stories on Favourite Range News.">
    <meta name="twitter:image" content="@yield('meta_twitter_image', asset('website/img/logo/logo.jpeg'))">

    <link rel="canonical" href="{{ url()->current() }}">
    {{-- Default meta --}}

    <meta name="description" content="@yield('meta_description', 'Get the latest breaking news, sports updates, politics, and trending stories on The Message Today. Stay informed with real-time headlines.')">
    <meta property="og:title" content="@yield('meta_og_title', 'The Message Today– Latest Breaking News & Headlines')">
    <meta property="og:description" content="@yield('meta_og_description', 'Get the latest breaking news, sports updates, politics, and trending stories on The Message Today.')">
    <meta property="og:image" content="@yield('meta_og_image', asset('website/img/logo/logo.jpeg'))">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('meta_twitter_title', 'The Message Today– Latest Breaking News & Headlines')">
    <meta name="twitter:description" content="@yield('meta_twitter_description', 'Get the latest breaking news, sports updates, politics, and trending stories on The Message Today.')">
    <meta name="twitter:image" content="@yield('meta_twitter_image', asset('website/img/logo/logo.jpeg'))">
    <link rel="canonical" href="@yield('meta_canonical', url()->current())">


    <link rel="shortcut icon" href="{{ asset('website/img/logo/logo.jpeg') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- Google Fonts for Bengali -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
        integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Include stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('website/css/style.css') }}">
    @stack('styles')
</head>


<header id="header_area" class="shadow-sm">
    <div class="wrapper">


        {{-- <div class="ad_area">
                <img src="{{ asset('website/img/ad/728x90.png') }}" alt="">
            </div> --}}
        <div class="top_bar">

            <div class="logo">
                <a href="/">
                    <span class="fw-bold">তারুণ্যের চোখে আমরা...</span><br>
                    <img src="{{ asset('website/img/logo/logo-transparent.png') }}" alt=""></a>

            </div>
            <div class="tools">
                <div class="date">
                    <p id="localdate">২০শে আগস্ট, ২০২৫</p>
                </div>
                <div class="btn-group">
                    <a href="#" class="btn e-paper"> <i class="fa-solid fa-newspaper"></i> ই-পেপার </a>

                </div>
                <div class="search-box">
                    <form class="d-flex">
                        <div class="input-group">
                            <input class="form-control form-control-lg" type="search" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-primary px-4" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                    {{-- <button type="button" class="btn btn-primary"> <i class="fa-solid fa-magnifying-glass"></i>
                        </button> --}}
                </div>


            </div>


        </div>
    </div>

    <div id="menubar" class="menu_bar  pt-1 pb-2">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="container-fluid menu-area">
                <!-- Brand -->
                <div class="logo">
                    <a href="/">
                        <img src="{{ asset('website/img/logo/logo-transparent.png') }}" alt="">
                    </a>
                </div>
                <div class="e-paper">

                    <a href="#" class="btn border border-light-subtle"> <i class="fa-solid fa-newspaper"></i>
                        ই-পেপার
                    </a>
                </div>
                <!-- Toggler -->

                {{-- <button class="navbar-toggler ms-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button> --}}

                @php
                    $categories = \App\Models\Category::all();
                @endphp
                <!-- Navbar links -->
                <div class="px-3 nav collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <!-- Normal link -->
                        <li class="nav-item">
                            <a class="nav-link" href="/"><i class="fa-solid fa-home"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('recent.post.list') }}">সর্বশেষ</a>
                        </li>
                        @if ($categories?->find('7'))
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('category', $categories->find('7')->slug) }}">জাতীয়</a>

                            </li>
                        @endif
                        @if ($categories?->find('9'))
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('category', $categories->find('9')->slug) }}">রাজনীতি</a>
                            </li>
                        @endif
                        @if ($categories?->find('8'))
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('category', $categories->find('8')->slug) }}">বাণিজ্য</a>
                            </li>
                        @endif
                        @if ($categories?->find('5'))
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('category', $categories->find('5')->slug) }}">সারাদেশ</a>
                            </li>
                        @endif
                        @if ($categories?->find('6'))
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('category', $categories->find('6')->slug) }}">আন্তর্জাতিক</a>
                            </li>
                        @endif
                        @if ($categories?->find('3'))
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('category', $categories->find('3')->slug) }}">খেলা</a>
                            </li>
                        @endif
                        @if ($categories?->find('4'))
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('category', $categories->find('4')->slug) }}">বিনোদন</a>
                            </li>
                        @endif
                        @if ($categories?->find('10'))
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('category', $categories->find('10')->slug) }}">শিক্ষা</a>
                            </li>
                        @endif
                        @if ($categories?->find('2'))
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('category', $categories->find('2')->slug) }}">মতামত</a>
                            </li>
                        @endif
                        @if ($categories?->find('29'))
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('category', $categories->find('29')->slug) }}">অপরাধ</a>
                            </li>
                        @endif






                        <!-- Mega menu dropdown -->
                        <li class="nav-item dropdown position-static">
                            <a class="nav-link dropdown-toggle" href="#" id="megaMenuDropdown" role="button"
                                data-bs-toggle="offcanvas"
                            data-bs-target="#main-canvas" aria-controls="main-canvas">
                                অন্যান্য 
                            </a>

                        </li>

                    </ul>
                </div>
                <div class="tools">
                    <div class="search-box">
                        <form class="d-flex">
                            <div class="input-group">
                                <input class="form-control form-control-lg" type="search" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn btn-primary px-4" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="langswitch-box">
                        <form action="">
                            <fieldset>
                                <select class="form-control " name="" id="lang-switcher">
                                    <option value="bn">BN</option>
                                    <option value="en">EN</option>
                                </select>
                            </fieldset>
                        </form>
                    </div>
                    <div class="btn-group">

                        {{-- <a href="#" class="btn border border-light-subtle"> <i
                                    class="fa-solid fa-newspaper"></i> ই-পেপার
                            </a> --}}
                    </div>
                    <div class="menu-hamburger">

                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#main-canvas" aria-controls="main-canvas">
                            <span class="navbar-toggler-icon"></span>
                        </button>


                    </div>
                </div>
            </div>
        </nav>

    </div>
    @php
        $menus = \App\Models\Menu::with('children')->where('parent_id', 0)->get();
    @endphp

    <div class="offcanvas offcanvas-end" tabindex="-1" id="main-canvas" aria-labelledby="main-canvas-label"
        data-bs-scroll="true" data-bs-backdrop="true" style="z-index: 1055;">

        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="main-canvas-label">Main Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
            <nav id="sidebar-menu">

                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    @foreach ($menus as $item)
                        @if ($item->children->count() > 0)
                            <li class="nav-item border-bottom w-100">
                                <div class="btn-group dropend w-100">
                                    <a type="button" class="nav-link w-100" href="{{ $item->url }}">
                                        {{ $item->name }}
                                    </a>

                                    <button type="button" class="btn flex-grow-0" data-bs-toggle="offcanvas"
                                        data-bs-target="#sub-canvas-{{ $item->id }}"
                                        aria-controls="sub-canvas-{{ $item->id }}">
                                        <i class="fas fa-caret-right"></i>
                                    </button>
                                </div>

                            </li>
                        @else
                            <li class="nav-item border-bottom w-100"><a class="nav-link"
                                    href="#">{{ $item->name }}</a></li>
                        @endif
                    @endforeach


                </ul>
            </nav>
        </div>
    </div>
    @php
        $sub_menus = \App\Models\Menu::with('children')->get();
    @endphp
    @foreach ($sub_menus as $canvas_item)
        @if ($canvas_item->children()->count() > 0)
        {{-- @dd($canvas_item->children->parent->name); --}}
            <div class="offcanvas offcanvas-end" tabindex="-1" id="sub-canvas-{{ $canvas_item->id }}"
                aria-labelledby="sub-canvas-{{ $canvas_item->id }}-label" data-bs-scroll="true"
                data-bs-backdrop="false" style="z-index: 1060;">

                <div class="offcanvas-header">
                    @if ($canvas_item->parent_id)

                        <button type="button" class="btn btn-sm btn-outline-secondary me-2 back-button"
                            data-bs-target="#sub-canvas-{{ $canvas_item->parent->id }}" aria-label="Back">
                            <i class="fas fa-arrow-left"></i> Back
                        </button>
                    @else
                        <button type="button" class="btn btn-sm btn-outline-secondary me-2 back-button"
                            data-bs-target="#main-canvas" aria-label="Back">
                            <i class="fas fa-arrow-left"></i> Back
                        </button>
                    @endif

                    <h5 class="offcanvas-title fs-6 text-muted" id="sub-canvas-1-label" >Main > {{ $canvas_item->parent ? $canvas_item->parent->name . ' > ' . $canvas_item->name : $canvas_item->name }}</h5>
                    <button type="button" class="btn-close ms-auto close-all-button"
                        aria-label="Close All"></button>
                </div>

                <div class="offcanvas-body">
                    <nav id="submenu-1">
                        <ul class="navbar-nav">
                            @foreach ($canvas_item->children as $child_item)
                                @if ($child_item->children->count() > 0)
                                    <li class="nav-item border-bottom w-100">
                                        <div class="btn-group dropend w-100">
                                            <a type="button" class="nav-link w-100" href="{{ $child_item->url }}">
                                                {{ $child_item->name }}
                                            </a>

                                            <button type="button" class="btn flex-grow-0" data-bs-toggle="offcanvas"
                                                data-bs-target="#sub-canvas-{{ $child_item->id }}"
                                                aria-controls="sub-canvas-4">
                                                <i class="fas fa-caret-right"></i>
                                            </button>
                                        </div>

                                    </li>
                                @else
                                    <li class="nav-item border-bottom w-100"><a class="nav-link"
                                            href="{{ $child_item->url }}">{{ $child_item->name }}</a></li>
                                @endif
                            @endforeach

                        </ul>
                    </nav>
                </div>
            </div>
        @endif
    @endforeach


    {{-- <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

            <nav id="sidebar-menu">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-" href="#">Home</a></li>


                    <li class="nav-item dropdown border-bottom w-100">
                        <a class="nav-link d-flex justify-content-between align-items-center"
                            href="{{ route('recent.post.list') }}">
                            <span>সর্বশেষ</span>
                        </a>

                    </li>





                    @if ($categories?->find('7'))
                        <li class="nav-item dropdown border-bottom w-100">


                            <!-- Split dropend button -->
                            <div class="btn-group dropend w-100">
                                <a type="button" class="nav-link" href="#">
                                    Split dropend
                                </a>
                                <button type="button"
                                    class="btn btn-secondary dropdown-toggle dropdown-toggle-split flex-grow-0"
                                    data-bs-toggle="offcanvassubmenu" data-bs-target="#offcanvassubmenu" aria-controls="offcanvassubmenu">
                                    <span class="visually-hidden">Toggle Dropend</span>
                                </button>


                                <div class="offcanvas offcanvas-end" tabindex="1" id="offcanvassubmenu"
                                    aria-labelledby="offcanvasExampleLabel">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="offcanvassubmenuLabel">Menu</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                    </div>
                                </div>

                            </div>
                        </li>

                    @endif

                    @if ($categories?->find('9'))
                        <li class="nav-item dropdown border-bottom w-100">
                            <a class="nav-link d-flex justify-content-between align-items-center"
                                href="{{ route('category', $categories->find('9')->slug) }}">
                                <span>রাজনীতি</span>
                            </a>

                        </li>
                    @endif
                    @if ($categories?->find('8'))
                        <li class="nav-item dropdown border-bottom w-100">
                            <a class="nav-link d-flex justify-content-between align-items-center"
                                href="{{ route('category', $categories->find('8')->slug) }}">
                                <span> <span>বাণিজ্য</span>
                                </span>
                            </a>

                        </li>
                    @endif
                    @if ($categories?->find('5'))
                        <li class="nav-item dropdown border-bottom w-100">
                            <a class="nav-link d-flex justify-content-between align-items-center"
                                href="{{ route('category', $categories->find('5')->slug) }}">
                                <span> <span>সারাদেশ</span>
                                </span>
                            </a>

                        </li>
                    @endif
                    @if ($categories?->find('6'))
                        <li class="nav-item dropdown border-bottom w-100">
                            <a class="nav-link d-flex justify-content-between align-items-center"
                                href="{{ route('category', $categories->find('6')->slug) }}">
                                <span> <span>আন্তর্জাতিক</span>
                                </span>
                            </a>

                        </li>
                    @endif
                    @if ($categories?->find('3'))
                        <li class="nav-item dropdown border-bottom w-100">
                            <a class="nav-link d-flex justify-content-between align-items-center"
                                href="{{ route('category', $categories->find('3')->slug) }}">
                                <span> <span>খেলা</span>
                                </span>
                            </a>

                        </li>
                    @endif
                    @if ($categories?->find('4'))
                        <li class="nav-item dropdown border-bottom w-100">
                            <a class="nav-link d-flex justify-content-between align-items-center"
                                href="{{ route('category', $categories->find('4')->slug) }}">
                                <span> <span>বিনোদন</span>
                                </span>
                            </a>

                        </li>
                    @endif

                    @if ($categories?->find('10'))
                        <li class="nav-item dropdown border-bottom w-100">
                            <a class="nav-link d-flex justify-content-between align-items-center"
                                href="{{ route('category', $categories->find('10')->slug) }}">
                                <span> <span>শিক্ষা</span>
                                </span>
                            </a>

                        </li>
                    @endif
                    @if ($categories?->find('2'))
                        <li class="nav-item dropdown border-bottom w-100">
                            <a class="nav-link d-flex justify-content-between align-items-center"
                                href="{{ route('category', $categories->find('2')->slug) }}">
                                <span> <span>মতামত</span>
                                </span>
                            </a>

                        </li>
                    @endif
                    @if ($categories?->find('29'))
                        <li class="nav-item dropdown border-bottom w-100">
                            <a class="nav-link d-flex justify-content-between align-items-center"
                                href="{{ route('category', $categories->find('29')->slug) }}">
                                <span> <span>অপরাধ</span>
                                </span>
                            </a>

                        </li>
                    @endif

                </ul>
            </nav>

        </div>
    </div> --}}
</header>

<main id="main_area">
    @yield('content')
</main>
<footer id="footer_area">

    <div class="topbar wrapper">

        <div class="logo">
            <a href="/">
                <span class="fw-bold">তারুণ্যের চোখে আমরা...</span><br>
                <img src="{{ asset('website/img/logo/logo-transparent.png') }}" alt="">
            </a>
        </div>

        <nav class="featured">
            <div class="social">
                {{-- <h6>সোশ্যাল মিডিয়া</h6> --}}
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" target="_blank"
                            href="https://www.facebook.com/profile.php?id=61580902890070"> <i
                                class="fa-brands fa-facebook"></i>
                        </a></li>
                    <li class="nav-item"><a class="nav-link" href="#"> <i class="fa-brands fa-instagram"></i>
                        </a></li>
                    <li class="nav-item"><a class="nav-link" href="#"> <i class="fa-brands fa-youtube"></i>
                        </a></li>
                    <li class="nav-item"><a class="nav-link" href="#"> <i class="fa-brands fa-twitter"></i>
                        </a></li>
                </ul>
            </div>
            {{-- <a href="#">
                <img class="" style="max-width: 160px;" src="{{ asset('website/img/others/Android-app.png') }}"
                    alt="">
            </a> --}}
            {{-- <ul>
                    <li><a href="#">কালবেলা</a></li>
                    <li><a href="#">গোপোনিয়তার নিতি</a></li>
                    <li><a href="#">শর্তাবলী</a></li>
                    <li><a href="#">মন্তব্য প্রকাশের নিতিমালা</a></li>
                    <li><a href="#">বিজ্ঞাপন</a></li>
                    <li><a href="#">যোগাযোগ</a></li>
                </ul> --}}
        </nav>

    </div>
    <div class="text_area wrapper">
        <p>Message Today is the Digital news media outlet in Bangladesh.across online and multimedia sectors. We are
            committed to publishing the real news
        </p>
    </div>
    {{-- <div class="featured wrapper pt-3 mb-3">
            <div class="social">
                <h6>সোশ্যাল মিডিয়া</h6>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#"> <i class="fa-brands fa-facebook"></i>
                        </a></li>
                    <li class="nav-item"><a class="nav-link" href="#"> <i class="fa-brands fa-instagram"></i>
                        </a></li>
                    <li class="nav-item"><a class="nav-link" href="#"> <i class="fa-brands fa-youtube"></i>
                        </a></li>
                    <li class="nav-item"><a class="nav-link" href="#"> <i class="fa-brands fa-twitter"></i>
                        </a></li>
                </ul>
            </div>
            <div class="newsletter">
                <h6>নিউজলেটার</h6>
                <form action="#" method="post" class="newsletter-form d-flex flex-column flex-sm-row gap-2">
                    <input type="email" name="email" class="form-control" placeholder="Enter your email"
                        required>
                    <button type="submit" class="btn btn-secondary">সাবস্ক্রাইব</button>
                </form>
                <p class="mt-2 text-muted" style="font-size: 0.95em;">কালবেলা থেকে প্রতিদিন মেইলে আপডেট পেতে
                    সাবস্ক্রাইব করুন।</p>
            </div>

        </div> --}}


    <div class="copyright  bg-secondary bg-opacity-25  py-3 ">
        <div class="wrapper">
            <div class="row g-3 justify-content-between w-100 align-items-center">
                <div class="col-sm-7">
                    <p class="small text-muted">
                        <span>Editor (in charge): Sristy Talukdar<br>© 2025 All Rights Reserved |
                            TheMessage2Day.com</span><br>
                        <svg class="footer-icon" aria-hidden="true" focusable="false" data-prefix="fas"
                            data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 384 512">
                            <path fill="currentColor"
                                d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z">
                            </path>
                        </svg>
                        178/1 West Shewrapara, Mirpur, Dhaka-1216
                        <br>
                        <abbr title="Phone:">
                            <svg class="footer-icon" aria-hidden="true" focusable="false" data-prefix="fas"
                                data-icon="mobile-alt" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 320 512">
                                <path fill="currentColor"
                                    d="M272 0H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h224c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zM160 480c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm112-108c0 6.6-5.4 12-12 12H60c-6.6 0-12-5.4-12-12V60c0-6.6 5.4-12 12-12h200c6.6 0 12 5.4 12 12v312z">
                                </path>
                            </svg>
                        </abbr> +88 01835-117590,

                        <span class="small">
                            <abbr title="Email:">
                                <svg class="footer-icon" aria-hidden="true" focusable="false" data-prefix="fas"
                                    data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                        d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z">
                                    </path>
                                </svg>
                            </abbr> themessage2daynews@gmail.com<br>
                        </span>
                    </p>
                </div>
                <div class="col-sm-5 hidden-print pe-0">
                    <ul class="footer-menu text-lg-end ps-0 pe-0">
                        <li class="d-inline me-2"><a class="border border-secondary p-2" href="#">About
                                Us</a></li>
                        <li class="d-inline me-2"><a class="border border-secondary p-2" href="#">Contact</a>
                        </li>
                        <li class="d-inline "><a class="border border-secondary p-2" href="#"
                                target="_blank">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>


    </div>

</footer>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('library/moment/moment.js') }}"></script>
<script src="{{ asset('library/moment/moment-with-locales.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.45/moment-timezone-with-data.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/locale/bn-bd.min.js"
    integrity="sha512-1VBlJq+NEHfEYNKwsk87hSMejTnxm/jqydXadetQC9R1busFkdRXhsyl+dKIRV7TvhnJ9e7xU9z0Fi9Z1NfLNw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="{{ asset('website/js/script.js') }}"></script>
@stack('scripts')
<script>
    window.onscroll = function() {
        // header sticky on scroll start
        var scroll = document.documentElement.scrollTop;

        if (scroll > 200) {
            document.getElementById("menubar").classList.add("sticky");
        } else {
            document.getElementById("menubar").classList.remove("sticky");
        }
    }
    // header sticky on scroll end
</script>
<script>
    // Set locale to Bangla
    $(function() {
        // লোকেল বাংলায় সেট করা হলো
        moment.locale("bn-bd");

        function updateDate() {
            // শুধু ফুল ডেট ফরম্যাট (বার, তারিখ, মাস, সাল)
            let bdDate = moment.tz("Asia/Dhaka").format("LLLL");

            // "LLLL" এর মধ্যে সময়ও থাকে, তাই শুধু তারিখের অংশ কেটে নিলাম
            bdDate = bdDate.split(" ")[0] + " " + moment.tz("Asia/Dhaka").format("LL");

            $("#localdate").text(bdDate);
        }

        updateDate();
    });
</script>
<script>
    /**
     * Custom JavaScript for Nested Offcanvas Back/Close Logic
     */
    document.addEventListener('DOMContentLoaded', () => {

        // --- LOGIC FOR THE "CLOSE ALL" BUTTON ---
        document.querySelectorAll('.close-all-button').forEach(button => {
            button.addEventListener('click', function() {
                // Get ALL offcanvas elements and hide their instances
                document.querySelectorAll('.offcanvas').forEach(el => {
                    const instance = bootstrap.Offcanvas.getInstance(el);
                    if (instance) {
                        instance.hide();
                    }
                });
            });
        });


        // --- LOGIC FOR THE "BACK" BUTTON ---
        document.querySelectorAll('.back-button').forEach(button => {
            button.addEventListener('click', function() {
                // 1. Get the current (open) offcanvas instance
                const currentOffcanvasElement = this.closest('.offcanvas');
                const currentOffcanvasInstance = bootstrap.Offcanvas.getInstance(
                    currentOffcanvasElement);

                // 2. Get the target element ID from the data-bs-target attribute (e.g., #main-canvas)
                const targetSelector = this.getAttribute('data-bs-target');
                const targetOffcanvasElement = document.querySelector(targetSelector);

                if (currentOffcanvasInstance) {
                    // 3. Hide the CURRENT offcanvas
                    currentOffcanvasInstance.hide();
                }

                if (targetOffcanvasElement) {
                    // 4. Show the TARGET (parent) offcanvas
                    const targetOffcanvasInstance = bootstrap.Offcanvas.getInstance(
                        targetOffcanvasElement) || new bootstrap.Offcanvas(
                        targetOffcanvasElement);
                    targetOffcanvasInstance.show();
                }
            });
        });

    });
</script>
</body>

</html>

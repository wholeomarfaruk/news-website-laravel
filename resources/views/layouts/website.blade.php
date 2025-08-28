<!doctype html>
<html lang="bn">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>The Message Today – Latest Breaking News & Headlines</title>
  <meta name="description" content="Get the latest breaking news, sports updates, politics, and trending stories on Favourite Range News. Stay informed with real-time headlines.">

  <!-- Open Graph for Facebook, WhatsApp, LinkedIn -->
  <meta property="og:title" content="The Message Today– Latest Breaking News & Headlines">
  <meta property="og:description" content="Get the latest breaking news, sports updates, politics, and trending stories on Favourite Range News.">
  <meta property="og:image" content="{{asset('website/img/logo/logo.jpeg')}}">
  <meta property="og:url" content="https://themessage2day/">
  <meta property="og:type" content="website">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="The Message Today– Latest Breaking News & Headlines">
  <meta name="twitter:description" content="Get the latest breaking news, sports updates, politics, and trending stories on Favourite Range News.">
  <meta name="twitter:image" content="{{asset('website/img/logo/logo.jpeg')}}">
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
                    <a href="#" class="btn "> <i class="fa-solid fa-newspaper"></i> ই-পেপার </a>

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
    <div class=" border-top border-light-subtle">
        <div id="menubar" class="menu_bar  pt-1 pb-2">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <div class="container-fluid menu-area">
                    <!-- Brand -->


                    <!-- Toggler -->
                    <button class="navbar-toggler ms-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Navbar links -->
                    <div class="px-3 nav collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="logo">
                            <a href="/">
                                <img src="{{ asset('website/img/logo/logo-transparent.png') }}" alt="">
                            </a>
                        </div>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                            <!-- Normal link -->
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa-solid fa-home"></i></a>
                            </li>
                            @php
                                $categories = \App\Models\Category::latest()->get();
                            @endphp
                            @foreach ($categories as $category)
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('category', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach



                            <!-- Mega menu dropdown -->
                            <li class="nav-item dropdown position-static">
                                <a class="nav-link dropdown-toggle" href="#" id="megaMenuDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    অন্যান্য
                                </a>
                                <div class="dropdown-menu w-100 mt-0 border-0 shadow"
                                    aria-labelledby="megaMenuDropdown">
                                    <div class="container">
                                        <div class="row py-4">

                                            <!-- Column 1 -->
                                            <div class="col-lg-4 col-md-6 mb-3">
                                                <h6 class="text-uppercase">Category 1</h6>
                                                <a href="#" class="dropdown-item">Link 1</a>
                                                <a href="#" class="dropdown-item">Link 2</a>
                                                <a href="#" class="dropdown-item">Link 3</a>
                                            </div>

                                            <!-- Column 2 -->
                                            <div class="col-lg-4 col-md-6 mb-3">
                                                <h6 class="text-uppercase">Category 2</h6>
                                                <a href="#" class="dropdown-item">Link 4</a>
                                                <a href="#" class="dropdown-item">Link 5</a>
                                                <a href="#" class="dropdown-item">Link 6</a>
                                            </div>

                                            <!-- Column 3 -->
                                            <div class="col-lg-4 col-md-6 mb-3">
                                                <h6 class="text-uppercase">Category 3</h6>
                                                <a href="#" class="dropdown-item">Link 7</a>
                                                <a href="#" class="dropdown-item">Link 8</a>
                                                <a href="#" class="dropdown-item">Link 9</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <div class="tools pe-3">
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

                            <a href="#" class="btn border border-light-subtle"> <i
                                    class="fa-solid fa-newspaper"></i> ই-পেপার
                            </a>
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

                        </div>
                    </div>
                </div>
            </nav>

            {{-- <div class="hamburger">
                    <button type="button" class="btn btn-secondary " data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <div class="mega-menu dropdown-menu dropdown-menu-end">
                        <li><button class="dropdown-item" type="button">Action</button></li>
                        <li><button class="dropdown-item" type="button">Another action</button></li>
                        <li><button class="dropdown-item" type="button">Something else here</button></li>
                    </div>
                </div> --}}

        </div>
    </div>
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
                    <li class="nav-item"><a class="nav-link" target="_blank" href="https://www.facebook.com/profile.php?id=61579636472370"> <i class="fa-brands fa-facebook"></i>
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
            <div class="row justify-content-between w-100 align-items-center">
                <div class="col-sm-7">
                    <p class="small text-muted">
                        <span>Editor (in charge): Sristy Talukdar<br>© 2025 All Rights Reserved |
                            TheMessage2Day.com,
                            a concern of AKC Private Limited</span><br>
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
                <div class="col-sm-5 footer-top hidden-print">
                    <ul class="footer-menu text-end">
                        <li class="d-inline me-2"><a class="border border-secondary p-2" href="#">About
                                Us</a></li>
                        <li class="d-inline me-2"><a class="border border-secondary p-2" href="#">Contact</a>
                        </li>
                        <li class="d-inline me-2"><a class="border border-secondary p-2" href="#"
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
</body>

</html>

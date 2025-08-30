@extends('layouts.website')
@section('content')
    @if ($latestPost && $latestPost?->count() > 0)


        <section id="featured_news" class="mt-4 mb-3">
            <div class="wrapper">
                <div class="row align-items-stretch">
                    <div class="col-md-9">
                        <div class="border-box border border-lg-1 border p-lg-3 rounded ">

                            <div class="row g-3">
                                <div class="col-md-8">


                                    @if ($featuredPost)
                                        <a
                                            href="{{ route('post.show', ['category' => $featuredPost?->category?->slug, 'slug' => $featuredPost?->slug]) }}">
                                            <div class="card mb-3 p-2 rounded ">
                                                <div class="row flex-column g-0">
                                                    <div class="col-auto">
                                                        <img style="height: 100%; width: cover;"
                                                            src="{{ $featuredPost->featured_image }}"
                                                            class="img-fluid rounded-start" alt="...">
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="card-body">

                                                            <h1 class="card-title topnews-title">
                                                                {{ $featuredPost->title }}
                                                            </h1>
                                                            <p class="card-text topnews-short-text">
                                                                {{ $featuredPost->excerpt }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @else
                                        <a
                                            href="#">
                                            <div class="card mb-3 p-2 rounded ">
                                                <div class="row flex-column g-0">
                                                    <div class="col-auto">
                                                        <img style="height: 100%; width: cover;"
                                                            src="{{asset('website/img/thumbnails/featured_img.jpg')}}"
                                                            class="img-fluid rounded-start" alt="...">
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="card-body">

                                                            <h1 class="card-title topnews-title">
                                                                No title
                                                            </h1>
                                                            <p class="card-text topnews-short-text">
                                                                No Excerpt
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                    <div class="row  g-2">
                                        @php
                                            $hotnews = $categories->find(11)?->posts()?->latest()?->get();
                                        @endphp
                                        @if ($hotnews)
                                            @foreach ($hotnews->slice(1, 2) as $post)
                                                <div class="col-lg-6 col-6">

                                                    <div class="card">
                                                        <a
                                                            href="{{ route('post.show', ['category' => $post->category->slug, 'slug' => $post->slug]) }}">
                                                            <div class="row g-0 align-items-center">
                                                                <div class="col-md-5">
                                                                    <img style="object-fit: cover;"
                                                                        src="{{ $post->featured_image }}"
                                                                        class="img-fluid rounded-start" alt="...">
                                                                </div>
                                                                <div class="col-md-7 m-0 p-0">
                                                                    <div class="card-body m-0 p-0">
                                                                        <h3 class="card-title secondpost-title px-3 ">
                                                                            {{ $post->title }}
                                                                        </h3>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-lg-6 col-6">

                                            <a href="{{ route('post.show', ['category' => $post->category->slug, 'slug' => $post->slug]) }}">
                                                <div class="card  h-100">


                                                    <img src="{{ $post->featured_image }}" class="card-img-top"
                                                        alt="{{ $post->title }}">


                                                    <div class="card-body">
                                                        <h3 class="card-title secondpost-title">{{ $post->title }}
                                                        </h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </div> --}}
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <div class="row g-2">
                                        @php
                                            $sporthotnews = $categories
                                                ->where('slug', 'khela')
                                                ->first()
                                                ->posts()
                                                ->latest()
                                                ->first();
                                        @endphp

                                        <div class="col-lg-12 col-6">

                                            <div class="card">
                                                <a
                                                    href="{{ route('post.show', ['category' => $sporthotnews->category->slug, 'slug' => $sporthotnews->slug]) }}">
                                                    <img src="{{ $sporthotnews->featured_image }}" class="card-img-top"
                                                        alt="...">
                                                    <div class="card-body">
                                                        <h3 class="card-title  secondpost-title">{{ $sporthotnews->title }}
                                                        </h3>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        @php
                                            $binodonnews = $categories->find(4)->posts()->latest()->first();
                                        @endphp
                                        <div class="col-lg-12 col-6">

                                            <div class="card">
                                                <a
                                                    href="{{ route('post.show', ['category' => $binodonnews->category->slug, 'slug' => $binodonnews->slug]) }}">
                                                    <div class="row g-0 align-items-center">
                                                        <div class="col-md-5">
                                                            <img style="object-fit: cover;"
                                                                src="{{ $binodonnews->featured_image }}"
                                                                class="img-fluid rounded-start" alt="...">
                                                        </div>
                                                        <div class="col-md-7 m-0 p-0">
                                                            <div class="card-body m-0 p-0">
                                                                <h3 class="card-title secondpost-title ms-3">
                                                                    {{ $binodonnews->title }}
                                                                </h3>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-6">
                                            @php
                                                $shikkha = $categories->find(10)->posts()->latest()->first();
                                            @endphp
                                            <div class="card">
                                                <a
                                                    href="{{ route('post.show', ['category' => $shikkha->category->slug, 'slug' => $shikkha->slug]) }}">
                                                    <div class="row g-0 align-items-center">
                                                        <div class="col-md-5">
                                                            <img style="object-fit: cover;"
                                                                src="{{ $shikkha->featured_image }}"
                                                                class="img-fluid rounded-start" alt="...">
                                                        </div>
                                                        <div class="col-md-7 m-0 p-0">
                                                            <div class="card-body m-0 p-0">
                                                                <h3 class="card-title secondpost-title ms-3">
                                                                    {{ $shikkha->title }}
                                                                </h3>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-12 col-6">
                                            @php
                                                $motamot = $categories->find(2)->posts()->latest()->first();
                                            @endphp
                                            <div class="card">
                                                <a
                                                    href="{{ route('post.show', ['category' => $motamot->category->slug, 'slug' => $motamot->slug]) }}">
                                                    <div class="row g-0 align-items-center">
                                                        <div class="col-md-5">
                                                            <img style="object-fit: cover;"
                                                                src="{{ $motamot->featured_image }}"
                                                                class="img-fluid rounded-start" alt="...">
                                                        </div>
                                                        <div class="col-md-7 m-0 p-0">
                                                            <div class="card-body m-0 p-0">
                                                                <h3 class="card-title secondpost-title ms-3">
                                                                    {{ $motamot->title }}
                                                                </h3>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-12 col-6">
                                            @php
                                                $jatio = $categories->find(7)->posts()->latest()->first();
                                            @endphp
                                            <div class="card">
                                                <a
                                                    href="{{ route('post.show', ['category' => $jatio->category->slug, 'slug' => $jatio->slug]) }}">
                                                    <div class="row g-0 align-items-center">
                                                        <div class="col-md-5">
                                                            <img style="object-fit: cover;"
                                                                src="{{ $jatio->featured_image }}"
                                                                class="img-fluid rounded-start" alt="...">
                                                        </div>
                                                        <div class="col-md-7 m-0 p-0">
                                                            <div class="card-body m-0 p-0">
                                                                <h3 class="card-title secondpost-title ms-3">
                                                                    {{ $jatio->title }}
                                                                </h3>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-6">
                                            @php
                                                $internationalnews = $categories->find(6)->posts()->latest()->first();
                                            @endphp
                                            <div class="card">
                                                <a
                                                    href="{{ route('post.show', ['category' => $internationalnews->category->slug, 'slug' => $internationalnews->slug]) }}">
                                                    <div class="row g-0 align-items-center">
                                                        <div class="col-md-5">
                                                            <img style="object-fit: cover;"
                                                                src="{{ $internationalnews->featured_image }}"
                                                                class="img-fluid rounded-start" alt="...">
                                                        </div>
                                                        <div class="col-md-7 m-0 p-0">
                                                            <div class="card-body m-0 p-0">
                                                                <h3 class="card-title secondpost-title ms-3">
                                                                    {{ $internationalnews->title }}
                                                                </h3>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>






                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3 h-100">
                        <div class="border p-3 rounded ">
                            <div class="follow-us row mb-3 mx-2 py-3 rounded shadow-sm text-center align-items-center">
                                <p class="fw-bold  col-5" style="font-size: 18px;">Follow Us</p>
                                <div class=" col-7 d-flex justify-content-center gap-3 align-items-center">
                                    <!-- Facebook -->
                                    <a href="https://www.facebook.com/profile.php?id=61579636472370" target="_blank"
                                        class="btn-hover-effect-1 social-icon facebook">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48"
                                            height="48" viewBox="0 0 48 48">
                                            <path fill="#3F51B5"
                                                d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5V37z">
                                            </path>
                                            <path fill="#FFF"
                                                d="M34.368,25H31v13h-5V25h-3v-4h3v-2.41c0.002-3.508,1.459-5.59,5.592-5.59H35v4h-2.287C31.104,17,31,17.6,31,18.723V21h4L34.368,25z">
                                            </path>
                                        </svg>
                                    </a>
                                    <!-- YouTube -->
                                    <a href="https://www.youtube.com/yourchannel" target="_blank"
                                        class="btn-hover-effect-1 social-icon youtube">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48"
                                            height="48" viewBox="0 0 48 48">
                                            <path fill="#FF3D00"
                                                d="M43.2,33.9c-0.4,2.1-2.1,3.7-4.2,4c-3.3,0.5-8.8,1.1-15,1.1c-6.1,0-11.6-0.6-15-1.1c-2.1-0.3-3.8-1.9-4.2-4C4.4,31.6,4,28.2,4,24c0-4.2,0.4-7.6,0.8-9.9c0.4-2.1,2.1-3.7,4.2-4C12.3,9.6,17.8,9,24,9c6.2,0,11.6,0.6,15,1.1c2.1,0.3,3.8,1.9,4.2,4c0.4,2.3,0.9,5.7,0.9,9.9C44,28.2,43.6,31.6,43.2,33.9z">
                                            </path>
                                            <path fill="#FFF" d="M20 31L20 17 32 24z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="ad bg-dark bg-opacity-50 d-flex justify-content-center align-items-center mb-2"
                                style="height: 80px">
                                <span class="text-danger fs-3">For Ad</span>
                            </div>
                            <div class="e-paper mb-2">
                                <img src="{{ asset('website/img/others/e-newspaper.jpg') }}" alt="">
                            </div>
                            <div class="ad bg-dark bg-opacity-50 d-flex justify-content-center align-items-center mb-2"
                                style="height: 80px">
                                <span class="text-danger fs-3">For Ad</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <section id="video_area" class="mb-3">
        <div class="wrapper">
            <div class="video-container border p-3 rounded ">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="header"><i class="fa-solid fa-video"></i> ভিডিও</div>
                    <a href="#" class="text-decoration-none fw-bold">
                        সব ভিডিও <i class="fa-solid fa-chevron-right"></i>
                    </a>
                </div>
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <img src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/root-20250821221434.jpg"
                            alt="">
                        <div class="p-2">
                            <h3 class="fw-bold">ভিডিও শিরোনাম ১</h3>
                            <div class="text-muted" style="font-size: 13px;">
                                <i class="fa-regular fa-clock"></i> ৩:১৫ মিনিট
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="https://www.kalbela.com/assets/video_cover_photos/2025/08/18/cover_photo-4486.webp"
                            alt="">
                        <div class="p-2">
                            <div class="fw-bold" style="font-size: 18px;">ভিডিও শিরোনাম ২</div>
                            <div class="text-muted" style="font-size: 13px;">
                                <i class="fa-regular fa-clock"></i> ৪:২০ মিনিট
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="https://www.kalbela.com/assets/video_cover_photos/2025/08/18/cover_photo-4485.webp"
                            alt="">
                        <div class="p-2">
                            <div class="fw-bold" style="font-size: 18px;">ভিডিও শিরোনাম ৩</div>
                            <div class="text-muted" style="font-size: 13px;">
                                <i class="fa-regular fa-clock"></i> ৫:১০ মিনিট
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/root-20250821221434.jpg"
                            alt="">
                        <div class="p-2">
                            <div class="fw-bold" style="font-size: 18px;">ভিডিও শিরোনাম ৪</div>
                            <div class="text-muted" style="font-size: 13px;">
                                <i class="fa-regular fa-clock"></i> ১:৫৫ মিনিট
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="https://www.kalbela.com/assets/video_cover_photos/2025/08/18/cover_photo-4486.webp"
                            alt="">
                        <div class="p-2">
                            <div class="fw-bold" style="font-size: 18px;">ভিডিও শিরোনাম ৫</div>
                            <div class="text-muted" style="font-size: 13px;">
                                <i class="fa-regular fa-clock"></i> ৪:২০ মিনিট
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @php
        $sports = $categories->find(3);
        $sportsPosts = $sports ? $sports->posts()->latest()->get() : collect();
    @endphp
    @if ($sportsPosts && $sportsPosts?->count() > 0)
        <section id="sports_area" class="mb-3">
            <div class="wrapper">
                <div class="sports_container border p-3 rounded ">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="header"><i class="fa-solid fa-newspaper"></i> খেলা</div>
                        <a href="#" class="text-decoration-none fw-bold">
                            সব খেলার নিউজ <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    </div>
                    <div class="grid-box">


                        <div class="item">
                            <a
                                href="{{ route('post.show', ['category' => $sportsPosts->first()->category->slug, 'slug' => $sportsPosts->first()->slug]) }}">
                                <img class="rounded" src="{{ $sportsPosts->first()->featured_image }}" alt="">
                                <div class="p-2">
                                    <h3 class=" topnews-title">{{ $sportsPosts->first()->title }}</h3>
                                    <p class="hotnews-short-text ">{{ $sportsPosts->first()->excerpt }}
                                    </p>
                                </div>
                            </a>
                        </div>


                        @foreach ($sportsPosts as $post)
                            <div class="item">
                                <a
                                    href="{{ route('post.show', ['category' => $post->category->slug, 'slug' => $post->slug]) }}">

                                    <img class="rounded" src="{{ $post->featured_image }}" alt="">
                                    <div class="p-2">
                                        <h3 class=" secondpost-title">{{ $post->title }}</h3>

                                    </div>
                                </a>
                            </div>
                        @endforeach
                        {{-- <div class="item">
                        <img class="rounded"
                            src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/root-20250821221434.jpg"
                            alt="">
                        <div class="p-2">
                            <div class=" title">মাত্র ২৭ টেস্ট পর শচিনের সর্বোচ্চ রানের রেকর্ড
                                ভেঙে দেবেন রুট! ৩</div>

                        </div>
                    </div>
                    <div class="item">
                        <img class="rounded"
                            src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/root-20250821221434.jpg"
                            alt="">
                        <div class="p-2">
                            <div class=" title">মাত্র ২৭ টেস্ট পর শচিনের সর্বোচ্চ রানের রেকর্ড
                                ভেঙে দেবেন রুট! ৪</div>
                            <div class="text-muted" style="font-size: 1px;">
                                <i class="fa-regular fa-clock"></i> ১:৫৫ মিনিট
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img class="rounded"
                            src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/root-20250821221434.jpg"
                            alt="">
                        <div class="p-2">
                            <div class="fw-bold title">মাত্র ২৭ টেস্ট পর শচিনের সর্বোচ্চ রানের রেকর্ড
                                ভেঙে দেবেন রুট! ৫</div>

                        </div>
                    </div> --}}
                    </div>
                </div>
            </div>
        </section>
    @endif
    @php
        $nationals = $categories->find(7);
        $nationalPosts = $nationals ? $nationals->posts()->latest()->get() : collect();
    @endphp
    @if ($nationalPosts && $nationalPosts?->count() > 0)
        <section id="national_area" class="mb-3">
            <div class="wrapper">
                {{-- <div class="row">
                <div class="col-md-9"> --}}


                <div class="national_container border p-3 rounded ">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="header"><i class="fa-solid fa-newspaper"></i> জাতীয়</div>
                        <a href="#" class="text-decoration-none fw-bold">
                            জাতীয় সব নিউজ <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    </div>

                    <div class="national-box">
                        <div class="row">


                            <div class="col-md-4">
                                <div class="item mb-2 ">
                                    <a
                                        href="{{ route('post.show', ['category' => $nationalPosts->first()->category->slug, 'slug' => $nationalPosts->first()->slug]) }}">

                                        <img class="rounded" src="{{ $nationalPosts->first()->featured_image }}"
                                            alt="">
                                        <div class="p-2">
                                            <h3 class="topnews-title">{{ $nationalPosts->first()->title }}
                                            </h3>
                                            <div class="hotnews-short-text">
                                                {{ $nationalPosts->first()->excerpt }}
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                            <div class="col-md-4">
                                @foreach ($nationalPosts->slice(1, 4) as $post)
                                    <div class="item mb-2">
                                        <a
                                            href="{{ route('post.show', ['category' => $post->category->slug, 'slug' => $post->slug]) }}">

                                            <div class="row">
                                                <div class="col-4">
                                                    <img class="rounded" src="{{ $post->featured_image }}" lazy
                                                        alt="">
                                                </div>
                                                <div class="col-8">
                                                    <div class="">
                                                        <div class="secondpost-title">{{ $post->title }}</div>
                                                        <div class="text-muted" style="font-size: 13px;">
                                                            <i class="fa-regular fa-clock"></i> Last updated
                                                            {{ $post->updated_at->diffForHumans() }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>


                                    </div>
                                @endforeach
                                {{-- <div class="item mb-2">
                                        <div class="row">
                                            <div class="col-4">
                                                <img class="rounded"
                                                    src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/root-20250821221434.jpg"
                                                    alt="">
                                            </div>
                                            <div class="col-8">
                                                <div class="">
                                                    <div class="fw-bold" style="font-size: 16px;">মাত্র ২৭ টেস্ট পর শচিনের
                                                        সর্বোচ্চ রানের
                                                        রেকর্ড
                                                        ভেঙে দেবেন রুট! ১</div>
                                                    <div class="text-muted" style="font-size: 13px;">
                                                        <i class="fa-regular fa-clock"></i> ১৫ মিনিট আগে
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="item mb-2">
                                        <div class="row">
                                            <div class="col-4">
                                                <img class="rounded"
                                                    src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/root-20250821221434.jpg"
                                                    alt="">
                                            </div>
                                            <div class="col-8">
                                                <div class="">
                                                    <div class="fw-bold" style="font-size: 16px;">মাত্র ২৭ টেস্ট পর শচিনের
                                                        সর্বোচ্চ রানের
                                                        রেকর্ড
                                                        ভেঙে দেবেন রুট! ১</div>
                                                    <div class="text-muted" style="font-size: 13px;">
                                                        <i class="fa-regular fa-clock"></i> ১৫ মিনিট আগে
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="item mb-2">
                                        <div class="row">
                                            <div class="col-4">
                                                <img class="rounded"
                                                    src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/root-20250821221434.jpg"
                                                    alt="">
                                            </div>
                                            <div class="col-8">
                                                <div class="">
                                                    <div class="fw-bold" style="font-size: 16px;">মাত্র ২৭ টেস্ট পর শচিনের
                                                        সর্বোচ্চ রানের
                                                        রেকর্ড
                                                        ভেঙে দেবেন রুট! ১</div>
                                                    <div class="text-muted" style="font-size: 13px;">
                                                        <i class="fa-regular fa-clock"></i> ১৫ মিনিট আগে
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div> --}}

                            </div>
                            <div class="col-md-4">
                                @foreach ($nationalPosts->slice(4, 4) as $post)
                                    <div class="item mb-2">
                                        <a
                                            href="{{ route('post.show', ['category' => $post->category->slug, 'slug' => $post->slug]) }}">

                                            <div class="row">
                                                <div class="col-4">
                                                    <img class="rounded" src="{{ $post->featured_image }}" lazy
                                                        alt="">
                                                </div>
                                                <div class="col-8">
                                                    <div class="">
                                                        <div class="secondpost-title">{{ $post->title }}</div>
                                                        <div class="text-muted" style="font-size: 13px;">
                                                            <i class="fa-regular fa-clock"></i> Last updated
                                                            {{ $post->updated_at->diffForHumans() }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                @endforeach
                                {{-- <div class="item mb-2">
                                        <div class="row">
                                            <div class="col-4">
                                                <img class="rounded"
                                                    src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/root-20250821221434.jpg"
                                                    alt="">
                                            </div>
                                            <div class="col-8">
                                                <div class="">
                                                    <div class="fw-bold" style="font-size: 16px;">মাত্র ২৭ টেস্ট পর শচিনের
                                                        সর্বোচ্চ রানের
                                                        রেকর্ড
                                                        ভেঙে দেবেন রুট! ১</div>
                                                    <div class="text-muted" style="font-size: 13px;">
                                                        <i class="fa-regular fa-clock"></i> ১৫ মিনিট আগে
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="item mb-2">
                                        <div class="row">
                                            <div class="col-4">
                                                <img class="rounded"
                                                    src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/root-20250821221434.jpg"
                                                    alt="">
                                            </div>
                                            <div class="col-8">
                                                <div class="">
                                                    <div class="fw-bold" style="font-size: 16px;">মাত্র ২৭ টেস্ট পর শচিনের
                                                        সর্বোচ্চ রানের
                                                        রেকর্ড
                                                        ভেঙে দেবেন রুট! ১</div>
                                                    <div class="text-muted" style="font-size: 13px;">
                                                        <i class="fa-regular fa-clock"></i> ১৫ মিনিট আগে
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="item mb-2">
                                        <div class="row">
                                            <div class="col-4">
                                                <img class="rounded"
                                                    src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/root-20250821221434.jpg"
                                                    alt="">
                                            </div>
                                            <div class="col-8">
                                                <div class="">
                                                    <div class="fw-bold" style="font-size: 16px;">মাত্র ২৭ টেস্ট পর শচিনের
                                                        সর্বোচ্চ রানের
                                                        রেকর্ড
                                                        ভেঙে দেবেন রুট! ১</div>
                                                    <div class="text-muted" style="font-size: 13px;">
                                                        <i class="fa-regular fa-clock"></i> ১৫ মিনিট আগে
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="item mb-2">
                                        <div class="row">
                                            <div class="col-4">
                                                <img class="rounded"
                                                    src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/root-20250821221434.jpg"
                                                    alt="">
                                            </div>
                                            <div class="col-8">
                                                <div class="">
                                                    <div class="fw-bold" style="font-size: 16px;">মাত্র ২৭ টেস্ট পর শচিনের
                                                        সর্বোচ্চ রানের
                                                        রেকর্ড
                                                        ভেঙে দেবেন রুট! ১</div>
                                                    <div class="text-muted" style="font-size: 13px;">
                                                        <i class="fa-regular fa-clock"></i> ১৫ মিনিট আগে
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div> --}}

                            </div>

                        </div>
                    </div>

                </div>
            </div>
            {{-- <div class="col-md-3"></div>
            </div> --}}
            </div>
        </section>
    @endif
    @php
        $international = $categories->find(6);
        $internationalPosts = $international ? $international->posts()->latest()->get() : collect();

    @endphp
    @if ($internationalPosts && $internationalPosts?->count() > 0)
        <section id="international_area" class="mb-3">
            <div class="wrapper">
                <div class="international_container border p-3 rounded ">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="header"><i class="fa-solid fa-newspaper"></i> আন্তর্জাতিক</div>
                        <a href="#" class="text-decoration-none fw-bold">
                            আন্তর্জাতিক সব নিউজ <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    </div>
                    <div class="international-box">
                        @php
                            $international = $categories->find(6);
                            $internationalPosts = $international ? $international->posts()->latest()->get() : collect();

                        @endphp
                        <div class="row">

                            <div class="col-md-4">
                                @foreach ($internationalPosts->slice(1, 4) as $post)
                                    <div class="item mb-3">
                                        <a
                                            href="{{ route('post.show', ['category' => $post->category->slug, 'slug' => $post->slug]) }}">

                                            <div class="row">
                                                <div class="col-4">
                                                    <img class="rounded" src="{{ $post->featured_image }}"
                                                        alt="">
                                                </div>
                                                <div class="col-8">
                                                    <div class="">
                                                        <h3 class="secondpost-title">{{ $post->title }}
                                                        </h3>

                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                @endforeach
                                {{-- <div class="item mb-3">
                                <div class="row">
                                    <div class="col-4">
                                        <img class="rounded"
                                            src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/trump-uganda-20250821215756.jpg"
                                            alt="">
                                    </div>
                                    <div class="col-8">
                                        <div class="">
                                            <div class="fw-bold" style="font-size: 18px;">
                                                মার্কিন বিনিয়োগকৃত প্রতিষ্ঠানে রুশ হামলা
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="item mb-3">
                                <div class="row">
                                    <div class="col-4">
                                        <img class="rounded"
                                            src="https://cdn.jagonews24.com/media/imgAllNew/SM/2023March/boeing-20250821201815.jpg"
                                            alt="">
                                    </div>
                                    <div class="col-8">
                                        <div class="">
                                            <div class="fw-bold" style="font-size: 18px;">
                                                আমাদের আদর্শগত শত্রু বিজেপি, বললেন থালাপতি বিজয়
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="item mb-3">
                                <div class="row">
                                    <div class="col-4">
                                        <img class="rounded"
                                            src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/trump-uganda-20250821215756.jpg"
                                            alt="">
                                    </div>
                                    <div class="col-8">
                                        <div class="">
                                            <div class="fw-bold" style="font-size: 18px;">
                                                টেলিকম প্রতিষ্ঠানকে ব্যবহার করে গোয়েন্দা নজরদারির গোমর ফাঁস
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div> --}}

                            </div>
                            <div class="col-md-4">
                                <div class="item">
                                    <a
                                        href="{{ route('post.show', ['category' => $internationalPosts->first()->category->slug, 'slug' => $internationalPosts->first()->slug]) }}">

                                        <img class="rounded" src="{{ $internationalPosts->first()->featured_image }}"
                                            alt="">
                                        <div class="p-2">
                                            <h3 class="secondpost-title">{{ $internationalPosts->first()->title }}</h3>
                                            <div class="hotnews-short-text">{{ $internationalPosts->first()->excerpt }}
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>

                            <div class="col-md-4">
                                @foreach ($internationalPosts->slice(4, 4) as $post)
                                    <div class="item mb-3">
                                        <a
                                            href="{{ route('post.show', ['category' => $post->category->slug, 'slug' => $post->slug]) }}">

                                            <div class="row">
                                                <div class="col-4">
                                                    <img class="rounded" src="{{ $post->featured_image }}"
                                                        alt="">
                                                </div>
                                                <div class="col-8">
                                                    <div class="">
                                                        <h3 class="secondpost-title">{{ $post->title }}
                                                        </h3>

                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                @endforeach
                                {{-- <div class="item mb-3">
                                <div class="row">
                                    <div class="col-4">
                                        <img class="rounded"
                                            src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/trump-uganda-20250821215756.jpg"
                                            alt="">
                                    </div>
                                    <div class="col-8">
                                        <div class="">
                                            <div class="fw-bold" style="font-size: 18px;">
                                                মোটরযানমুক্ত আধুনিক শহর, দেখেই চোখ জুড়ায় (ভিডিও)
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="item mb-3">
                                <div class="row">
                                    <div class="col-4">
                                        <img class="rounded"
                                            src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/root-20250821221434.jpg"
                                            alt="">
                                    </div>
                                    <div class="col-8">
                                        <div class="">
                                            <div class="fw-bold" style="font-size: 18px;">
                                                ৮ মামলায় ইমরান খানের জামিন
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="item mb-3">
                                <div class="row">
                                    <div class="col-4">
                                        <img class="rounded"
                                            src="https://cdn.jagonews24.com/media/imgAllNew/SM/2023March/gun-attack-teacher-student-20250821203415.jpg"
                                            alt="">
                                    </div>
                                    <div class="col-8">
                                        <div class="">
                                            <div class="fw-bold" style="font-size: 18px;">
                                                মোটরযানমুক্ত আধুনিক শহর, দেখেই চোখ জুড়ায় (ভিডিও)</div>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="item mb-3">
                                <div class="row">
                                    <div class="col-4">
                                        <img class="rounded"
                                            src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/trump-uganda-20250821215756.jpg"
                                            alt="">
                                    </div>
                                    <div class="col-8">
                                        <div class="">
                                            <div class="fw-bold" style="font-size: 18px;">মাত্র ২৭ টেস্ট পর শচিনের
                                                যুক্তরাষ্ট্র থেকে বিতাড়িত আশ্রয়প্রার্থীদের নিতে রাজি উগান্ডা</div>

                                        </div>
                                    </div>
                                </div>


                            </div> --}}

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif
    @php
        $entertainment = $categories->find(4);
        $entertainmentPosts = $entertainment ? $entertainment->posts()->latest()->get() : collect();

    @endphp
    @if ($entertainmentPosts && $entertainmentPosts?->count() > 0)
        <section id="entertainment_area" class="mb-3">
            <div class="wrapper">

                <div class="entertainment_container border p-3 rounded ">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="header"><i class="fa-solid fa-newspaper"></i> বিনোদন</div>
                        <a href="#" class="text-decoration-none bold">
                            বিনোদন সব নিউজ <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    </div>
                    <div class="entertainment-box">

                        <div class="row ">
                            <div class="col-md-3">
                                @foreach ($entertainmentPosts->slice(1, 2) as $post)
                                    <div class="item py-3 border-bottom border-light-subtle ">
                                        <a
                                            href="{{ route('post.show', ['category' => $post->category->slug, 'slug' => $post->slug]) }}">


                                            <img class=" w-100" src="{{ $post->featured_image }}" alt="">


                                            <div class="">
                                                <h3 class=" secondpost-title">{{ $post->title }}
                                                </h3>

                                            </div>
                                        </a>



                                    </div>
                                @endforeach
                                {{-- <div class="item py-3 border-bottom border-light-subtle ">

                                <img class="rounded w-100"
                                    src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/trump-uganda-20250821215756.jpg"
                                    alt="">

                                <div class="">
                                    <div class="fw-bold" style="font-size: 18px;">
                                        মার্কিন বিনিয়োগকৃত প্রতিষ্ঠানে রুশ হামলা
                                    </div>

                                </div>


                            </div> --}}
                            </div>
                            <div class="col-md-6">
                                <div class="item  py-3 border-bottom border-light-subtle">
                                    <a
                                        href="{{ route('post.show', ['category' => $entertainmentPosts->first()->category->slug, 'slug' => $entertainmentPosts->first()->slug]) }}">

                                        <img class="rounded" src="{{ $entertainmentPosts->first()->featured_image }}"
                                            alt="">
                                        <div class="p-2">
                                            <h3 class=" secondpost-title">{{ $entertainmentPosts->first()->title }}</h3>
                                            <div class="hotnews-short-description">
                                                {{ $entertainmentPosts->first()->excerpt }}
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>

                            <div class="col-md-3">
                                @foreach ($entertainmentPosts->slice(3, 2) as $post)
                                    <div class="item py-3 border-bottom border-light-subtle ">
                                        <a
                                            href="{{ route('post.show', ['category' => $post->category->slug, 'slug' => $post->slug]) }}">


                                            <img class=" w-100" src="{{ $post->featured_image }}" alt="">


                                            <div class="">
                                                <h3 class="secondpost-title">{{ $post->title }}
                                                </h3>

                                            </div>
                                        </a>



                                    </div>
                                @endforeach
                                {{-- <div class="item py-3 border-bottom border-light-subtle ">

                                <img class=" w-100"
                                    src="https://cdn.jagonews24.com/media/imgAllNew/SM/2023March/boeing-20250821201815.jpg"
                                    alt="">

                                <div class="">
                                    <div class="fw-bold" style="font-size: 18px;">
                                        আমাদের আদর্শগত শত্রু বিজেপি, বললেন থালাপতি বিজয়
                                    </div>

                                </div>



                            </div>
                            <div class="item py-3 border-bottom border-light-subtle ">

                                <img class=" w-100"
                                    src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/trump-uganda-20250821215756.jpg"
                                    alt="">

                                <div class="">
                                    <div class="fw-bold" style="font-size: 18px;">
                                        টেলিকম প্রতিষ্ঠানকে ব্যবহার করে গোয়েন্দা নজরদারির গোমর ফাঁস
                                    </div>

                                </div>



                            </div> --}}

                            </div>
                            <div class="col-12">
                                <div class="row">
                                    @foreach ($entertainmentPosts->slice(5, 4) as $post)
                                        <div class="col-6 col-lg-3 item py-3 border-bottom border-light-subtle ">
                                            <a
                                                href="{{ route('post.show', ['category' => $post->category->slug, 'slug' => $post->slug]) }}">


                                                <img class=" w-100" src="{{ $post->featured_image }}" alt="">


                                                <div class="">
                                                    <h3 class="secondpost-title">{{ $post->title }}
                                                    </h3>

                                                </div>
                                            </a>


                                        </div>
                                    @endforeach
                                    {{-- <div class="col-6 col-lg-3 item py-3 border-bottom border-light-subtle ">

                                    <img class=" w-100"
                                        src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/trump-uganda-20250821215756.jpg"
                                        alt="">

                                    <div class="">
                                        <div class="fw-bold" style="font-size: 18px;">
                                            মার্কিন বিনিয়োগকৃত প্রতিষ্ঠানে রুশ হামলা
                                        </div>

                                    </div>


                                </div>
                                <div class="col-6 col-lg-3 item py-3 border-bottom border-light-subtle ">

                                    <img class=" w-100"
                                        src="https://cdn.jagonews24.com/media/imgAllNew/SM/2023March/boeing-20250821201815.jpg"
                                        alt="">

                                    <div class="">
                                        <div class="fw-bold" style="font-size: 18px;">
                                            আমাদের আদর্শগত শত্রু বিজেপি, বললেন থালাপতি বিজয়
                                        </div>

                                    </div>



                                </div>
                                <div class="col-6 col-lg-3 item py-3 border-bottom border-light-subtle ">

                                    <img class=" w-100"
                                        src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/trump-uganda-20250821215756.jpg"
                                        alt="">

                                    <div class="">
                                        <div class="fw-bold" style="font-size: 18px;">
                                            টেলিকম প্রতিষ্ঠানকে ব্যবহার করে গোয়েন্দা নজরদারির গোমর ফাঁস
                                        </div>

                                    </div>



                                </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif
@endsection
@push('scripts')
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 1.5
                },
                768: {
                    items: 2.5
                },
                992: {
                    items: 3.5
                },
                1200: {
                    items: 4.5
                },

            }
        })
    </script>
@endpush

@extends('layouts.website')
@section('content')
    <section id="featured_news" class="mt-4 mb-3">
        <div class="wrapper">
            <div class="row align-items-stretch">
                <div class="col-md-9">
                    <div class="border p-3 rounded ">


                        <div class="row">
                            <div class="col-md-8">
                                 @if($latestPost)
                                <a href="{{ route('singlepost',$latestPost->first()?->slug) }}">

                                    <div class="card mb-3 p-2 rounded ">
                                        <div class="row flex-column g-0">
                                            <div class="col-auto">

                                                <img style="height: 100%; "
                                                    src="{{asset('storage/'.$latestPost->first()->media->where('category','featured_image')->first()->path)}}"
                                                    class="img-fluid rounded-start" alt="...">
                                            </div>
                                            <div class="col-auto">
                                                <div class="card-body">

                                                    <h5 class="card-title fw-bold">{{$latestPost->first()->title}}
                                                    </h5>
                                                    <p class="card-text " style="font-size: 12px">
                                                        {{$latestPost->first()->excerpt}}</p>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @else
                                <a href="{{ route('post') }}">
                                    <div class="card mb-3 p-2 rounded ">
                                        <div class="row flex-column g-0">
                                            <div class="col-auto">
                                                <img style="height: 100%; width: cover;"
                                                    src="https://www.kalbela.com/assets/news_photos/2025/08/18/image_214577_1755532555.webp"
                                                    class="img-fluid rounded-start" alt="...">
                                            </div>
                                            <div class="col-auto">
                                                <div class="card-body">

                                                    <h5 class="card-title fw-bold">এক টাকাও খরচ করতে পারেনি ১২ মন্ত্রণালয় ও বিভাগ
                                                    </h5>
                                                    <p class="card-text " style="font-size: 12px">
                                                        গত অর্থবছরের ধারবাহিকতায় চলতি অর্থবছরেও এডিপি বাস্তবায়নে বেহাল দশা
                                                        দেখা
                                                        দিয়েছে। সদ্য শুরু হওয়া ২০২৫-২৬ অর্থবছরের এক মাস পেরিয়ে গেলেও সব
                                                        মন্ত্রণালয় ও বিভাগ মিলে বরাদ্দের ১ শতাংশও বাস্তবায়ন করতে পারেনি। আর
                                                        বার্ষিক উন্নয়ন কর্মসূচিতে (এডিপি) বরাদ্দ থাকলেও খরচের খাতা খুলতে
                                                        পারেনি
                                                        ১২টি মন্ত্রণালয় ও বিভাগ। বাকিরা খাতা খুললেও নাম </p>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @endif
                                <div class="row g-2">


                                    <div class="col-md-4">
                                        <a href="{{ route('post') }}">
                                            <div class="card">
                                                <img src="https://www.kalbela.com/assets/news_photos/2025/08/19/image_214696_1755563348.webp"
                                                    class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title fw-bold">এনসিপির কেন্দ্রীয় নেতা মাহিন সরকারকে বহিষ্কার</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{ route('post') }}">
                                            <div class="card">
                                                <img src="https://www.kalbela.com/assets/news_photos/2025/08/18/image_214597_1755539947.webp"
                                                    class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title fw-bold">এনসিপির কেন্দ্রীয় নেতা মাহিন সরকারকে বহিষ্কার</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{ route('post') }}">
                                            <div class="card">
                                                <img src="https://www.kalbela.com/assets/news_photos/2025/08/19/image_214696_1755563348.webp"
                                                    class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title fw-bold">এনসিপির কেন্দ্রীয় নেতা মাহিন সরকারকে বহিষ্কার</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">

                                <div class=" ">
                                    <a href="{{ route('post') }}">
                                        <div class="card mb-3">
                                            <img src="https://www.kalbela.com/assets/news_photos/2025/08/18/image_214597_1755539947.webp"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title fw-bold">এনসিপির কেন্দ্রীয় নেতা মাহিন সরকারকে বহিষ্কার</h5>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ route('post') }}">
                                        <div class="card mb-3">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    <img style="height: 100%; width: cover;"
                                                        src="https://www.kalbela.com/assets/news_photos/2025/08/18/image_214577_1755532555.webp"
                                                        class="img-fluid rounded-start" alt="...">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title fw-bold">এক টাকাও খরচ করতে পারেনি ১২ মন্ত্রণালয় ও
                                                            বিভাগ
                                                        </h5>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ route('post') }}">
                                        <div class="card mb-3">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    <img style="height: 100%; width: cover;"
                                                        src="https://www.kalbela.com/assets/news_photos/2025/08/18/image_214577_1755532555.webp"
                                                        class="img-fluid rounded-start" alt="...">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title fw-bold">এক টাকাও খরচ করতে পারেনি ১২ মন্ত্রণালয় ও
                                                            বিভাগ
                                                        </h5>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ route('post') }}">
                                        <div class="card mb-3">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    <img style="height: 100%; width: cover;"
                                                        src="https://www.kalbela.com/assets/news_photos/2025/08/18/image_214577_1755532555.webp"
                                                        class="img-fluid rounded-start" alt="...">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title fw-bold">এক টাকাও খরচ করতে পারেনি ১২ মন্ত্রণালয় ও
                                                            বিভাগ
                                                        </h5>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-3 h-100">

                    <div class="border p-3 rounded ">
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
                            <div class="fw-bold" style="font-size: 18px;">ভিডিও শিরোনাম ১</div>
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
                        <img class="rounded"
                            src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/root-20250821221434.jpg"
                            alt="">
                        <div class="p-2">
                            <div class="fw-bold title" >মাত্র ২৭ টেস্ট পর শচিনের সর্বোচ্চ রানের রেকর্ড
                                ভেঙে দেবেন রুট! ১</div>
                            <div class="text-muted" style="font-size: 16px;">
                                ‘বাজবল ক্রিকেটে’র যুগ এখন। বিশেষ করে ইংল্যান্ড এই বাজবল ক্রিকেটকে সবচেয়ে বেশি ব্যবহার করছে।
                                ক্রিকেটের নতুন ফরমেশনের যুগে একজন ব্যাটার তরতর করে শচিন টেন্ডুলকারের রেকর্ড ভাঙার দিকে এগিয়ে
                                যাচ্ছে...
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img class="rounded"
                            src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/root-20250821221434.jpg"
                            alt="">
                        <div class="p-2">
                            <div class="fw-bold title" >মাত্র ২৭ টেস্ট পর শচিনের সর্বোচ্চ রানের রেকর্ড
                                ভেঙে দেবেন রুট! ২</div>

                        </div>
                    </div>
                    <div class="item">
                        <img class="rounded"
                            src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/root-20250821221434.jpg"
                            alt="">
                        <div class="p-2">
                            <div class="fw-bold title" >মাত্র ২৭ টেস্ট পর শচিনের সর্বোচ্চ রানের রেকর্ড
                                ভেঙে দেবেন রুট! ৩</div>

                        </div>
                    </div>
                    <div class="item">
                        <img class="rounded"
                            src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/root-20250821221434.jpg"
                            alt="">
                        <div class="p-2">
                            <div class="fw-bold title" >মাত্র ২৭ টেস্ট পর শচিনের সর্বোচ্চ রানের রেকর্ড
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
                            <div class="fw-bold title" >মাত্র ২৭ টেস্ট পর শচিনের সর্বোচ্চ রানের রেকর্ড
                                ভেঙে দেবেন রুট! ৫</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="national_area" class="mb-3">
        <div class="wrapper">
            <div class="row">
                <div class="col-md-9">


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
                                        <img class="rounded"
                                            src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/root-20250821221434.jpg"
                                            alt="">
                                        <div class="p-2">
                                            <div class="fw-bold" style="font-size: 18px;">মাত্র ২৭ টেস্ট পর শচিনের
                                                সর্বোচ্চ রানের
                                                রেকর্ড
                                                ভেঙে দেবেন রুট! ১</div>
                                            <div class="text-muted" style="font-size: 16px;">
                                                ‘বাজবল ক্রিকেটে’র যুগ এখন। বিশেষ করে ইংল্যান্ড এই বাজবল ক্রিকেটকে সবচেয়ে
                                                বেশি
                                                ব্যবহার করছে।
                                                ক্রিকেটের নতুন ফরমেশনের যুগে একজন ব্যাটার তরতর করে শচিন টেন্ডুলকারের রেকর্ড
                                                ভাঙার
                                                দিকে এগিয়ে
                                                যাচ্ছে...
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4">
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

                                </div>
                                <div class="col-md-4">
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

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>
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

                    <div class="row">
                        <div class="col-md-4">
                            <div class="item mb-3">
                                <div class="row">
                                    <div class="col-4">
                                        <img class="rounded"
                                            src="https://cdn.jagonews24.com/media/imgAllNew/SM/2023March/boeing-20250821201815.jpg"
                                            alt="">
                                    </div>
                                    <div class="col-8">
                                        <div class="">
                                            <div class="fw-bold" style="font-size: 18px;">জেলেনস্কির টার্গেট তুরস্ক,
                                                অস্ট্রিয়া ও সুইজারল্যান্ড
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


                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="item">
                                <img class="rounded"
                                    src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/trump-uganda-20250821215756.jpg"
                                    alt="">
                                <div class="p-2">
                                    <div class="fw-bold" style="font-size: 18px;">যুক্তরাষ্ট্র থেকে বিতাড়িত
                                        আশ্রয়প্রার্থীদের নিতে রাজি উগান্ডা</div>
                                    <div class="text-muted" style="font-size: 16px;">
                                        শর্ত হিসেবে বলা হয়েছে, এসব আশ্রয়প্রার্থীদের যেন কোনো অপরাধমূলক রেকর্ড না থাকে ও তারা
                                        যেন একা আসা শিশু না হয়। মন্ত্রণালয় আরও জানায়, চুক্তির বিস্তারিত কার্যপ্রণালি এখনো
                                        নির্ধারণের পর্যায়ে রয়েছে...
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4">
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


                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <section id="entertainment_area" class="mb-3">
        <div class="wrapper">
            <div class="entertainment_container border p-3 rounded ">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="header"><i class="fa-solid fa-newspaper"></i> বিনোদন</div>
                    <a href="#" class="text-decoration-none fw-bold">
                        বিনোদন সব নিউজ <i class="fa-solid fa-chevron-right"></i>
                    </a>
                </div>
                <div class="entertainment-box">

                    <div class="row ">
                        <div class="col-md-3">
                            <div class="item py-3 border-bottom border-light-subtle ">


                                <img class=" w-100"
                                    src="https://cdn.jagonews24.com/media/imgAllNew/SM/2023March/boeing-20250821201815.jpg"
                                    alt="">


                                <div class="">
                                    <div class="fw-bold" style="font-size: 18px;">জেলেনস্কির টার্গেট তুরস্ক,
                                        অস্ট্রিয়া ও সুইজারল্যান্ড
                                    </div>

                                </div>



                            </div>
                            <div class="item py-3 border-bottom border-light-subtle ">

                                <img class="rounded w-100"
                                    src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/trump-uganda-20250821215756.jpg"
                                    alt="">

                                <div class="">
                                    <div class="fw-bold" style="font-size: 18px;">
                                        মার্কিন বিনিয়োগকৃত প্রতিষ্ঠানে রুশ হামলা
                                    </div>

                                </div>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="item  py-3 border-bottom border-light-subtle">
                                <img class="rounded"
                                    src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/trump-uganda-20250821215756.jpg"
                                    alt="">
                                <div class="p-2">
                                    <div class="fw-bold" style="font-size: 18px;">যুক্তরাষ্ট্র থেকে বিতাড়িত
                                        আশ্রয়প্রার্থীদের নিতে রাজি উগান্ডা</div>
                                    <div class="text-muted" style="font-size: 16px;">
                                        শর্ত হিসেবে বলা হয়েছে, এসব আশ্রয়প্রার্থীদের যেন কোনো অপরাধমূলক রেকর্ড না থাকে ও তারা
                                        যেন একা আসা শিশু না হয়। মন্ত্রণালয় আরও জানায়, চুক্তির বিস্তারিত কার্যপ্রণালি এখনো
                                        নির্ধারণের পর্যায়ে রয়েছে...
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="item py-3 border-bottom border-light-subtle ">

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



                            </div>

                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6 col-lg-3 item py-3 border-bottom border-light-subtle ">


                                    <img class=" w-100"
                                        src="https://cdn.jagonews24.com/media/imgAllNew/SM/2023March/boeing-20250821201815.jpg"
                                        alt="">


                                    <div class="">
                                        <div class="fw-bold" style="font-size: 18px;">জেলেনস্কির টার্গেট তুরস্ক,
                                            অস্ট্রিয়া ও সুইজারল্যান্ড
                                        </div>

                                    </div>



                                </div>
                                <div class="col-6 col-lg-3 item py-3 border-bottom border-light-subtle ">

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



                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
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

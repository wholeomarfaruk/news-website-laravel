<section id="singlepost">

    @foreach ($allPosts as $currentpost)
        <div class="wrapper my-3">
            <div wire:ignore class="ad bg-dark bg-opacity-50 d-flex justify-content-center align-items-center mb-3"
                style="height: 100px">
                <span class="text-danger fs-3">For Ad</span>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="breadcrum">
                        <i class="fa-solid fa-home"></i> / <a class="fs-bold text-primary"
                            href="#">{{ $currentpost->category->name }}</a>
                    </div>
                    <div class="rpt_info_section border-bottom mb-2 pb-2">
                        <div class="rpt_name mt-2"><i class="fa-solid fa-circle-user me-2"></i>
                            {{ $currentpost?->author?->name }}
                        </div>

                        <div class="entry_update mb-0"><span class="Layer_1" style="float: left"><svg id="Layer_1"
                                    data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13.95 16">
                                    <defs>
                                        <style>
                                            .cls-1 {
                                                fill: #121212;
                                            }
                                        </style>
                                    </defs>
                                    <path class="cls-1"
                                        d="M13.65,5.2,7.78.27a1.26,1.26,0,0,0-1.56,0L.35,5.2c-.69.59-.2,1.59.79,1.59H12.86C13.85,6.79,14.34,5.79,13.65,5.2Z"
                                        transform="translate(-0.03 0)"></path>
                                    <path class="cls-1"
                                        d="M.35,10.8l5.87,4.93a1.26,1.26,0,0,0,1.56,0l5.87-4.93c.69-.59.2-1.59-.79-1.59H1.14C.15,9.21-.34,10.21.35,10.8Z"
                                        transform="translate(-0.03 0)"></path>
                                </svg></span>
                            <div style="display: inline-block; width: 90%; padding-left: 5px;"> প্রকাশ
                                : <span id="post_date"></span></div>
                        </div>
                        <div class="edition"><i class="fa-solid fa-square-pen me-2"></i>অনলাইন সংস্করণ
                        </div>
                    </div>
                    <div wire:ignore id="related_news">
                        <style type="text/css">
                            .dtl_content_block {
                                text-align: left !important;
                            }

                            div.hl a {
                                font-size: 16px;
                                line-height: 20px;
                                color: #000;
                                font-weight: bold;
                            }

                            .more_dtl_news img.news_img {
                                height: 170px;
                                width: auto
                            }

                            .more_news_vedio {
                                position: absolute;
                                top: 32%;
                                left: 40%;
                            }

                            #morenews_content .more_dtl_news .news_headline {
                                font-size: 18px;
                                font-weight: bold;
                            }

                            .dtl_tags_news_title {
                                display: inline-block;
                                border-left: 5px solid #959595;
                                margin-top: 15px;
                                margin-bottom: 15px;
                                padding-left: 10px;
                            }

                            .more_dtl_news:hover .hl>a {
                                color: #0573e6 !important;
                            }

                            #related_news .flex-content .img-content {
                                width: 80px;
                            }

                            #related_news .sub-news h4.title {
                                font-size: 15px !important;
                            }

                            #related_news .sub-news:first-child .news-separator-horizontal-border {
                                border: none;
                            }
                        </style>
                        <div wire:ignore class="row">
                            <div class="col-md-12">
                                <div class="dtl_tags_news_title"><a href="#"> এ সম্পর্কিত আরও খবর</a></div>
                                <div class="border-bottom mb-2"></div>
                            </div>
                        </div>
                        <div wire:ignore class="common-border-box col-md-10">
                            <div class="selected-news ">
                                @foreach ($relatedPosts as $relatedpost)
                                    <div class="sub-news mb-3">
                                        <div class="news-separator-horizontal-border"></div>
                                        <div class="flex-content position-relative" id="flex-left-image">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-2">
                                                    <a class="_link"
                                                        href="{{ route('post.show', ['category' => $relatedpost->category->slug, 'slug' => $relatedpost->slug]) }}">
                                                        <div class="img-content position-relative text-center"><span
                                                                class="imgWrep"><img
                                                                    class="images img-fluid news_img detailImg"
                                                                    src="{{ $relatedpost->featured_image }}"
                                                                    title="{{ $relatedpost->title }}"
                                                                    alt="{{ $relatedpost->title }}"></span></div>
                                                    </a>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <!-- <h4 class="title"></h4> -->
                                                    <a class="_link"
                                                        href="{{ route('post.show', ['category' => $relatedpost->category->slug, 'slug' => $relatedpost->slug]) }}">
                                                        <h4 class="title">
                                                            {{ $relatedpost->title }}</h4>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div wire:ignore class="col-md-6 ">
                    <div class="post-content">
                        <h3 class="title mb-3 secondpost-title">
                            {{ $currentpost->title }}
                        </h3>
                        <div class="rpt_name mt-2 secondpost-title"><i class="fa-solid fa-circle-user me-2"></i>
                            {{ $currentpost?->author?->name }}</div>
                        <div class="short-info mb-3"></div>
                        <div class="featured-img mb-3">
                            <img src="{{ $currentpost->featured_image }}" alt="">
                        </div>
                        <div class="authore">

                        </div>
                        <div id="content_area mb-3 ">
                            {!! $currentpost->content !!}

                        </div>
                        <div wire:ignore class="tags mb-3 mt-2">
                            <ul class="text-start ps-0">
                                <a href="#" class="px-3 py-1 border border-secondary me-1 d-inline-block">tags</a>
                                <a href="#" class="px-3 py-1 border border-secondary me-1 d-inline-block">tags</a>
                                <a href="#" class="px-3 py-1 border border-secondary me-1 d-inline-block">tags</a>

                            </ul>

                        </div>

                    </div>
                    <div class="ad bg-dark bg-opacity-50 d-flex justify-content-center align-items-center mb-3"
                        style="height: 100px">
                        <span class="text-danger fs-3">For Ad</span>
                    </div>
                    <div class="comment-box">
                        <div class="heading text-primary">
                            <h4>মন্তব্য করুন</h4>
                        </div>
                    </div>
                </div>
                <div wire:ignore class="col-md-3">
                    @livewire('latest-news-tab',[], key('latest-news-'.$currentpost->id))
                    <div class="ad bg-dark bg-opacity-50 d-flex justify-content-center align-items-center mb-3"
                        style="height: 400px">
                        <span class="text-danger fs-3">For Ad 1</span>
                    </div>

                    <div class="ad bg-dark bg-opacity-50 d-flex justify-content-center align-items-center mb-3"
                        style="height: 400px">
                        <span class="text-danger fs-3">For Ad 2</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Jokhon ei div viewport e dhukbe, tokhon next post load hobe -->
    <div x-data="{
        observe() {
            let observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        @this.call('loadNextPost')
                    }
                })
            }, {
                root: null
            })

            observer.observe(this.$el)
        }
    }" x-init="observe">


</div>

    {{-- <div x-intersect="$wire.loadNextPost()" class="h-10 bg-gray-200 flex items-center justify-center">
        Loading next post...
    </div> --}}
</section>

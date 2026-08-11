{{-- Assume this is the Livewire view for the component handling infinite scrolling --}}

<div id="singlepost-wrapper">
    <section id="singlepost">

        {{--
            1. Keep the styles outside the loop.
            2. The entire loop must be contained within a single element inside this component.
        --}}
        <style>
            .mobile.rpt_info_section,
            .mobile.breadcrum {
                display: none;
            }

            @media (max-width: 992px) {

                .desktop.rpt_info_section,
                .desktop.breadcrum {
                    display: none;
                }

                .mobile.rpt_info_section,
                .mobile.breadcrum {
                    display: block;
                }
            }

            .post-actions {
                display: flex;
                align-items: center;
                gap: 8px;
                margin-bottom: 12px;
            }

            .post-actions .post-action-btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 6px;
                border: 1px solid #dee2e6;
                background: #fff;
                color: #333;
                border-radius: 4px;
                padding: 6px 12px;
                font-size: 14px;
                cursor: pointer;
                transition: background-color .15s ease, color .15s ease;
            }

            .post-actions .post-action-btn:hover {
                background-color: #f1f3f5;
            }

            .post-actions .post-action-btn.copied {
                background-color: #198754;
                border-color: #198754;
                color: #fff;
            }

            @media print {
                body * {
                    visibility: hidden;
                }

                .post-wrapper.is-printing,
                .post-wrapper.is-printing .post-content,
                .post-wrapper.is-printing .post-content * {
                    visibility: visible;
                }

                .post-wrapper.is-printing {
                    position: absolute;
                    left: 0;
                    top: 0;
                    width: 100%;
                }

                .post-wrapper.is-printing .post-actions,
                .post-wrapper.is-printing .comment-box,
                .post-wrapper.is-printing .fb-comments {
                    display: none !important;
                }
            }
        </style>
        {{-- 🛑 IMPORTANT FIX: The entire list of posts --}}
        @foreach ($allPosts as $currentpost)
            <div class="wrapper my-3 post-wrapper" id="post-{{ $currentpost->id }}"
                data-url="{{ route('post.show', ['category' => $currentpost->category->slug, 'slug' => $currentpost->slug]) }}"
                {{-- 🎯 FIX 2: Apply a stable key to the post wrapper --}} wire:key="post-wrapper-{{ $currentpost->id }}">

                {{-- Content for a single post --}}
                @livewire('ad-component', ['id' => 4], key('ad-4-' . $currentpost->id))

                <div class="row">
                    {{-- Left column --}}
                    <div class="col-md-3 order-2 order-lg-1">
                        {{-- All left column content goes here --}}
                        <div class="breadcrum desktop">
                            <i class="fa-solid fa-home"></i> / <a class="fs-bold text-primary"
                                href="#">{{ $currentpost->category->name }}</a>
                        </div>
                        <div class="rpt_info_section desktop border-bottom mb-2 pb-2">
                            <div class="rpt_name mt-2"><i class="fa-solid fa-circle-user me-2"></i>
                                {{ $currentpost?->author?->title ?? 'Unknown' }}
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
                                    : <span class="post_date" data-date="{{ $currentpost->created_at }}">
                                        {{ $currentpost->created_at->locale('bn')->translatedFormat('d F Y, g:i A') }}


                                    </span></div>
                            </div>

                        </div>
                        {{-- NOTE: Removed wire:ignore from related_news as it might be too aggressive --}}
                        <div id="related_news">
                            {{-- ... Related News content (Ensure relatedPosts loop here uses keys if it's Livewire) ... --}}
                        </div>
                    </div>

                    {{-- Center column --}}
                    <div class="col-md-6 order-1 order-lg-2">
                        {{-- Post Content and Comments --}}
                        <div class="post-content">
                               <div class="breadcrum mobile">
                                <i class="fa-solid fa-home"></i> / <a class="fs-bold text-primary"
                                    href="#">{{ $currentpost->category->name }}</a>
                            </div>
                            <h3 class="title mb-3 topnews-title">
                                {{ $currentpost->title }}
                            </h3>

                            <div class="post-actions" x-data="{
                                copied: false,
                                downloading: false,
                                shareUrl: '{{ route('post.show', ['category' => $currentpost->category->slug, 'slug' => $currentpost->slug]) }}',
                                shareTitle: @js($currentpost->title),
                                downloadUrl: '{{ route('post.download-image', ['category' => $currentpost->category->slug, 'slug' => $currentpost->slug]) }}',
                                postSlug: @js($currentpost->slug),
                                postId: {{ $currentpost->id }},
                                share() {
                                    if (navigator.share) {
                                        navigator.share({ title: this.shareTitle, url: this.shareUrl }).catch(() => {})
                                    } else {
                                        this.copyLink()
                                    }
                                },
                                copyLink() {
                                    navigator.clipboard.writeText(this.shareUrl).then(() => {
                                        this.copied = true
                                        setTimeout(() => this.copied = false, 2000)
                                    })
                                },
                                printPost() {
                                    document.querySelectorAll('.post-wrapper.is-printing').forEach(el => el.classList.remove('is-printing'))
                                    let wrapper = document.getElementById('post-' + this.postId)
                                    wrapper.classList.add('is-printing')
                                    window.print()
                                    wrapper.classList.remove('is-printing')
                                },
                                downloadImage() {
                                    if (this.downloading) return
                                    this.downloading = true
                                    fetch(this.downloadUrl)
                                        .then(res => {
                                            if (!res.ok) throw new Error('download failed')
                                            return res.blob()
                                        })
                                        .then(blob => {
                                            let url = URL.createObjectURL(blob)
                                            let a = document.createElement('a')
                                            a.href = url
                                            a.download = this.postSlug + '.png'
                                            document.body.appendChild(a)
                                            a.click()
                                            a.remove()
                                            URL.revokeObjectURL(url)
                                        })
                                        .catch(() => {
                                            alert('ছবি তৈরি করা যায়নি, আবার চেষ্টা করুন।')
                                        })
                                        .finally(() => {
                                            this.downloading = false
                                        })
                                }
                            }">
                                <button type="button" class="post-action-btn" @click="share" title="শেয়ার করুন">
                                    <i class="fa-solid fa-share-nodes"></i> শেয়ার
                                </button>
                                <button type="button" class="post-action-btn" :class="{ 'copied': copied }"
                                    @click="copyLink" title="লিংক কপি করুন">
                                    <i class="fa-solid" :class="copied ? 'fa-check' : 'fa-link'"></i>
                                    <span x-text="copied ? 'কপি হয়েছে' : 'লিংক কপি'"></span>
                                </button>
                                <button type="button" class="post-action-btn" @click="printPost" title="প্রিন্ট করুন">
                                    <i class="fa-solid fa-print"></i> প্রিন্ট
                                </button>
                                <button type="button" class="post-action-btn" :disabled="downloading"
                                    @click="downloadImage" title="ডাউনলোড করুন">
                                    <i class="fa-solid" :class="downloading ? 'fa-spinner fa-spin' : 'fa-download'"></i>
                                    <span x-text="downloading ? 'তৈরি হচ্ছে...' : 'ডাউনলোড'"></span>
                                </button>
                            </div>

                            <div class="rpt_info_section mobile border-bottom mb-2 pb-2">
                                <div class="rpt_name mt-2"><i class="fa-solid fa-circle-user me-2"></i>
                                    {{ $currentpost?->author?->title ?? 'Unknown' }}
                                </div>

                                <div class="entry_update mb-0"><span class="Layer_1" style="float: left"><svg
                                            id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 13.95 16">
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
                                        : <span class="post_date" data-date="{{ $currentpost->created_at }}">
                                            {{ $currentpost->created_at->locale('bn')->translatedFormat('d MM Y, h:i A') }}

                                        </span></div>
                                </div>

                            </div>

                            <div class="short-info mb-3"></div>
                            <div class="featured-img ">
                                <img src="{{ $currentpost->featured_image }}" alt="">
                            </div>
                            <div class="caption text-center bg-light text-secondary fst-italic">
                                {{ $currentpost->media?->where('category', 'featured_image')->first()?->caption }}
                            </div>
                            <div class="authore">

                            </div>
                            {{-- ... All post content, title, date, image, body ... --}}
                         <div class="content_area mb-3 ">
                                {!! $currentpost->content !!}

                            </div>
                        </div>

                        {{-- Facebook Comments Section --}}
                        <div class="comment-box">
                            <div class="heading text-primary">
                                <h4>মন্তব্য করুন</h4>
                            </div>
                        </div>

                        {{-- 🎯 FIX 3: Add unique data-href --}}
                        <div wire:ignore class="fb-comments"
                            data-href="{{ route('post.show', ['category' => $currentpost->category->slug, 'slug' => $currentpost->slug]) }}"
                            data-width="560" data-numposts="5">
                        </div>
                    </div>

                    {{-- Right column --}}
                    <div wire:ignore class="order-3 col-md-3">
                         @livewire('latest-news-tab', [], key('latest-news-' . $currentpost->id))
                        @livewire('ad-component', ['id' => 5], key('ad-5-right-' . $currentpost->id))


                        @livewire('ad-component', ['id' => 6], key('ad-6-' . $currentpost->id))

                        {{-- ... Ads ... --}}
                    </div>
                </div>
            </div>
        @endforeach

        <div x-data="{
            loading: false,
            observe() {
                let observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting && !this.loading) {
                            this.loading = true
                            // Livewire call is correct
                            @this.call('loadNextPost').then(() => {
                                this.loading = false
                            })
                        }
                    })
                })
                observer.observe(this.$el)
            }
        }" x-init="observe" class="h-1"></div>

    </section>
</div>


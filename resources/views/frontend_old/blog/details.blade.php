@extends('frontend.master')
@section('title')
    {{$blog->name}}
@endsection
@section('content')
    <div class="section-regular-2">
        <div class="container-large">
            <div class="blog-header-wrapper">
                <div class="heading-detail-section">blog post</div>
                <h1 class="heading-content">{{ $blog->name }}</h1>
                <div class="blog-category-wrapper">
                    @php
                        $categoryIds = json_decode($blog->category_id, true);
                    @endphp

                    @if(is_array($categoryIds))
                        @foreach($categoryIds as $categoryId)
                            @php
                                $category = \App\Models\Category::find($categoryId);
                            @endphp

                            @if($category)
                                <a href="#" class="blog-category w-inline-block">
                                    <div>{{ $category->name }}</div>
                                </a>
                            @endif
                        @endforeach
                    @else

                    @endif

                </div>
                <div class="div-block-316">
                    <div class="div-block-317"></div>
                </div>
                <div class="blog-line"></div>
                <div class="blog-detail-wrapper">
                    <div class="blog-author-wrapper">
                        <div class="blog-avatar-2"><img src="{{asset('webflow')}}/images/Apex-Avatar.svg" loading="lazy" alt="" class="avatar-image"></div>
                        <div>
                            <div class="blog-author-name">{{$blog->user->name}}</div>
                            <div class="blog-detail-horizontal">
                                <div class="blog-detail-text">{{ \Carbon\Carbon::parse($blog->created_at)->format('D, d M Y') }}</div>
                                <div class="blog-seperator">•</div>
                                <div class="blog-detail-text">{{$readingTime}} min read</div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-social-wrapper">
                        <a href="#" class="blog-share-button w-inline-block">
                            <div>Share</div>
                        </a>
                        <div class="w-layout-grid blog-social-links">
                            <a href="https://twitter.com/intent/tweet?text={{ url('/') }}/blog/{{ $blog->slug }}" class="blog-twitter w-inline-block">
                                <div class="blog-social-icon w-embed"><svg width="420" height="420" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22.1623 5.65593C21.3989 5.99362 20.5893 6.2154 19.7603 6.31393C20.634 5.79136 21.288 4.96894 21.6003 3.99993C20.7803 4.48793 19.8813 4.82993 18.9443 5.01493C18.3149 4.34151 17.4807 3.89489 16.5713 3.74451C15.6618 3.59413 14.7282 3.74842 13.9156 4.18338C13.1029 4.61834 12.4567 5.30961 12.0774 6.14972C11.6981 6.98983 11.607 7.93171 11.8183 8.82893C10.1554 8.74558 8.52863 8.31345 7.04358 7.56059C5.55854 6.80773 4.24842 5.75097 3.1983 4.45893C2.82659 5.09738 2.63125 5.82315 2.6323 6.56193C2.6323 8.01193 3.3703 9.29293 4.4923 10.0429C3.82831 10.022 3.17893 9.84271 2.5983 9.51993V9.57193C2.5985 10.5376 2.93267 11.4735 3.54414 12.221C4.15562 12.9684 5.00678 13.4814 5.9533 13.6729C5.33691 13.84 4.6906 13.8646 4.0633 13.7449C4.33016 14.5762 4.8503 15.3031 5.55089 15.824C6.25147 16.3449 7.09743 16.6337 7.9703 16.6499C7.10278 17.3313 6.10947 17.8349 5.04718 18.1321C3.98488 18.4293 2.87442 18.5142 1.7793 18.3819C3.69099 19.6114 5.91639 20.264 8.1893 20.2619C15.8823 20.2619 20.0893 13.8889 20.0893 8.36193C20.0893 8.18193 20.0843 7.99993 20.0763 7.82193C20.8952 7.23009 21.6019 6.49695 22.1633 5.65693L22.1623 5.65593Z" fill="currentColor"></path>
                                    </svg>
                                </div>
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite?url={{ url('/') }}/blog/{{ $blog->slug }}" class="blog-linkedin w-inline-block">
                                <div class="blog-social-icon w-embed"><svg width="420" height="420" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.94043 5.00002C6.94016 5.53046 6.7292 6.03906 6.35394 6.41394C5.97868 6.78883 5.46986 6.99929 4.93943 6.99902C4.409 6.99876 3.90039 6.78779 3.52551 6.41253C3.15062 6.03727 2.94016 5.52846 2.94043 4.99802C2.9407 4.46759 3.15166 3.95899 3.52692 3.5841C3.90218 3.20922 4.411 2.99876 4.94143 2.99902C5.47186 2.99929 5.98047 3.21026 6.35535 3.58552C6.73024 3.96078 6.9407 4.46959 6.94043 5.00002V5.00002ZM7.00043 8.48002H3.00043V21H7.00043V8.48002ZM13.3204 8.48002H9.34043V21H13.2804V14.43C13.2804 10.77 18.0504 10.43 18.0504 14.43V21H22.0004V13.07C22.0004 6.90002 14.9404 7.13002 13.2804 10.16L13.3204 8.48002V8.48002Z" fill="currentColor"></path>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="logo-carousel-css w-embed">
                <style>
                    /* MARQUEE LOGO*/
                    .carousel-track {
                        position: absolute;
                        white-space: nowrap;
                        will-change: transform;
                        animation: carousel-track 14s linear infinite;
                        /* manipulate the speed of the marquee by changing "40s" line above*/
                    }
                    @keyframes carousel-track {
                        from { transform: translateX(-50%); }
                        to { transform: translateX(0%); }
                    }
                    .carousel-track:hover {
                        -webkit-animation-play-state: paused;
                        -moz-animation-play-state: paused;
                        -o-animation-play-state: paused;
                        animation-play-state: paused;
                    }
                </style>
            </div>
            <div class="blog-header-image"><img src="{{asset($blog->image)}}" loading="lazy" sizes="90vw" srcset="{{asset($blog->image)}} 500w, {{asset($blog->image)}} 800w, {{asset($blog->image)}} 2560w" alt="" class="image-cover-2"></div>
            <div class="container-x-small">
                <div>
                    <div class="margin-bottom-32">
                        <h5 class="h5-heading">{{$blog->name}}</h5>
                        <div class="sub-heading-small">{{$blog->description}}</div>
                    </div>
                    <p class="paragraph-large-2">
                        {!! $blog->main_content !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

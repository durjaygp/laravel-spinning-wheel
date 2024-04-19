@extends('frontend.master')
@section('title',"Blog")
@section('content')
    <section class="section-regular">
    <div class="container-small">
        <div class="title-wrapper">
            <h2 class="h2-heading">Our Blogs</h2>
        </div>
        <div class="w-layout-grid grid-two-column">
            @foreach($blogs->take(1) as $row)
            <a href="{{route('home.blog', $row->slug )}}" class="blog-card w-inline-block">
                <div class="blog-thumbnail-large"><img src="{{ asset($row->image) }}" loading="lazy" alt="{{ $row->name }}" width="353" class="image-cover"></div>
                <div class="blog-content">
                    <div class="wrap-v-small">
                        <div class="overline text-color-blue-500">{{ $row->readingTime}} min read</div>
                        <h6 class="h6-heading">{{ $row->name }}</h6>
                    </div>
                    <p class="paragraph-regular text-color-gray-600">{{ \Illuminate\Support\Str::limit($row->description, 80) }}</p>
                    <div class="blog-author-wrap">
                        <div class="blog-avatar-wrapper">
                            <div class="blog-avatar"><img src="{{asset('webflow')}}/images/Apex-Avatar.svg" loading="lazy" alt="" class="image-cover"></div>
                            <div class="paragraph-regular text-weight-medium">{{$row->user->name}}</div>
                        </div>
                        <div class="blog-date">{{ \Carbon\Carbon::parse($row->created_at)->format('D, d M Y') }}</div>
                    </div>
                </div>
            </a>
            @endforeach

            <div class="w-layout-grid blog-grid-single">
                @foreach($blogs->slice(1, 3) as $row)
                <a href="{{route('home.blog', $row->slug )}}" class="blog-card-small w-inline-block">
                    <div id="w-node-d231c93d-9afc-82b8-3083-33056853139e-1a5682bb" class="blog-thumbnail-x-small">
                        <img src="{{asset($row->image)}}" loading="lazy" alt="{{ $row->name }}" width="255" class="image-cover"></div>
                    <div class="wrap-v-regular">
                        <div class="wrap-v-small">
                            <div class="overline text-color-blue-500">{{ $row->readingTime}} min read</div>
                            <div class="paragraph-large text-weight-bold">{{ $row->name }}</div>
                            <div class="blog-author-wrap">
                                <div class="blog-avatar-wrapper">
                                    <div class="blog-avatar"><img src="{{asset('webflow')}}/images/Apex-Avatar.svg" loading="lazy" alt="" class="image-cover"></div>
                                    <div class="paragraph-regular text-weight-medium">{{$row->user->name}}</div>
                                </div>
                                <div class="blog-date">{{ \Carbon\Carbon::parse($row->created_at)->format('D, d M Y') }}</div>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

        </div>
    </div>
    </section>
@endsection

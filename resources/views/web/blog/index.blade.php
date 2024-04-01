@extends('web.layout.app')

@section('title')
    Manafeth | Blogs
@endsection

@section('content')
<section class="multi-page-banner-wrapper position-relative text-center d-flex align-items-center justify-content-center">
    <div class="position-relative">
        <img src="{{ asset('assets/web/images/about-banner.png') }}" alt="About Banner Img" height="auto" width="100%">
        <div class="banner-overlay h-100 w-100 position-absolute top-0 bottom-0 left-0 right-0"></div>
    </div>
    <h2 class="text-white position-absolute">Blogs</h2>
</section>
<section class="blog-page-wrapper main-wrapper-bg pb-80 pt-60">
    <div class="text-center">
        <h2 class="bg-transparent-text mb-md-5 mb-4">
            <span>GET IN SIGHTS/ARTICLES</span>
        </h2>
    </div>
    <div class="page-width">
        <div class="container-fluid px-0">
            <div class="row">
                @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6 pb-4">
                    <div class="blog-card">
                        <a href="{{ route('web.blogs.show', $blog->id) }}">
                            <img src="{{ $blog->image }}" alt="Blog Post" srcset="" width="100%" height="auto">
                        </a>
                        <div class="blog-card-body">
                            <div class="d-flex align-items-center mb-2 gap-4">
                                <h5 class="mb-0 templates">
                                    Templates
                                </h5>
                                <date>{{ date('d M Y', $blog->date) }}</date>
                            </div>
                            <a href="{{ route('web.blogs.show', $blog->id) }}">
                                <h5 class="mb-0 title">{{ $blog->title }}</h5>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection

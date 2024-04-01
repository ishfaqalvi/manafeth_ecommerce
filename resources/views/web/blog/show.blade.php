@extends('web.layout.app')

@section('title')
    Manafeth | {{ $blog->title }}
@endsection

@section('content')
<section class="blog-details mt-4 mb-5">
    <div class="page-width">
        <div class="blog-product-detial-img position-relative">
            <img src="{{ $blog->image }}" alt="Blog Detail Product image" srcset="" height="100%" width="100%">
            <div class="d-flex flex-column flex-md-row justify-content-between gap-3 p-lg-5 p-md-4 p-3 blog-detial-product-description align-items-center position-absolute bottom-0 w-100 z-1">
                <p class="mb-0 text-white">
                    {{ $blog->title }}
                </p>
                <date class="text-md-end">{{ date('d M Y', $blog->date) }}</date>
            </div>
            <div class="blog-detail-overlay position-absolute top-0 bottom-0 start-0 end-0 h-100 w-100"></div>
        </div>
        <div class="product-wrapper-right-block-description d-flex flex-column  gap-lg-5 gap-3">
            {!! $blog->detail !!}
        </div>
    </div>
</section>
<section class="blog-wrapper">
    <div class="page-width">
        <h2 class="mb-md-5 mb-4">
            Our
            <b>Blogs Articles</b>
        </h2>
        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-lg-4 col-md-6 pb-4">
                    <div class="blog-card">
                        <a href="http://">
                            <img src="{{ asset('assets/web/images/b1.png') }}" alt="Blog Post" srcset="" width="100%" height="auto">
                        </a>
                        <div class="blog-card-body">
                            <div class="d-flex align-items-center mb-2 gap-4">
                                <h5 class="mb-0 templates">
                                    Templates
                                </h5>
                                <date>January 19, 2024</date>
                            </div>
                            <a href="http://">
                                <h5 class="mb-0 title">
                                    11 IVR scripts to improve your call flow
                                </h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-4">
                    <div class="blog-card">
                        <a href="http://">
                            <img src="{{ asset('assets/web/images/b2.png') }}" alt="Blog Post" srcset="" width="100%" height="auto">
                        </a>
                        <div class="blog-card-body">
                            <div class="d-flex align-items-center mb-2 gap-4">
                                <h5 class="mb-0 templates">
                                    Templates
                                </h5>
                                <date>January 19, 2024</date>
                            </div>
                            <a href="http://">
                                <h5 class="mb-0 title">
                                    Set your team up for success with a customer service training manual (+ 4
                                    training best
                                    practices)
                                </h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-4">
                    <div class="blog-card">
                        <a href="http://">
                            <img src="{{ asset('assets/web/images/b3.png') }}" alt="Blog Post" srcset="" width="100%" height="auto">
                        </a>
                        <div class="blog-card-body">
                            <div class="d-flex align-items-center mb-2 gap-4">
                                <h5 class="mb-0 templates">
                                    Templates
                                </h5>
                                <date>January 19, 2024</date>
                            </div>
                            <a href="http://">
                                <h5 class="mb-0 title">
                                    How to build a scalable customer service team structure
                                </h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-4">
                    <div class="blog-card">
                        <a href="http://">
                            <img src="{{ asset('assets/web/images/b4.png') }}" alt="Blog Post" srcset="" width="100%" height="auto">
                        </a>
                        <div class="blog-card-body">
                            <div class="d-flex align-items-center mb-2 gap-4">
                                <h5 class="mb-0 templates">
                                    Templates
                                </h5>
                                <date>January 19, 2024</date>
                            </div>
                            <a href="http://">
                                <h5 class="mb-0 title">
                                    11 IVR scripts to improve your call flow
                                </h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-4">
                    <div class="blog-card">
                        <a href="http://">
                            <img src="{{ asset('assets/web/images/b5.png') }}" alt="Blog Post" srcset="" width="100%" height="auto">
                        </a>
                        <div class="blog-card-body">
                            <div class="d-flex align-items-center mb-2 gap-4">
                                <h5 class="mb-0  templates">
                                    Templates
                                </h5>
                                <date>January 19, 2024</date>
                            </div>
                            <a href="http://">
                                <h5 class="mb-0 title">
                                    Set your team up for success with a customer service training manual (+ 4
                                    training
                                    best
                                    practices)
                                </h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-4">
                    <div class="blog-card">
                        <a href="http://">
                            <img src="{{ asset('assets/web/images/b6.png') }}" alt="Blog Post" srcset="" width="100%" height="auto">
                        </a>
                        <div class="blog-card-body">
                            <div class="d-flex align-items-center mb-2 gap-4">
                                <h5 class="mb-0 templates">
                                    Templates
                                </h5>
                                <date>January 19, 2024</date>
                            </div>
                            <a href="http://">
                                <h5 class="mb-0 title">
                                    How to build a scalable customer service team structure
                                </h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

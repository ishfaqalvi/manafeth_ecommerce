@extends('web.layout.app')

@section('title')
    Manafeth | Contact Us
@endsection

@section('content')
<section class="multi-page-banner-wrapper position-relative text-center d-flex align-items-center justify-content-center">
    <div class="position-relative">
        <img src="{{ asset('assets/web/images/contact-banner.png') }}" alt="About Banner Img" height="auto" width="100%">
        <div class="banner-overlay h-100 w-100 position-absolute top-0 bottom-0 left-0 right-0"></div>
    </div>
    <h2 class="text-white position-absolute">Contact Us</h2>
</section>
<div class="main-wrapper-bg">
    <div class="page-width contact-us-page-wrapper">
        <h2 class="text-center mb-md-5 mb-3">
            GET IN TOUCH WITH US
        </h2>
        <div class="conatiner-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-us-page-wrapper-detail">
                        <h2>
                            DON'T HESITATE TO CONTACT WITH US
                        </h2>
                        <div
                            class="list-unstyled d-flex flex-column gap-lg-5 gap-4 mb-0 mt-lg-5 mt-3 contact-information-block">
                            <div class="d-flex align-items-center gap-lg-4 gap-3">
                                <div class="icon-box d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('assets/web/images/cp-location.png') }}" alt="Icon" srcset="" height="auto"
                                        width="auto">
                                </div>
                                <div class="location-box">
                                    <h5>
                                        Location
                                    </h5>
                                    <p class="mb-0">
                                        1535 W Hildebrand Ave, San Antonio, TX, United States, Texas
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-lg-4 gap-3">
                                <div class="icon-box d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('assets/web/images/cp-email.png') }}" alt="Icon" srcset="" height="auto"
                                        width="auto">
                                </div>
                                <div>
                                    <h5>
                                        Email Address
                                    </h5>
                                    <p class="mb-0">
                                        Info@rentown.com
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-lg-4 gap-3">
                                <div class="icon-box d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('assets/web/images/cp-cell.png') }}" alt="Icon" srcset="" height="auto"
                                        width="auto">
                                </div>
                                <div>
                                    <h5>
                                        Call Us
                                    </h5>
                                    <p class="mb-0">
                                        +1 45356346
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-md-4 pt-1 mt-3">
                            <a href="http://" class="contact-us-page-wrapper-detail-view-location text-black">
                                View Location
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-us-page-wrapper-form-block">
                        <div class="text-center">
                            <h2 class="text-black mb-2">
                                Need Help?
                            </h2>
                            <p class="text-black px-lg-4">
                                Get in touch with us and let's start a conversation about how we can help you.
                            </p>
                        </div>
                        <form action="/submit" method="post" class="mt-4 mt-lg-5">
                            <div class="d-flex flex-column flex-lg-row gap-lg-4">
                                <input type="text" class="form-control bg-transparent mb-4" id="name" name="name" placeholder="Enter your name *" required>
                                <input type="email" class="form-control bg-transparent mb-4" id="email" name="email" placeholder="Enter your email *" required>
                            </div>
                            <input type="tel" class="form-control bg-transparent mb-4" id="mobile" name="mobile" placeholder="Enter your mobile number">
                            <textarea class="form-control bg-transparent" id="richtext" name="richtext" placeholder="Enter your text"></textarea>
                            <div class="d-flex justify-content-center mt-5">
                                <button type="submit" class="button btn-primary d-flex gap-3 align-items-center">
                                    <span>Submit</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="auto" x="0"
                                        y="0" viewBox="0 0 476.213 476.213"
                                        style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                        <g>
                                            <path
                                                d="m345.606 107.5-21.212 21.213 94.393 94.394H0v30h418.787L324.394 347.5l21.212 21.213 130.607-130.607z"
                                                fill="" opacity="1" data-original="#000000" class=""></path>
                                        </g>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="map-wrapper">
    <div class="map-box">
        <img src="{{ asset('assets/web/images/map-box.png') }}" alt="Map image" srcset="" height="auto" width="100%">
    </div>
</section>
@endsection

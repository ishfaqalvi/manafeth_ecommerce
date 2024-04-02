@extends('web.layout.app')

@section('title')
    Manafeth | About Us
@endsection

@section('content')
<section class="multi-page-banner-wrapper position-relative text-center d-flex align-items-center justify-content-center">
    <div class="position-relative">
        <img src="{{ asset('assets/web/images/about-banner.png') }}" alt="About Banner Img" height="auto" width="100%">
        <div class="banner-overlay h-100 w-100 position-absolute top-0 bottom-0 left-0 right-0"></div>
    </div>
    <h2 class="text-white position-absolute">About Us</h2>
</section>
<div class="main-wrapper-bg pb-80">
    <section class="something-about-us mx-md-auto position-relative">
        <h3 class="mb-lg-3 pb-3">
            Something About Us
        </h3>
        <p>
            Wing LLC is presenting an Islamic Drive to Own. We are based in Indiana, USA and we provide interested parties the ability to own a car while renting it from us.<br>
            Wing LLC is responsible for all the things just like any rental car (such as insurance, maintenance, etc).<br>
            You as a driver is only responsible for the gas, cleaning, and paying rent etc.<br>
            Reach month 40 and the car is yours.all we need is your driving license and basic documents. You get to choose any car in the market that meets our criteria<br><br>
            We buy, you drive*
        </p>
    </section>
    <section class="image-with-text d-flex flex-lg-row-reverse flex-column align-items-center pt-80">
        <div class="left-img w-100">
            <img src="{{ asset('assets/web/images/image-with-text-2.png') }}" alt="Image With text Image" height="auto" width="100%">
        </div>
        <div class="right-content w-100 d-flex justify-content-end">
            <div class="right-content-inner ms-md-5">
                <h2 class="mb-3">
                    What we believe in...
                </h2>
                <p class="mb-4">
                    With a team of dedicated professionals, we have established ourselves as a leading mobility & medical supplier. Our commitment to excellence, innovation, and customer satisfaction sets us apart from the competition. We believe in fostering long-term relationships with our clients by delivering exceptional value and unmatched quality.
                </p>
                <div class="d-flex gap-lg-5 gap-3">
                    <div class="">
                        <h3 class="mb-md-4 mb-2">Our Mission</h3>
                        <p>Our commitment to excellence, innovation, and customer satisfaction sets us apart from the competition. We believe in fostering long-term relationships with our clients by delivering exceptional value and unmatched quality.</p>
                    </div>
                    <div class="">
                        <h3 class="mb-md-4 mb-2">Our Vision</h3>
                        <p>Our commitment to excellence, innovation, and customer satisfaction sets us apart from the competition. We believe in fostering long-term relationships with our clients by delivering exceptional value and unmatched quality.</p>
                    </div>
                </div>
                <div class="call-today pt-50">
                    <p class="mb-1"><bold>Call Today For Booking Your Next Ride</bold></p>
                    <div class="call-today-box d-flex align-items-center gap-3">
                        <img src="{{ asset('assets/web/images/phone-call.png') }}" alt="Phone Call Icon" srcset="" height="auto" width="auto">
                        <div class="d-flex flex-column">
                            <span>24/7 SUPPORT CENTER</span>
                            <p class="mb-0"><bold>+1 210-733-5476</bold></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-width">
        <div class="container-fluid px-0 pt-80">
            <h2 class="mb-md-5 mb-3">
                What sets us
                <b>apart</b>
            </h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="about-blog-card">
                        <a href="http://">
                            <img src="{{ asset('assets/web/images/b1.png') }}" alt="Blog Image" srcset="" height="100%" width="100%"></a>
                        <div class="about-blog-card-body bg-white">
                            <h6 class="mb-2">Quality Assurance</h6>
                            <p>Our commitment to excellence, innovation, and customer satisfaction sets us apart from the competition. We believe in fostering long-term relationships with our clients by delivering exceptional value and unmatched quality. Our commitment to excellence, innovation, and customer satisfaction sets us apart from the competition. We believe in fostering long-term relationships with our clients by delivering exceptional value and unmatched quality.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="about-blog-card">
                        <a href="http://"><img src="{{ asset('assets/web/images/b2.png') }}" alt="Blog Image" srcset="" height="100%" width="100%"></a>
                        <div class="about-blog-card-body bg-white">
                            <h6 class="mb-2">Quality Assurance</h6>
                            <p>Our commitment to excellence, innovation, and customer satisfaction sets us apart from the competition. We believe in fostering long-term relationships with our clients by delivering exceptional value and unmatched quality. Our commitment to excellence, innovation, and customer satisfaction sets us apart from the competition. We believe in fostering long-term relationships with our clients by delivering exceptional value and unmatched quality.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="about-blog-card">
                        <a href="http://"><img src="{{ asset('assets/web/images/b3.png') }}" alt="Blog Image" srcset="" height="100%" width="100%"></a>
                        <div class="about-blog-card-body bg-white">
                            <h6 class="mb-2">Quality Assurance</h6>
                            <p>Our commitment to excellence, innovation, and customer satisfaction sets us apart from the competition. We believe in fostering long-term relationships with our clients by delivering exceptional value and unmatched quality. Our commitment to excellence, innovation, and customer satisfaction sets us apart from the competition. We believe in fostering long-term relationships with our clients by delivering exceptional value and unmatched quality.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

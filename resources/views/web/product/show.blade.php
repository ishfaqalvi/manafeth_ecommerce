@extends('web.layout.app')

@section('title')
    Manafeth | {{ $product->name }}
@endsection

@section('content')
<div class="main-wrapper">
    <div class="page-width">
        <div class="product-detail-section">
            <div class="container-fulid p-0">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="product-detail-img">
                            <img src="{{ $product->thumbnail }}" alt="Product Detail Image" srcset="" height="auto"
                                width="100%">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-detail-right">
                            <h2 class="product-detail-right-heading mb-0 h2">
                                {{ $product->name }}
                            </h2>
                            <div class="price-aed d-flex">
                                <span>
                                    {{ $product->price }}AED
                                </span>
                                @if(!empty($product->discount))
                                <del>
                                    {{ $product->discount }}AED
                                </del>
                                @endif
                            </div>
                            <div class="star-reviews d-flex gap-2">
                                <img src="{{ asset('assets/web/images/star-dp.png') }}" alt="Star Icon" srcset="" height="auto"
                                    width="auto">
                                <img src="{{ asset('assets/web/images/star-dp.png') }}" alt="Star Icon" srcset="" height="auto"
                                    width="auto">
                                <img src="{{ asset('assets/web/images/star-dp.png') }}" alt="Star Icon" srcset="" height="auto"
                                    width="auto">
                                <img src="{{ asset('assets/web/images/star-dp.png') }}" alt="Star Icon" srcset="" height="auto"
                                    width="auto">
                                <img src="{{ asset('assets/web/images/star-dp.png') }}" alt="Star Icon" srcset="" height="auto"
                                    width="auto">
                            </div>
                            <div class="power-wheelchair mt-4">
                                <h4 class="text-black">{{ $product->name }}</h4>
                                <ul class="list-unstyled mt-3 mb-0 gap-2 d-flex flex-column">
                                    <li class="d-flex gap-2 align-items-center text-black">
                                        <img src="{{ asset('assets/web/images/check.png') }}" alt="Tick Icon" height="auto"
                                            width="auto">
                                        <span>Weight Capacity: 135KG</span>
                                    </li>
                                    <li class="d-flex gap-2 align-items-center text-black">
                                        <img src="{{ asset('assets/web/images/check.png') }}" alt="Tick Icon" height="auto"
                                            width="auto">
                                        <span>Max Speed: 6KM/hr</span>
                                    </li>
                                    <li class="d-flex gap-2 align-items-center text-black">
                                        <img src="{{ asset('assets/web/images/check.png') }}" alt="Tick Icon" height="auto"
                                            width="auto">
                                        <span>Driving Range: 13-17KM (2-2.8hrs)</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="request-block d-md-flex gap-4">
                                <a href="http://" class="border-right">Rental Request</a>
                                <a href="http://">Maintenance Request</a>
                            </div>
                            <div class="d-flex flex-md-row flex-column gap-3 align-items-md-center align-items-start">
                                <div class="qty-container d-flex">
                                    <button class="qty-btn-minus qty-button bg-transparent border-0" type="button">
                                        <img src="{{ asset('assets/web/images/minus.png') }}" alt="Minus Icon" srcset="">
                                    </button>
                                    <input type="text" name="qty" value="0"
                                        class="input-qty border-0 text-center" />
                                    <button class="qty-btn-plus qty-button bg-transparent border-0" type="button">
                                        <img src="{{ asset('assets/web/images/plus.png') }}" alt="Plus Icon" srcset="">
                                    </button>
                                </div>
                                <a href="http://" class="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20px" x="0"
                                        y="0" viewBox="0 0 450.391 450.391"
                                        style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                        <g>
                                            <path
                                                d="M143.673 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02 25.969 0 47.02-21.052 47.02-47.02.001-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM342.204 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02s47.02-21.052 47.02-47.02c0-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM448.261 76.037a13.064 13.064 0 0 0-8.359-4.18L99.788 67.155 90.384 38.42C83.759 19.211 65.771 6.243 45.453 6.028H10.449C4.678 6.028 0 10.706 0 16.477s4.678 10.449 10.449 10.449h35.004a27.17 27.17 0 0 1 25.078 18.286l66.351 200.098-5.224 12.016a50.154 50.154 0 0 0 4.702 45.453 48.588 48.588 0 0 0 39.184 21.943h203.233c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449H175.543a26.646 26.646 0 0 1-21.943-12.539 28.733 28.733 0 0 1-2.612-25.078l4.18-9.404 219.951-22.988c24.16-2.661 44.034-20.233 49.633-43.886L449.83 84.917a8.882 8.882 0 0 0-1.569-8.88zm-43.885 109.191c-3.392 15.226-16.319 26.457-31.869 27.69l-217.339 22.465-48.588-147.33 320.261 4.702-22.465 92.473z"
                                                fill="" opacity="1" data-original="#000000" class="cart-icon">
                                            </path>
                                        </g>
                                    </svg>
                                    <span class="ms-2">Add to cart</span>
                                </a>
                                <div class="d-flex gap-3">
                                    <a href="http://"
                                        class="wish-icon-box bg-white d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('assets/web/images/love.png') }}" alt="Wish Icon Box" height="auto"
                                            width="auto">
                                    </a>
                                    <a href="http://"
                                        class="share-icon-box d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('assets/web/images/share.png') }}" alt="Wish Icon Box" height="auto"
                                            width="auto">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="detail-product-tab bg-white">
            <nav>
                <div class="nav nav-tabs gap-md-5 d-flex justify-content-md-start justify-content-between" id="nav-tab" role="tablist">
                    <button class="nav-link active px-0" id="nav-home-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                        aria-selected="true">
                        Product Details
                    </button>
                    <button class="nav-link px-0" id="nav-profile-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                        aria-selected="false">
                        Specifications
                    </button>
                    <button class="nav-link px-0" id="nav-contact-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact"
                        aria-selected="false">
                        Disclaimer
                    </button>
                </div>
            </nav>
            <div class="tab-content bg-transparent mt-md-5" id="nav-tabContent">
                <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <ul class="list-unstyled">
                        <li>Strong Aluminum frame with a total weight of 24.65kg (w/o battery)</li>
                        <li>Brushed motor 24V 250W each, stable and smooth contro</li>
                        <li>Suspension system on back of frame</li>
                        <li>The Unique dual base rod ensure the wheelchair go straight all the time</li>
                        <li>With a bigger seating space but a small folding size</li>
                        <li>Fold in 1s, easy and simple for passengers to u</li>
                    </ul>
                    <p class="mt-md-5 mt-3 mb-0">
                        Thunder mobility now is approaching you with something unique that is advantageous and
                        favorable. Power wheelchairs launched by the company are now providing the client a
                        chance
                        to be independent. Disabled people are no more dependent on others. We have manufactured
                        these powered wheelchairs just for your relief.
                    </p>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <ul class="list-unstyled">
                        <li>Strong Aluminum frame with a total weight of 24.65kg (w/o battery)</li>
                        <li>Brushed motor 24V 250W each, stable and smooth contro</li>
                        <li>Suspension system on back of frame</li>
                        <li>The Unique dual base rod ensure the wheelchair go straight all the time</li>
                        <li>With a bigger seating space but a small folding size</li>
                        <li>Fold in 1s, easy and simple for passengers to u</li>
                    </ul>
                    <p class="mt-md-5 mt-3 mb-0">
                        Thunder mobility now is approaching you with something unique that is advantageous and
                        favorable. Power wheelchairs launched by the company are now providing the client a
                        chance
                        to be independent. Disabled people are no more dependent on others. We have manufactured
                        these powered wheelchairs just for your relief.
                    </p>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <ul class="list-unstyled">
                        <li>Strong Aluminum frame with a total weight of 24.65kg (w/o battery)</li>
                        <li>Brushed motor 24V 250W each, stable and smooth contro</li>
                        <li>Suspension system on back of frame</li>
                        <li>The Unique dual base rod ensure the wheelchair go straight all the time</li>
                        <li>With a bigger seating space but a small folding size</li>
                        <li>Fold in 1s, easy and simple for passengers to u</li>
                    </ul>
                    <p class="mt-md-5 mt-3 mb-0">
                        Thunder mobility now is approaching you with something unique that is advantageous and
                        favorable. Power wheelchairs launched by the company are now providing the client a
                        chance
                        to be independent. Disabled people are no more dependent on others. We have manufactured
                        these powered wheelchairs just for your relief.
                    </p>
                </div>
            </div>
        </div>
        <div class="product-wrapper-right-block-description d-flex flex-column gap-lg-5 gap-4">
            <div class="d-flex flex-column gap-4">
                <h4 class="m-0 text-black">
                    Electric wheelchair
                </h4>
                <p class="m-0 text-black">
                    Thunder mobility now is approaching you with something unique that is advantageous
                    and
                    favorable. Power wheelchairs launched by the company are now providing the client a
                    chance to be independent. Disabled people are no more dependent on others. We have
                    manufactured these powered wheelchairs just for your relief.
                </p>
            </div>
            <div class="d-flex flex-column gap-4">
                <h4 class="m-0 text-black">
                    Benefits of electric wheelchair
                </h4>
                <p class="m-0 text-black">
                    Wheelchairs let you enjoy an independent life. The structured wheelchairs installed
                    in
                    vehicles favor you to travel where ever you want, without any stress of transport.
                    The
                    powered wheelchairs also allow the individual to enjoy self-driving though he's
                    disabled. Highly designed and controlled systems are settled so one can overall
                    control
                    the vehicle. Nothing is out of approach. Save transfer, and safe drive is ensured.
                    Then
                    what else is needed?
                </p>
            </div>
            <div class="d-flex flex-column gap-4">
                <h4 class="m-0 text-black">
                    Different types of powered wheelchairs
                </h4>
                <p class="m-0 text-black">
                    Several different wheelchairs are introduced to the clients. The one that suits his
                    need
                    is supplied. Following are the types mentioned
                </p>
            </div>
            <div class="d-flex flex-column gap-4">
                <h4 class="m-0 text-black">
                    Heavy duty electric wheelchairs
                </h4>
                <p class="m-0 text-black">
                    Power Base electric wheelchairs are based on batteries. The battery timings are
                    outstanding. One can enjoy a safe ride. Overall the operating system is satisfying.
                    The
                    wheelchair has a proper circulating radius. Adequate seating and control over the
                    powered wheelchair are ensured. Often these wheelchairs come with suspensions. Such
                    types of wheelchairs are used for outdoor purposes mainly. They can be used to
                    fulfill
                    the needs of the outing.
                </p>
            </div>
        </div>
        <div class="container-fluid px-0 rating-reviews">
            <h4 class="mb-4 text-black">
                Electric wheelchair
            </h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="rating-reviews-card bg-white">
                        <h6 class="rating-reviews-card-title mb-0 text-black">Jeremy Baker</h6>
                        <date>10-12-2023</date>
                        <p class="rating-description  my-lg-4 my-3 text-black">
                            Thunder mobility now is approaching you with something unique that is advantageous and
                            favorable. Power wheelchairs launched by the company are now providing the client a
                            chance to be independent. Disabled people are no more dependent on others.
                        </p>
                        <div class="rating-point d-flex gap-2">
                            <span>5.0</span>
                            <ul class="list-unstyled d-flex gap-2 mb-0 star-reviews">
                                <li>
                                    <img src="{{ asset('assets/web/images/star-dp.png') }}" alt="Star Icon" srcset="" height="auto"
                                        width="auto">
                                </li>
                                <li>
                                    <img src="{{ asset('assets/web/images/star-dp.png') }}" alt="Star Icon" srcset="" height="auto"
                                        width="auto">
                                </li>
                                <li>
                                    <img src="{{ asset('assets/web/images/star-dp.png') }}" alt="Star Icon" srcset="" height="auto"
                                        width="auto">
                                </li>
                                <li>
                                    <img src="{{ asset('assets/web/images/star-dp.png') }}" alt="Star Icon" srcset="" height="auto"
                                        width="auto">
                                </li>
                                <li>
                                    <img src="{{ asset('assets/web/images/star-dp.png') }}" alt="Star Icon" srcset="" height="auto"
                                        width="auto">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="rating-reviews-card bg-white">
                        <h6 class="rating-reviews-card-title mb-0 text-black">Steve Weber</h6>
                        <date>10-12-2023</date>
                        <p class="rating-description  my-lg-4 my-3 text-black">
                            Thunder mobility now is approaching you with something unique that is advantageous and
                            favorable. Power wheelchairs launched by the company are now providing the client a
                            chance to be independent. Disabled people are no more dependent on others.
                        </p>
                        <div class="rating-point d-flex gap-2">
                            <span>5.0</span>
                            <ul class="list-unstyled d-flex gap-2 mb-0 star-reviews ">
                                <li>
                                    <img src="{{ asset('assets/web/images/star-dp.png') }}" alt="Star Icon" srcset="" height="auto"
                                        width="auto">
                                </li>
                                <li>
                                    <img src="{{ asset('assets/web/images/star-dp.png') }}" alt="Star Icon" srcset="" height="auto"
                                        width="auto">
                                </li>
                                <li>
                                    <img src="{{ asset('assets/web/images/star-dp.png') }}" alt="Star Icon" srcset="" height="auto"
                                        width="auto">
                                </li>
                                <li>
                                    <img src="{{ asset('assets/web/images/star-dp.png') }}" alt="Star Icon" srcset="" height="auto"
                                        width="auto">
                                </li>
                                <li>
                                    <img src="{{ asset('assets/web/images/star-dp.png') }}" alt="Star Icon" srcset="" height="auto"
                                        width="auto">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="rating-reviews-card bg-white">
                        <h6 class="rating-reviews-card-title mb-0 text-black">Aaron Grand</h6>
                        <date>10-12-2023</date>
                        <p class="rating-description  my-lg-4 my-3 text-black">
                            Thunder mobility now is approaching you with something unique that is advantageous and
                            favorable. Power wheelchairs launched by the company are now providing the client a
                            chance to be independent. Disabled people are no more dependent on others.
                        </p>
                        <div class="rating-point d-flex gap-2">
                            <span>5.0</span>
                            <ul class="list-unstyled d-flex gap-2 mb-0 star-reviews">
                                <li>
                                    <img src="{{ asset('assets/web/images/star-dp.png') }}" alt="Star Icon" srcset="" height="auto"
                                        width="auto">
                                </li>
                                <li>
                                    <img src="{{ asset('assets/web/images/star-dp.png') }}" alt="Star Icon" srcset="" height="auto"
                                        width="auto">
                                </li>
                                <li>
                                    <img src="{{ asset('assets/web/images/star-dp.png') }}" alt="Star Icon" srcset="" height="auto"
                                        width="auto">
                                </li>
                                <li>
                                    <img src="{{ asset('assets/web/images/star-dp.png') }}" alt="Star Icon" srcset="" height="auto"
                                        width="auto">
                                </li>
                                <li>
                                    <img src="{{ asset('assets/web/images/star-dp.png') }}" alt="Star Icon" srcset="" height="auto"
                                        width="auto">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center mt-lg-5 mt-4">
                    <a href="http://" class="button">
                        Load More Reviews
                    </a>
                </div>
            </div>
        </div>
    </div>
    <section class="feature-product">
        <div class="page-width">
            <h2 class="">
                Our Special
                <b>Products</b>
            </h2>
            <div class="container-fluid px-0">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card position-relative">
                            <div
                                class="wish-icon position-absolute d-flex align-items-center justify-content-center end-0">
                                <img src="{{ asset('assets/web/images/heart-white') }}.png" alt="Wish Icon" srcset="" width="auto"
                                    height="auto">
                            </div>
                            <a href="http://" class="feature-pro-img">
                                <img src="{{ asset('assets/web/images/shop-categories') }}-img.png" alt="Product Image" srcset=""
                                    width="100%" height="auto">
                            </a>
                            <div class="product-card-body">
                                <h2 class="m-0 product-card-title">
                                    <a href="http://" class="text-black">
                                        Manual Standard Wheelchair <br>MW02
                                    </a>
                                </h2>
                                <div class="reviews-block mt-1 d-flex align-items-center justify-content-between">
                                    <div class="rate-block d-flex flex-wrap align-items-baseline gap-md-1">
                                        <span>
                                            3000AED
                                        </span>
                                        <del>
                                            3500AED
                                        </del>
                                    </div>
                                    <div class="star-reviews d-flex align-items-center gap-1">
                                        <img src="{{ asset('assets/web/images/star-p') }}.png" alt="Star Icon" srcset="" height="auto"
                                            width="auto">
                                        <span>4.5(128)</span>
                                    </div>
                                </div>
                                <div class="product-button text-center mt-4">
                                    <a href="http://" class="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20px" x="0"
                                            y="0" viewBox="0 0 450.391 450.391"
                                            style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                                <path
                                                    d="M143.673 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02 25.969 0 47.02-21.052 47.02-47.02.001-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM342.204 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02s47.02-21.052 47.02-47.02c0-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM448.261 76.037a13.064 13.064 0 0 0-8.359-4.18L99.788 67.155 90.384 38.42C83.759 19.211 65.771 6.243 45.453 6.028H10.449C4.678 6.028 0 10.706 0 16.477s4.678 10.449 10.449 10.449h35.004a27.17 27.17 0 0 1 25.078 18.286l66.351 200.098-5.224 12.016a50.154 50.154 0 0 0 4.702 45.453 48.588 48.588 0 0 0 39.184 21.943h203.233c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449H175.543a26.646 26.646 0 0 1-21.943-12.539 28.733 28.733 0 0 1-2.612-25.078l4.18-9.404 219.951-22.988c24.16-2.661 44.034-20.233 49.633-43.886L449.83 84.917a8.882 8.882 0 0 0-1.569-8.88zm-43.885 109.191c-3.392 15.226-16.319 26.457-31.869 27.69l-217.339 22.465-48.588-147.33 320.261 4.702-22.465 92.473z"
                                                    fill="" opacity="1" data-original="#000000" class="cart-icon">
                                                </path>
                                            </g>
                                        </svg>
                                        <span class="ms-md-2 ms-1">Add to cart</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card position-relative">
                            <div
                                class="wish-icon position-absolute d-flex align-items-center justify-content-center end-0">
                                <img src="{{ asset('assets/web/images/heart-white') }}.png" alt="Wish Icon" srcset="" width="auto"
                                    height="auto">
                            </div>
                            <a href="http://" class="feature-pro-img">
                                <img src="{{ asset('assets/web/images/shop-categories') }}-img.png" alt="Product Image" srcset=""
                                    width="100%" height="auto">
                            </a>
                            <div class="product-card-body">
                                <h2 class="m-0 product-card-title">
                                    <a href="http://" class="text-black">
                                        Manual Standard Wheelchair <br>MW02
                                    </a>
                                </h2>
                                <div class="reviews-block mt-1 d-flex align-items-center justify-content-between">
                                    <div class="rate-block d-flex flex-wrap align-items-baseline gap-md-1">
                                        <span>
                                            3000AED
                                        </span>
                                        <del>
                                            3500AED
                                        </del>
                                    </div>
                                    <div class="star-reviews d-flex align-items-center gap-1">
                                        <img src="{{ asset('assets/web/images/star-p') }}.png" alt="Star Icon" srcset="" height="auto"
                                            width="auto">
                                        <span>4.5(128)</span>
                                    </div>
                                </div>
                                <div class="product-button text-center mt-4">
                                    <a href="http://" class="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20px" x="0"
                                            y="0" viewBox="0 0 450.391 450.391"
                                            style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                                <path
                                                    d="M143.673 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02 25.969 0 47.02-21.052 47.02-47.02.001-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM342.204 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02s47.02-21.052 47.02-47.02c0-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM448.261 76.037a13.064 13.064 0 0 0-8.359-4.18L99.788 67.155 90.384 38.42C83.759 19.211 65.771 6.243 45.453 6.028H10.449C4.678 6.028 0 10.706 0 16.477s4.678 10.449 10.449 10.449h35.004a27.17 27.17 0 0 1 25.078 18.286l66.351 200.098-5.224 12.016a50.154 50.154 0 0 0 4.702 45.453 48.588 48.588 0 0 0 39.184 21.943h203.233c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449H175.543a26.646 26.646 0 0 1-21.943-12.539 28.733 28.733 0 0 1-2.612-25.078l4.18-9.404 219.951-22.988c24.16-2.661 44.034-20.233 49.633-43.886L449.83 84.917a8.882 8.882 0 0 0-1.569-8.88zm-43.885 109.191c-3.392 15.226-16.319 26.457-31.869 27.69l-217.339 22.465-48.588-147.33 320.261 4.702-22.465 92.473z"
                                                    fill="" opacity="1" data-original="#000000" class="cart-icon">
                                                </path>
                                            </g>
                                        </svg>
                                        <span class="ms-md-2 ms-1">Add to cart</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card position-relative">
                            <div
                                class="wish-icon position-absolute d-flex align-items-center justify-content-center end-0">
                                <img src="{{ asset('assets/web/images/heart-white') }}.png" alt="Wish Icon" srcset="" width="auto"
                                    height="auto">
                            </div>
                            <a href="http://" class="feature-pro-img">
                                <img src="{{ asset('assets/web/images/shop-categories') }}-img.png" alt="Product Image" srcset=""
                                    width="100%" height="auto">
                            </a>
                            <div class="product-card-body">
                                <h2 class="m-0 product-card-title">
                                    <a href="http://" class="text-black">
                                        Manual Standard Wheelchair <br>MW02
                                    </a>
                                </h2>
                                <div class="reviews-block mt-1 d-flex align-items-center justify-content-between">
                                    <div class="rate-block d-flex flex-wrap align-items-baseline gap-md-1">
                                        <span>
                                            3000AED
                                        </span>
                                        <del>
                                            3500AED
                                        </del>
                                    </div>
                                    <div class="star-reviews d-flex align-items-center gap-1">
                                        <img src="{{ asset('assets/web/images/star-p') }}.png" alt="Star Icon" srcset="" height="auto"
                                            width="auto">
                                        <span>4.5(128)</span>
                                    </div>
                                </div>
                                <div class="product-button text-center mt-4">
                                    <a href="http://" class="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20px" x="0"
                                            y="0" viewBox="0 0 450.391 450.391"
                                            style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                                <path
                                                    d="M143.673 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02 25.969 0 47.02-21.052 47.02-47.02.001-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM342.204 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02s47.02-21.052 47.02-47.02c0-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM448.261 76.037a13.064 13.064 0 0 0-8.359-4.18L99.788 67.155 90.384 38.42C83.759 19.211 65.771 6.243 45.453 6.028H10.449C4.678 6.028 0 10.706 0 16.477s4.678 10.449 10.449 10.449h35.004a27.17 27.17 0 0 1 25.078 18.286l66.351 200.098-5.224 12.016a50.154 50.154 0 0 0 4.702 45.453 48.588 48.588 0 0 0 39.184 21.943h203.233c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449H175.543a26.646 26.646 0 0 1-21.943-12.539 28.733 28.733 0 0 1-2.612-25.078l4.18-9.404 219.951-22.988c24.16-2.661 44.034-20.233 49.633-43.886L449.83 84.917a8.882 8.882 0 0 0-1.569-8.88zm-43.885 109.191c-3.392 15.226-16.319 26.457-31.869 27.69l-217.339 22.465-48.588-147.33 320.261 4.702-22.465 92.473z"
                                                    fill="" opacity="1" data-original="#000000" class="cart-icon">
                                                </path>
                                            </g>
                                        </svg>
                                        <span class="ms-md-2 ms-1">Add to cart</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card position-relative">
                            <div
                                class="wish-icon position-absolute d-flex align-items-center justify-content-center end-0">
                                <img src="{{ asset('assets/web/images/heart-white') }}.png" alt="Wish Icon" srcset="" width="auto"
                                    height="auto">
                            </div>
                            <a href="http://" class="feature-pro-img">
                                <img src="{{ asset('assets/web/images/shop-categories') }}-img.png" alt="Product Image" srcset=""
                                    width="100%" height="auto">
                            </a>
                            <div class="product-card-body">
                                <h2 class="m-0 product-card-title">
                                    <a href="http://" class="text-black">
                                        Manual Standard Wheelchair <br>MW02
                                    </a>
                                </h2>
                                <div class="reviews-block mt-1 d-flex align-items-center justify-content-between">
                                    <div class="rate-block d-flex flex-wrap align-items-baseline gap-md-1">
                                        <span>
                                            3000AED
                                        </span>
                                        <del>
                                            3500AED
                                        </del>
                                    </div>
                                    <div class="star-reviews d-flex align-items-center gap-1">
                                        <img src="{{ asset('assets/web/images/star-p') }}.png" alt="Star Icon" srcset="" height="auto"
                                            width="auto">
                                        <span>4.5(128)</span>
                                    </div>
                                </div>
                                <div class="product-button text-center mt-4">
                                    <a href="http://" class="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20px" x="0"
                                            y="0" viewBox="0 0 450.391 450.391"
                                            style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                                <path
                                                    d="M143.673 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02 25.969 0 47.02-21.052 47.02-47.02.001-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM342.204 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02s47.02-21.052 47.02-47.02c0-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM448.261 76.037a13.064 13.064 0 0 0-8.359-4.18L99.788 67.155 90.384 38.42C83.759 19.211 65.771 6.243 45.453 6.028H10.449C4.678 6.028 0 10.706 0 16.477s4.678 10.449 10.449 10.449h35.004a27.17 27.17 0 0 1 25.078 18.286l66.351 200.098-5.224 12.016a50.154 50.154 0 0 0 4.702 45.453 48.588 48.588 0 0 0 39.184 21.943h203.233c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449H175.543a26.646 26.646 0 0 1-21.943-12.539 28.733 28.733 0 0 1-2.612-25.078l4.18-9.404 219.951-22.988c24.16-2.661 44.034-20.233 49.633-43.886L449.83 84.917a8.882 8.882 0 0 0-1.569-8.88zm-43.885 109.191c-3.392 15.226-16.319 26.457-31.869 27.69l-217.339 22.465-48.588-147.33 320.261 4.702-22.465 92.473z"
                                                    fill="" opacity="1" data-original="#000000" class="cart-icon">
                                                </path>
                                            </g>
                                        </svg>
                                        <span class="ms-md-2 ms-1">Add to cart</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-40">
                        <a href="http://" class="button">Load More Items</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="feature-product">
        <div class="page-width">
            <h2 class="">
                Vehicle
                <b>Modification</b>
            </h2>
            <div class="container-fluid px-0">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card position-relative">
                            <div
                                class="wish-icon position-absolute d-flex align-items-center justify-content-center end-0">
                                <img src="{{ asset('assets/web/images/heart-white') }}.png" alt="Wish Icon" srcset="" width="auto"
                                    height="auto">
                            </div>
                            <a href="http://" class="feature-pro-img">
                                <img src="{{ asset('assets/web/images/shop-categories') }}-img.png" alt="Product Image" srcset=""
                                    width="100%" height="auto">
                            </a>
                            <div class="product-card-body">
                                <h2 class="m-0 product-card-title">
                                    <a href="http://" class="text-black">
                                        Manual Standard Wheelchair <br>MW02
                                    </a>
                                </h2>
                                <div class="reviews-block mt-1 d-flex align-items-center justify-content-between">
                                    <div class="rate-block d-flex flex-wrap align-items-baseline gap-md-1">
                                        <span>
                                            3000AED
                                        </span>
                                        <del>
                                            3500AED
                                        </del>
                                    </div>
                                    <div class="star-reviews d-flex align-items-center gap-1">
                                        <img src="{{ asset('assets/web/images/star-p') }}.png" alt="Star Icon" srcset="" height="auto"
                                            width="auto">
                                        <span>4.5(128)</span>
                                    </div>
                                </div>
                                <div class="product-button text-center mt-4">
                                    <a href="http://" class="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20px" x="0"
                                            y="0" viewBox="0 0 450.391 450.391"
                                            style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                                <path
                                                    d="M143.673 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02 25.969 0 47.02-21.052 47.02-47.02.001-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM342.204 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02s47.02-21.052 47.02-47.02c0-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM448.261 76.037a13.064 13.064 0 0 0-8.359-4.18L99.788 67.155 90.384 38.42C83.759 19.211 65.771 6.243 45.453 6.028H10.449C4.678 6.028 0 10.706 0 16.477s4.678 10.449 10.449 10.449h35.004a27.17 27.17 0 0 1 25.078 18.286l66.351 200.098-5.224 12.016a50.154 50.154 0 0 0 4.702 45.453 48.588 48.588 0 0 0 39.184 21.943h203.233c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449H175.543a26.646 26.646 0 0 1-21.943-12.539 28.733 28.733 0 0 1-2.612-25.078l4.18-9.404 219.951-22.988c24.16-2.661 44.034-20.233 49.633-43.886L449.83 84.917a8.882 8.882 0 0 0-1.569-8.88zm-43.885 109.191c-3.392 15.226-16.319 26.457-31.869 27.69l-217.339 22.465-48.588-147.33 320.261 4.702-22.465 92.473z"
                                                    fill="" opacity="1" data-original="#000000" class="cart-icon">
                                                </path>
                                            </g>
                                        </svg>
                                        <span class="ms-md-2 ms-1">Add to cart</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>     
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card position-relative">
                            <div
                                class="wish-icon position-absolute d-flex align-items-center justify-content-center end-0">
                                <img src="{{ asset('assets/web/images/heart-white') }}.png" alt="Wish Icon" srcset="" width="auto"
                                    height="auto">
                            </div>
                            <a href="http://" class="feature-pro-img">
                                <img src="{{ asset('assets/web/images/shop-categories') }}-img.png" alt="Product Image" srcset=""
                                    width="100%" height="auto">
                            </a>
                            <div class="product-card-body">
                                <h2 class="m-0 product-card-title">
                                    <a href="http://" class="text-black">
                                        Manual Standard Wheelchair <br>MW02
                                    </a>
                                </h2>
                                <div class="reviews-block mt-1 d-flex align-items-center justify-content-between">
                                    <div class="rate-block d-flex flex-wrap align-items-baseline gap-md-1">
                                        <span>
                                            3000AED
                                        </span>
                                        <del>
                                            3500AED
                                        </del>
                                    </div>
                                    <div class="star-reviews d-flex align-items-center gap-1">
                                        <img src="{{ asset('assets/web/images/star-p') }}.png" alt="Star Icon" srcset="" height="auto"
                                            width="auto">
                                        <span>4.5(128)</span>
                                    </div>
                                </div>
                                <div class="product-button text-center mt-4">
                                    <a href="http://" class="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20px" x="0"
                                            y="0" viewBox="0 0 450.391 450.391"
                                            style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                                <path
                                                    d="M143.673 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02 25.969 0 47.02-21.052 47.02-47.02.001-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM342.204 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02s47.02-21.052 47.02-47.02c0-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM448.261 76.037a13.064 13.064 0 0 0-8.359-4.18L99.788 67.155 90.384 38.42C83.759 19.211 65.771 6.243 45.453 6.028H10.449C4.678 6.028 0 10.706 0 16.477s4.678 10.449 10.449 10.449h35.004a27.17 27.17 0 0 1 25.078 18.286l66.351 200.098-5.224 12.016a50.154 50.154 0 0 0 4.702 45.453 48.588 48.588 0 0 0 39.184 21.943h203.233c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449H175.543a26.646 26.646 0 0 1-21.943-12.539 28.733 28.733 0 0 1-2.612-25.078l4.18-9.404 219.951-22.988c24.16-2.661 44.034-20.233 49.633-43.886L449.83 84.917a8.882 8.882 0 0 0-1.569-8.88zm-43.885 109.191c-3.392 15.226-16.319 26.457-31.869 27.69l-217.339 22.465-48.588-147.33 320.261 4.702-22.465 92.473z"
                                                    fill="" opacity="1" data-original="#000000" class="cart-icon">
                                                </path>
                                            </g>
                                        </svg>
                                        <span class="ms-md-2 ms-1">Add to cart</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card position-relative">
                            <div
                                class="wish-icon position-absolute d-flex align-items-center justify-content-center end-0">
                                <img src="{{ asset('assets/web/images/heart-white') }}.png" alt="Wish Icon" srcset="" width="auto"
                                    height="auto">
                            </div>
                            <a href="http://" class="feature-pro-img">
                                <img src="{{ asset('assets/web/images/shop-categories') }}-img.png" alt="Product Image" srcset=""
                                    width="100%" height="auto">
                            </a>
                            <div class="product-card-body">
                                <h2 class="m-0 product-card-title">
                                    <a href="http://" class="text-black">
                                        Manual Standard Wheelchair <br>MW02
                                    </a>
                                </h2>
                                <div class="reviews-block mt-1 d-flex align-items-center justify-content-between">
                                    <div class="rate-block d-flex flex-wrap align-items-baseline gap-md-1">
                                        <span>
                                            3000AED
                                        </span>
                                        <del>
                                            3500AED
                                        </del>
                                    </div>
                                    <div class="star-reviews d-flex align-items-center gap-1">
                                        <img src="{{ asset('assets/web/images/star-p') }}.png" alt="Star Icon" srcset="" height="auto"
                                            width="auto">
                                        <span>4.5(128)</span>
                                    </div>
                                </div>
                                <div class="product-button text-center mt-4">
                                    <a href="http://" class="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20px" x="0"
                                            y="0" viewBox="0 0 450.391 450.391"
                                            style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                                <path
                                                    d="M143.673 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02 25.969 0 47.02-21.052 47.02-47.02.001-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM342.204 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02s47.02-21.052 47.02-47.02c0-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM448.261 76.037a13.064 13.064 0 0 0-8.359-4.18L99.788 67.155 90.384 38.42C83.759 19.211 65.771 6.243 45.453 6.028H10.449C4.678 6.028 0 10.706 0 16.477s4.678 10.449 10.449 10.449h35.004a27.17 27.17 0 0 1 25.078 18.286l66.351 200.098-5.224 12.016a50.154 50.154 0 0 0 4.702 45.453 48.588 48.588 0 0 0 39.184 21.943h203.233c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449H175.543a26.646 26.646 0 0 1-21.943-12.539 28.733 28.733 0 0 1-2.612-25.078l4.18-9.404 219.951-22.988c24.16-2.661 44.034-20.233 49.633-43.886L449.83 84.917a8.882 8.882 0 0 0-1.569-8.88zm-43.885 109.191c-3.392 15.226-16.319 26.457-31.869 27.69l-217.339 22.465-48.588-147.33 320.261 4.702-22.465 92.473z"
                                                    fill="" opacity="1" data-original="#000000" class="cart-icon">
                                                </path>
                                            </g>
                                        </svg>
                                        <span class="ms-md-2 ms-1">Add to cart</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card position-relative">
                            <div
                                class="wish-icon position-absolute d-flex align-items-center justify-content-center end-0">
                                <img src="{{ asset('assets/web/images/heart-white') }}.png" alt="Wish Icon" srcset="" width="auto"
                                    height="auto">
                            </div>
                            <a href="http://" class="feature-pro-img">
                                <img src="{{ asset('assets/web/images/shop-categories') }}-img.png" alt="Product Image" srcset=""
                                    width="100%" height="auto">
                            </a>
                            <div class="product-card-body">
                                <h2 class="m-0 product-card-title">
                                    <a href="http://" class="text-black">
                                        Manual Standard Wheelchair <br>MW02
                                    </a>
                                </h2>
                                <div class="reviews-block mt-1 d-flex align-items-center justify-content-between">
                                    <div class="rate-block d-flex flex-wrap align-items-baseline gap-md-1">
                                        <span>
                                            3000AED
                                        </span>
                                        <del>
                                            3500AED
                                        </del>
                                    </div>
                                    <div class="star-reviews d-flex align-items-center gap-1">
                                        <img src="{{ asset('assets/web/images/star-p') }}.png" alt="Star Icon" srcset="" height="auto"
                                            width="auto">
                                        <span>4.5(128)</span>
                                    </div>
                                </div>
                                <div class="product-button text-center mt-4">
                                    <a href="http://" class="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20px" x="0"
                                            y="0" viewBox="0 0 450.391 450.391"
                                            style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                                <path
                                                    d="M143.673 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02 25.969 0 47.02-21.052 47.02-47.02.001-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM342.204 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02s47.02-21.052 47.02-47.02c0-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM448.261 76.037a13.064 13.064 0 0 0-8.359-4.18L99.788 67.155 90.384 38.42C83.759 19.211 65.771 6.243 45.453 6.028H10.449C4.678 6.028 0 10.706 0 16.477s4.678 10.449 10.449 10.449h35.004a27.17 27.17 0 0 1 25.078 18.286l66.351 200.098-5.224 12.016a50.154 50.154 0 0 0 4.702 45.453 48.588 48.588 0 0 0 39.184 21.943h203.233c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449H175.543a26.646 26.646 0 0 1-21.943-12.539 28.733 28.733 0 0 1-2.612-25.078l4.18-9.404 219.951-22.988c24.16-2.661 44.034-20.233 49.633-43.886L449.83 84.917a8.882 8.882 0 0 0-1.569-8.88zm-43.885 109.191c-3.392 15.226-16.319 26.457-31.869 27.69l-217.339 22.465-48.588-147.33 320.261 4.702-22.465 92.473z"
                                                    fill="" opacity="1" data-original="#000000" class="cart-icon">
                                                </path>
                                            </g>
                                        </svg>
                                        <span class="ms-md-2 ms-1">Add to cart</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-40">
                        <a href="http://" class="button">Load More Items</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

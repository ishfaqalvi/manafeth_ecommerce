@extends('web.layout.app')

@section('title')
	Manafeth
@endsection

@section('content')
<section class="banner">
    <div class="page-width">
        <div class="container-fluid px-0">
            <div class="row gap-2 gap-md-0">
                <div class="col-md-3">
                    <div class="banner-img">
                        <img src="{{ asset('assets/web/images/banner-left.png') }}" alt="Banner Img" srcset="" height="auto"
                            width="100%">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="banner-img-slider">
                        @foreach($data['banners'] as $banner)
                        <img src="{{ $banner->image }}" alt="Banner Img" srcset="" height="auto" width="100%">
                        @endforeach
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="banner-img">
                        <img src="{{ asset('assets/web/images/banner-right.png') }}" alt="Banner Img" srcset="" height="auto"
                            width="100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="shop-categories position-relative overflow-x-hidden">
    <div class="page-width">
        <div class="position-relative">
            <h2 class="mb-3 h2">
                Shop By
                <b>Categories</b>
            </h2>
            <div class="shop-categories-slider">
                @foreach ($data['categories'] as $category)
                <div class="shop-categories-card d-flex flex-column align-items-center">
                    <div class="out-line">
                        <div class="shop-categories-card-product">
                            <img src="{{ $category->image }}" alt="Shop Categories Product Image"
                                srcset="" height="auto" width="100%">
                        </div>
                    </div>
                    <h6 class="mt-2 text-center">{{ $category->name }}</h6>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="product-tab-section">
    <nav>
        <div class="nav nav-tabs mx-auto d-grid" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    width="20" height="20px" x="0" y="0" viewBox="0 0 450.391 450.391"
                    style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                    <g>
                        <path
                            d="M143.673 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02 25.969 0 47.02-21.052 47.02-47.02.001-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM342.204 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02s47.02-21.052 47.02-47.02c0-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM448.261 76.037a13.064 13.064 0 0 0-8.359-4.18L99.788 67.155 90.384 38.42C83.759 19.211 65.771 6.243 45.453 6.028H10.449C4.678 6.028 0 10.706 0 16.477s4.678 10.449 10.449 10.449h35.004a27.17 27.17 0 0 1 25.078 18.286l66.351 200.098-5.224 12.016a50.154 50.154 0 0 0 4.702 45.453 48.588 48.588 0 0 0 39.184 21.943h203.233c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449H175.543a26.646 26.646 0 0 1-21.943-12.539 28.733 28.733 0 0 1-2.612-25.078l4.18-9.404 219.951-22.988c24.16-2.661 44.034-20.233 49.633-43.886L449.83 84.917a8.882 8.882 0 0 0-1.569-8.88zm-43.885 109.191c-3.392 15.226-16.319 26.457-31.869 27.69l-217.339 22.465-48.588-147.33 320.261 4.702-22.465 92.473z"
                            fill="" opacity="1" data-original="#000000" class="tab-nav-icon">
                        </path>
                    </g>
                </svg>
                <span class="ms-1">Sale</span>
            </button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    width="20" height="20" x="0" y="0" viewBox="0 0 379.5 379.5"
                    style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                    <g>
                        <path
                            d="m81.425 332.434-18.563 28.563c-3.593 5.569-2.036 12.994 3.533 16.587 2.036 1.317 4.252 1.916 6.527 1.916 3.952 0 7.785-1.916 10.06-5.449l18.144-27.905c25.988 15.449 56.288 24.372 88.624 24.372 32.396 0 62.695-8.922 88.624-24.431l18.084 27.905c2.275 3.533 6.168 5.449 10.06 5.449 2.216 0 4.491-.599 6.527-1.916 5.569-3.593 7.126-11.018 3.533-16.587l-18.503-28.563c39.761-31.797 65.33-80.72 65.33-135.511 0-95.75-77.905-173.655-173.655-173.655S16.095 101.113 16.095 196.863c0 54.791 25.569 103.714 65.33 135.571zM189.75 47.16c82.576 0 149.703 67.127 149.703 149.703S272.326 346.566 189.75 346.566 40.047 279.439 40.047 196.863 107.174 47.16 189.75 47.16z"
                            fill="" opacity="1" data-original="#000000" class="tab-nav-icon">
                        </path>
                        <path
                            d="M229.751 247.822c2.275 1.976 5.09 2.934 7.904 2.934a12.03 12.03 0 0 0 9.042-4.072c4.371-4.97 3.832-12.515-1.138-16.886l-43.833-38.384V95.065c0-6.587-5.389-11.976-11.976-11.976s-11.976 5.389-11.976 11.976v101.798c0 3.473 1.497 6.767 4.072 9.042zM40.047 62.31c3.114 0 6.228-1.198 8.563-3.593C62.862 44.166 79.03 32.01 96.575 22.549c5.808-3.114 8.024-10.359 4.91-16.228-3.114-5.808-10.359-8.024-16.228-4.91-19.76 10.599-37.844 24.192-53.832 40.54-4.611 4.731-4.551 12.335.18 16.946 2.394 2.276 5.448 3.413 8.442 3.413zM282.925 22.549c17.605 9.401 33.713 21.617 47.965 36.168 2.335 2.395 5.449 3.593 8.563 3.593a12.03 12.03 0 0 0 8.383-3.413c4.731-4.611 4.79-12.216.18-16.946-15.928-16.288-34.072-29.941-53.833-40.539-5.868-3.114-13.114-.898-16.228 4.91-3.054 5.868-.898 13.113 4.97 16.227z"
                            fill="" opacity="1" data-original="#000000" class="tab-nav-icon">
                        </path>
                    </g>
                </svg>
                <span class="ms-1">Rental</span></button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    width="20" height="20" x="0" y="0" viewBox="0 0 511 512"
                    style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                    <g>
                        <path
                            d="M347.34 155.148c-5.52 0-10 4.47-10 9.997 0 5.523 4.48 10 10 10 5.531 0 10-4.477 10-10a9.988 9.988 0 0 0-10-9.997zM165.645 336.84c-5.532 0-10 4.48-10 10a9.99 9.99 0 0 0 10 10c5.52 0 10-4.469 10-10 0-5.52-4.48-10-10-10zm0 0"
                            fill="" opacity="1" data-original="#000000" class="">
                        </path>
                        <path
                            d="M500.059 61.52a9.992 9.992 0 0 0-9.36 2.695L449.242 106h-19.875l-21.879-22.668V63.18l40.864-41.473a9.993 9.993 0 0 0 2.601-9.336 9.994 9.994 0 0 0-6.531-7.156C434.156 1.754 423.414 0 412.488 0c-32.57 0-62.16 15.188-81.183 41.668-17.805 24.789-23.293 55.168-15.43 84.242l-73.66 73.66-122.719-123V52.43a9.998 9.998 0 0 0-4.855-8.575L43.934 1.425A9.992 9.992 0 0 0 31.719 2.93L3.438 31.207a10.01 10.01 0 0 0-1.504 12.219l42.421 70.707a10 10 0 0 0 8.57 4.855l24.134.008 122.73 123-73.379 73.379c-29.074-7.86-59.469-2.363-84.27 15.453C15.677 349.84.5 379.422.5 411.992c0 10.922 1.754 21.668 5.215 31.93a10 10 0 0 0 16.574 3.852l41.453-41.782h19.985l22.77 22.77v19.984L64.714 490.2a10 10 0 0 0 3.851 16.574c10.262 3.461 21.008 5.215 31.93 5.215 32.57 0 62.149-15.18 81.164-41.644 17.817-24.801 23.313-55.192 15.453-84.266l58.934-58.933 13.5 14.664-6.195 6.191c-3.907 3.906-3.907 10.238 0 14.145 3.906 3.902 10.234 3.902 14.144 0l5.61-5.61L409.77 494.121c.093.102.19.2.289.297 23.437 23.437 61.41 23.445 84.859-.004 23.383-23.394 23.383-61.46 0-84.855-.102-.102-.207-.2-.313-.297l-137.8-126.422 5.547-5.547c3.906-3.902 3.906-10.234 0-14.14s-10.235-3.907-14.145 0l-6.152 6.156-14.692-13.485 59.219-59.219a100.198 100.198 0 0 0 25.906 3.391c55.14 0 99.996-44.86 99.996-99.996 0-10.926-1.754-21.668-5.214-31.934a9.99 9.99 0 0 0-7.211-6.546zM88.285 101.934c-1.875-1.88-4.418-2.836-7.074-2.836l-22.617-.008-35.492-59.258L40.34 22.594l59.156 35.5V80.71a9.997 9.997 0 0 0 2.922 7.062l125.656 125.942-14.144 14.14zm254.363 195.062 138.27 126.848c15.445 15.61 15.398 40.883-.145 56.433-15.578 15.578-40.796 15.625-56.437.137L297.258 342.38zm-14.75-13.535L283.7 327.652l-13.5-14.664 43.008-43.011zm84.59-103.465a79.917 79.917 0 0 1-25.558-4.168 10.017 10.017 0 0 0-10.262 2.406c-50.133 50.133-158.156 158.153-197.934 197.934a9.998 9.998 0 0 0-2.406 10.266c8.313 24.683 4.336 51.011-10.914 72.242-15.207 21.168-38.871 33.312-64.918 33.312-2.926 0-5.836-.16-8.719-.468l31.762-31.516a9.997 9.997 0 0 0 2.957-7.098v-28.289a10 10 0 0 0-2.93-7.07l-28.628-28.629a10 10 0 0 0-7.07-2.93h-28.29a10.012 10.012 0 0 0-7.101 2.957l-31.512 31.762a80.897 80.897 0 0 1-.469-8.719c0-26.05 12.14-49.71 33.313-64.918 21.226-15.25 47.558-19.23 72.246-10.914a9.993 9.993 0 0 0 10.261-2.406c.551-.547 197.793-197.793 197.934-197.934a9.999 9.999 0 0 0 2.406-10.261c-8.316-24.684-4.347-51.004 10.89-72.22C362.767 32.149 386.435 20 412.485 20c3.016 0 6.012.168 8.98.496l-31.1 31.566a9.993 9.993 0 0 0-2.876 7.016v28.29a9.988 9.988 0 0 0 2.805 6.944l27.629 28.63a9.992 9.992 0 0 0 7.195 3.054h28.29a9.994 9.994 0 0 0 7.097-2.957l31.512-31.758c.312 2.883.468 5.793.468 8.719 0 44.11-35.886 79.996-79.996 79.996zm0 0"
                            fill="" opacity="1" data-original="#000000" class="tab-nav-icon"></path>
                        <path
                            d="M311.988 186.355 186.852 311.492c-3.903 3.903-3.903 10.235 0 14.14 3.906 3.907 10.238 3.907 14.144 0l125.137-125.136c3.906-3.902 3.906-10.234 0-14.14s-10.238-3.907-14.145 0zM438.355 452c3.907 3.895 10.239 3.895 14.145-.023 3.898-3.91 3.887-10.243-.023-14.141l-90.137-89.848c-3.91-3.898-10.246-3.886-14.14.024-3.903 3.914-3.891 10.242.019 14.14zm0 0"
                            fill="#000000" opacity="1" data-original="#000000" class="tab-nav-icon">
                        </path>
                    </g>
                </svg>
                <span class="ms-1">Maintenance</span>
            </button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="page-width">
                <div class="container-fluid px-0">
                    <div class="row">
                        @foreach($data['products']['sale'] as $product)
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="product-card position-relative">
                                <div class="wish-icon position-absolute d-flex align-items-center justify-content-center end-0">
                                    <a href="javascript:void(0)" class="add-to-wishlist" data-product-id="{{ $product->id }}" title="Add to Wishlist">
                                        <img src="{{ asset('assets/web/images/heart-white.png') }}" alt="Wish Icon" srcset="" width="auto" height="auto">
                                    </a>
                                </div>
                                <a href="{{ route('web.products.show', $product->id) }}">
                                    <img src="{{ $product->thumbnail }}" alt="Product Image" srcset="" width="100%" height="auto">
                                </a>
                                <div class="product-card-body">
                                    <h2 class="m-0 product-card-title">
                                        <a href="{{ route('web.products.show', $product->id) }}" class="text-black">
                                            {{ $product->name }} <br>{{ $product->model }}
                                        </a>
                                    </h2>
                                    <div
                                        class="reviews-block mt-1 d-flex align-items-center justify-content-between">
                                        <div class="rate-block d-flex flex-wrap align-items-baseline gap-md-1">
                                            <span>
                                                {{ $product->price }}AED
                                            </span>
                                            @if(!empty($product->discount))
                                            <del>
                                                {{ $product->discount }}AED
                                            </del>
                                            @endif
                                        </div>
                                        <div class="star-reviews d-flex align-items-center gap-1">
                                            <img src="{{ asset('assets/web/images/star-p.png') }}" alt="Star Icon" srcset=""
                                                height="auto" width="auto">
                                            <span>4.5(128)</span>
                                        </div>
                                    </div>
                                    <div class="product-button text-center mt-4">
                                        <a href="javascript:void(0)" class="button add-to-cart" data-product-id="{{ $product->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20px"
                                                x="0" y="0" viewBox="0 0 450.391 450.391"
                                                style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                class="">
                                                <g>
                                                    <path
                                                        d="M143.673 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02 25.969 0 47.02-21.052 47.02-47.02.001-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM342.204 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02s47.02-21.052 47.02-47.02c0-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM448.261 76.037a13.064 13.064 0 0 0-8.359-4.18L99.788 67.155 90.384 38.42C83.759 19.211 65.771 6.243 45.453 6.028H10.449C4.678 6.028 0 10.706 0 16.477s4.678 10.449 10.449 10.449h35.004a27.17 27.17 0 0 1 25.078 18.286l66.351 200.098-5.224 12.016a50.154 50.154 0 0 0 4.702 45.453 48.588 48.588 0 0 0 39.184 21.943h203.233c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449H175.543a26.646 26.646 0 0 1-21.943-12.539 28.733 28.733 0 0 1-2.612-25.078l4.18-9.404 219.951-22.988c24.16-2.661 44.034-20.233 49.633-43.886L449.83 84.917a8.882 8.882 0 0 0-1.569-8.88zm-43.885 109.191c-3.392 15.226-16.319 26.457-31.869 27.69l-217.339 22.465-48.588-147.33 320.261 4.702-22.465 92.473z"
                                                        fill="" opacity="1" data-original="#000000"
                                                        class="cart-icon">
                                                    </path>
                                                </g>
                                            </svg>
                                            <span class="ms-md-2 ms-1">Add to cart</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-12 load-more-items text-center pt-lg-5 mt-4">
                            <a href="{{ route('web.products.sale') }}" class="button">View All Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="page-width">
                <div class="container-fluid px-0">
                    <div class="row">
                        @foreach($data['products']['rent'] as $product)
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="product-card position-relative">
                                    <div class="wish-icon position-absolute d-flex align-items-center justify-content-center end-0">
                                        <a href="javascript:void(0)" class="add-to-wishlist" data-product-id="{{ $product->id }}" title="Add to Wishlist">
                                            <img src="{{ asset('assets/web/images/heart-white.png') }}" alt="Wish Icon" srcset="" width="auto" height="auto">
                                        </a>
                                    </div>
                                    <a href="{{ route('web.products.show', $product->id) }}">
                                        <img src="{{ $product->thumbnail }}" alt="Product Image" srcset="" width="100%" height="auto">
                                    </a>
                                    <div class="product-card-body">
                                        <h2 class="m-0 product-card-title">
                                            <a href="{{ route('web.products.show', $product->id) }}" class="text-black">
                                                {{ $product->name }} <br>{{ $product->model }}
                                            </a>
                                        </h2>
                                        <div
                                            class="reviews-block mt-1 d-flex align-items-center justify-content-between">
                                            <div class="rate-block d-flex flex-wrap align-items-baseline gap-md-1">
                                                <span>
                                                    {{ $product->price }}AED
                                                </span>
                                                @if(!empty($product->discount))
                                                <del>
                                                    {{ $product->discount }}AED
                                                </del>
                                                @endif
                                            </div>
                                            <div class="star-reviews d-flex align-items-center gap-1">
                                                <img src="{{ asset('assets/web/images/star-p.png') }}" alt="Star Icon" srcset=""
                                                    height="auto" width="auto">
                                                <span>4.5(128)</span>
                                            </div>
                                        </div>
                                        <div class="product-button text-center mt-4">
                                            <a href="http://" class="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20px"
                                                    x="0" y="0" viewBox="0 0 450.391 450.391"
                                                    style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                    class="">
                                                    <g>
                                                        <path
                                                            d="M143.673 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02 25.969 0 47.02-21.052 47.02-47.02.001-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM342.204 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02s47.02-21.052 47.02-47.02c0-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM448.261 76.037a13.064 13.064 0 0 0-8.359-4.18L99.788 67.155 90.384 38.42C83.759 19.211 65.771 6.243 45.453 6.028H10.449C4.678 6.028 0 10.706 0 16.477s4.678 10.449 10.449 10.449h35.004a27.17 27.17 0 0 1 25.078 18.286l66.351 200.098-5.224 12.016a50.154 50.154 0 0 0 4.702 45.453 48.588 48.588 0 0 0 39.184 21.943h203.233c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449H175.543a26.646 26.646 0 0 1-21.943-12.539 28.733 28.733 0 0 1-2.612-25.078l4.18-9.404 219.951-22.988c24.16-2.661 44.034-20.233 49.633-43.886L449.83 84.917a8.882 8.882 0 0 0-1.569-8.88zm-43.885 109.191c-3.392 15.226-16.319 26.457-31.869 27.69l-217.339 22.465-48.588-147.33 320.261 4.702-22.465 92.473z"
                                                            fill="" opacity="1" data-original="#000000"
                                                            class="cart-icon">
                                                        </path>
                                                    </g>
                                                </svg>
                                                <span class="ms-md-2 ms-1">Add to cart</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12 load-more-items text-center pt-lg-5 mt-4">
                            <a href="{{ route('web.products.rent') }}" class="button">View All Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="page-width">
                <div class="container-fluid px-0">
                    <div class="row">
                        @foreach($data['products']['maintenance'] as $product)
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="product-card position-relative">
                                <div class="wish-icon position-absolute d-flex align-items-center justify-content-center end-0">
                                    <a href="javascript:void(0)" class="add-to-wishlist" data-product-id="{{ $product->id }}" title="Add to Wishlist">
                                        <img src="{{ asset('assets/web/images/heart-white.png') }}" alt="Wish Icon" srcset="" width="auto" height="auto">
                                    </a>
                                </div>
                                <a href="{{ route('web.products.show', $product->id) }}">
                                    <img src="{{ $product->thumbnail }}" alt="Product Image" srcset="" width="100%" height="auto">
                                </a>
                                <div class="product-card-body">
                                    <h2 class="m-0 product-card-title">
                                        <a href="{{ route('web.products.show', $product->id) }}" class="text-black">
                                            {{ $product->name }} <br>{{ $product->model }}
                                        </a>
                                    </h2>
                                    <div
                                        class="reviews-block mt-1 d-flex align-items-center justify-content-between">
                                        <div class="rate-block d-flex flex-wrap align-items-baseline gap-md-1">
                                            <span>
                                                {{ $product->price }}AED
                                            </span>
                                            @if(!empty($product->discount))
                                            <del>
                                                {{ $product->discount }}AED
                                            </del>
                                            @endif
                                        </div>
                                        <div class="star-reviews d-flex align-items-center gap-1">
                                            <img src="{{ asset('assets/web/images/star-p.png') }}" alt="Star Icon" srcset=""
                                                height="auto" width="auto">
                                            <span>4.5(128)</span>
                                        </div>
                                    </div>
                                    <div class="product-button text-center mt-4">
                                        <a href="http://" class="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20px"
                                                x="0" y="0" viewBox="0 0 450.391 450.391"
                                                style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                class="">
                                                <g>
                                                    <path
                                                        d="M143.673 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02 25.969 0 47.02-21.052 47.02-47.02.001-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM342.204 350.322c-25.969 0-47.02 21.052-47.02 47.02 0 25.969 21.052 47.02 47.02 47.02s47.02-21.052 47.02-47.02c0-25.968-21.051-47.02-47.02-47.02zm0 73.143c-14.427 0-26.122-11.695-26.122-26.122s11.695-26.122 26.122-26.122 26.122 11.695 26.122 26.122c.001 14.427-11.695 26.122-26.122 26.122zM448.261 76.037a13.064 13.064 0 0 0-8.359-4.18L99.788 67.155 90.384 38.42C83.759 19.211 65.771 6.243 45.453 6.028H10.449C4.678 6.028 0 10.706 0 16.477s4.678 10.449 10.449 10.449h35.004a27.17 27.17 0 0 1 25.078 18.286l66.351 200.098-5.224 12.016a50.154 50.154 0 0 0 4.702 45.453 48.588 48.588 0 0 0 39.184 21.943h203.233c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449H175.543a26.646 26.646 0 0 1-21.943-12.539 28.733 28.733 0 0 1-2.612-25.078l4.18-9.404 219.951-22.988c24.16-2.661 44.034-20.233 49.633-43.886L449.83 84.917a8.882 8.882 0 0 0-1.569-8.88zm-43.885 109.191c-3.392 15.226-16.319 26.457-31.869 27.69l-217.339 22.465-48.588-147.33 320.261 4.702-22.465 92.473z"
                                                        fill="" opacity="1" data-original="#000000"
                                                        class="cart-icon">
                                                    </path>
                                                </g>
                                            </svg>
                                            <span class="ms-md-2 ms-1">Add to cart</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-12 load-more-items text-center pt-lg-5 mt-4">
                            <a href="{{ route('web.products.maintenance') }}" class="button">View All Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="page-width">
    <div class="manual-standard">
        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-md-8">
                    <div class="manual-standard-img position-relative">
                        <img src="{{ asset('assets/web/images/standard-1.png') }}" alt="Standard Image" srcset="" height="100%"
                            width="100%">
                        <h2 class="position-absolute bottom-0 d-flex align-items-center justify-content-center">
                            <b class="text-black">Manual Standard Wheelchair MW02</b>
                        </h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="standard-right-image d-flex flex-column gap-lg-4 gap-3">
                        <img src="{{ asset('assets/web/images/standard2.png') }}" alt="Standard Image" srcset="" height="auto"
                            width="100%">
                        <img src="{{ asset('assets/web/images/standard3.png') }}" alt="Standard Image" srcset="" height="auto"
                            width="100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
                            <img src="{{ asset('assets/web/images/heart-white.png') }}" alt="Wish Icon" srcset="" width="auto"
                                height="auto">
                        </div>
                        <a href="http://" class="feature-pro-img">
                            <img src="{{ asset('assets/web/images/shop-categories-img.png') }}" alt="Product Image" srcset=""
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
                                    <img src="{{ asset('assets/web/images/star-p.png') }}" alt="Star Icon" srcset="" height="auto"
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
                            <img src="{{ asset('assets/web/images/heart-white.png') }}" alt="Wish Icon" srcset="" width="auto"
                                height="auto">
                        </div>
                        <a href="http://" class="feature-pro-img">
                            <img src="{{ asset('assets/web/images/shop-categories-img.png') }}" alt="Product Image" srcset=""
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
                                    <img src="{{ asset('assets/web/images/star-p.png') }}" alt="Star Icon" srcset="" height="auto"
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
                            <img src="{{ asset('assets/web/images/heart-white.png') }}" alt="Wish Icon" srcset="" width="auto"
                                height="auto">
                        </div>
                        <a href="http://" class="feature-pro-img">
                            <img src="{{ asset('assets/web/images/shop-categories-img.png') }}" alt="Product Image" srcset=""
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
                                    <img src="{{ asset('assets/web/images/star-p.png') }}" alt="Star Icon" srcset="" height="auto"
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
                            <img src="{{ asset('assets/web/images/heart-white.png') }}" alt="Wish Icon" srcset="" width="auto"
                                height="auto">
                        </div>
                        <a href="http://" class="feature-pro-img">
                            <img src="{{ asset('assets/web/images/shop-categories-img.png') }}" alt="Product Image" srcset=""
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
                                    <img src="{{ asset('assets/web/images/star-p.png') }}" alt="Star Icon" srcset="" height="auto"
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
                            <img src="{{ asset('assets/web/images/heart-white.png') }}" alt="Wish Icon" srcset="" width="auto"
                                height="auto">
                        </div>
                        <a href="http://" class="feature-pro-img">
                            <img src="{{ asset('assets/web/images/shop-categories-img.png') }}" alt="Product Image" srcset=""
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
                                    <img src="{{ asset('assets/web/images/star-p.png') }}" alt="Star Icon" srcset="" height="auto"
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
                            <img src="{{ asset('assets/web/images/heart-white.png') }}" alt="Wish Icon" srcset="" width="auto"
                                height="auto">
                        </div>
                        <a href="http://" class="feature-pro-img">
                            <img src="{{ asset('assets/web/images/shop-categories-img.png') }}" alt="Product Image" srcset=""
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
                                    <img src="{{ asset('assets/web/images/star-p.png') }}" alt="Star Icon" srcset="" height="auto"
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
                            <img src="{{ asset('assets/web/images/heart-white.png') }}" alt="Wish Icon" srcset="" width="auto"
                                height="auto">
                        </div>
                        <a href="http://" class="feature-pro-img">
                            <img src="{{ asset('assets/web/images/shop-categories-img.png') }}" alt="Product Image" srcset=""
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
                                    <img src="{{ asset('assets/web/images/star-p.png') }}" alt="Star Icon" srcset="" height="auto"
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
                            <img src="{{ asset('assets/web/images/heart-white.png') }}" alt="Wish Icon" srcset="" width="auto"
                                height="auto">
                        </div>
                        <a href="http://" class="feature-pro-img">
                            <img src="{{ asset('assets/web/images/shop-categories-img.png') }}" alt="Product Image" srcset=""
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
                                    <img src="{{ asset('assets/web/images/star-p.png') }}" alt="Star Icon" srcset="" height="auto"
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
<section class="blog-wrapper">
    <div class="page-width">
        <h2 class="mb-md-5 mb-4">
            Our
            <b>Blogs</b>
        </h2>
        <div class="container-fluid px-0">
            <div class="row">
                @foreach($data['blogs'] as $blog)
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
                                <date>{{ date('d M Y',$blog->date) }}</date>
                            </div>
                            <a href="{{ route('web.blogs.show', $blog->id) }}">
                                <h5 class="mb-0 title">
                                    {{ $blog->title }}
                                </h5>
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

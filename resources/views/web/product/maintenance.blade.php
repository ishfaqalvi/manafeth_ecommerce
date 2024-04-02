@extends('web.layout.app')

@section('title')
    Manafeth | Maintenance Products
@endsection

@section('content')
    <section class="manual-standard-page">
        <div class="page-width">
            <h2 class="h2 mb-0 text-black">
                Maintenance Products
            </h2>
            <ul class="list-unstyled d-flex gap-1 flex-wrap mt-3 mt-md-0 mb-0">
                <li>
                    <a href="" class="manual-item">
                        Home
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="12" height="auto" x="0" y="0" viewBox="0 0 407.436 407.436"
                            style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                            <g>
                                <path
                                    d="M112.814 0 91.566 21.178l181.946 182.54-181.946 182.54 21.248 21.178 203.055-203.718z"
                                    fill="#888888" opacity="1" data-original="#000000"></path>
                            </g>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="" class="manual-item">
                        Shop by category
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="12" height="auto" x="0" y="0" viewBox="0 0 407.436 407.436"
                            style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                            <g>
                                <path
                                    d="M112.814 0 91.566 21.178l181.946 182.54-181.946 182.54 21.248 21.178 203.055-203.718z"
                                    fill="#888888" opacity="1" data-original="#000000"></path>
                            </g>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="" class="manual-item active">
                        Manual Standard Wheelchair
                    </a>
                </li>
            </ul>
            <div class="wrapper-block py-md-5 py-3 d-flex gap-4 align-items-md-start flex-column flex-md-row">
                <div class="sidebar">
                    <h4 class="text-black sidear-wrapper-heading">Filter by price:</h4>
                    <div class="range_container">
                        <div class="sliders_control">
                            <input id="fromSlider" type="range" value="10" min="0" max="100" />
                            <input id="toSlider" type="range" value="40" min="0" max="100" />
                        </div>
                    </div>
                    <form class="d-flex flex-row filter-by-price-form gap-2 align-items-end mb-4">
                        <div class="form-data">
                            <label for="from">From:</label>
                            <input type="number" id="from" name="from" value="6800" required>
                        </div>
                        <div class="form-data">
                            <label for="to">To:</label>
                            <input type="number" id="to" name="to" value="45000" required>
                        </div>
                        <button type="submit">Search</button>
                    </form>
                    <div class="other-categories pt-pb-24 border-bottom-1">
                        <h4 class="text-black sidear-wrapper-heading mb-2">Other Categories:</h4>
                        <ul class="list-unstyled gap-2 d-flex flex-column mb-0">
                            <li>
                                <a href="" class="d-flex justify-content-between align-items-center">
                                    Manual Wheelchair
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="12" height="auto" x="0" y="0"
                                        viewBox="0 0 407.436 407.436" style="enable-background:new 0 0 512 512"
                                        xml:space="preserve" class="">
                                        <g>
                                            <path
                                                d="M112.814 0 91.566 21.178l181.946 182.54-181.946 182.54 21.248 21.178 203.055-203.718z"
                                                fill="#888888" opacity="1" data-original="#000000"></path>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="" class="d-flex justify-content-between align-items-center">
                                    Pride-Mobility Wheelchair <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="12" height="auto" x="0" y="0"
                                        viewBox="0 0 407.436 407.436" style="enable-background:new 0 0 512 512"
                                        xml:space="preserve" class="">
                                        <g>
                                            <path
                                                d="M112.814 0 91.566 21.178l181.946 182.54-181.946 182.54 21.248 21.178 203.055-203.718z"
                                                fill="#888888" opacity="1" data-original="#000000"></path>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="" class="d-flex justify-content-between align-items-center">
                                    Permobil Wheelchai <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="12" height="auto" x="0"
                                        y="0" viewBox="0 0 407.436 407.436" style="enable-background:new 0 0 512 512"
                                        xml:space="preserve" class="">
                                        <g>
                                            <path
                                                d="M112.814 0 91.566 21.178l181.946 182.54-181.946 182.54 21.248 21.178 203.055-203.718z"
                                                fill="#888888" opacity="1" data-original="#000000"></path>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="" class="d-flex justify-content-between align-items-center">
                                    Manual Wheelchair <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="12" height="auto" x="0"
                                        y="0" viewBox="0 0 407.436 407.436" style="enable-background:new 0 0 512 512"
                                        xml:space="preserve" class="">
                                        <g>
                                            <path
                                                d="M112.814 0 91.566 21.178l181.946 182.54-181.946 182.54 21.248 21.178 203.055-203.718z"
                                                fill="#888888" opacity="1" data-original="#000000"></path>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="filter-by-color pt-pb-24 border-bottom-1">
                        <h4 class="text-black sidear-wrapper-heading  mb-md-3 mb-1">Filter by Color</h4>
                        <form>
                            <div class="radio-container d-flex flex-column gap-3">
                                <label for="black" class="radio-label d-flex align-items-center">
                                    <input type="radio" id="black" name="color" value="black"
                                        checked><span>All</span>
                                </label>
                                <label for="blue" class="radio-label d-flex align-items-center">
                                    <input type="radio" id="blue" name="color" value="blue"><span>Blue</span>
                                </label>
                                <label for="silver" class="radio-label d-flex align-items-center">
                                    <input type="radio" id="silver" name="color"
                                        value="silver"><span>Silver</span>
                                </label>
                                <label for="green" class="radio-label d-flex align-items-center">
                                    <input type="radio" id="green" name="color"
                                        value="green"><span>Green</span>
                                </label>
                                <label for="black" class="radio-label d-flex align-items-center">
                                    <input type="radio" id="black" name="color"
                                        value="black"><span>Black</span>
                                </label>
                            </div>
                        </form>
                    </div>
                    <div class="type pt-pb-24 border-bottom-1">
                        <h4 class="text-black sidear-wrapper-heading  mb-md-3 mb-1">Type</h4>
                        <form>
                            <div class="radio-container d-flex flex-column gap-3">
                                <label for="blue" class="radio-label d-flex align-items-center">
                                    <input type="radio" id="electric" name="color"
                                        value="electric"><span>Electric</span>
                                </label>
                            </div>
                        </form>
                    </div>
                    <div class="frame pt-pb-24 border-bottom-1">
                        <h4 class="text-black sidear-wrapper-heading mb-md-3 mb-1">Frame</h4>
                        <form>
                            <div class="radio-container d-flex flex-column gap-3">
                                <label for="blue" class="radio-label d-flex align-items-center">
                                    <input type="radio" id="electric" name="color"
                                        value="electric"><span>Aluminum</span>
                                </label>
                            </div>
                        </form>
                    </div>
                    <div class="top-roducts-this-week  pt-pb-24">
                        <h4 class="text-black sidear-wrapper-heading  mb-3">Top Products this week:</h4>
                        <div class="top-roducts-this-week-wrapper d-flex flex-column gap-4">
                            <div class="top-roducts-this-week-wrapper-block d-flex">
                                <a href="http://">
                                    <img src="{{ asset('assets/web/images/top-product-week1.png') }}" alt="Alt Image" height="100%"
                                        width="50">
                                </a>
                                <div class="top-roducts-this-week-wrapper-block-content d-flex flex-column">
                                    <a href="http://">
                                        <h6>Manual Standard Wheelchair MW02</h6>
                                    </a>
                                    <span>3000AED</span>
                                </div>
                            </div>
                            <div class="top-roducts-this-week-wrapper-block d-flex">
                                <a href="http://"><img src="{{ asset('assets/web/images/top-product-week2.png') }}" alt="Alt Image"
                                        height="100%" width="50"></a>
                                <div class="top-roducts-this-week-wrapper-block-content d-flex flex-column">
                                    <a href="http://">
                                        <h6>Manual Standard Wheelchair MW02</h6>
                                    </a>
                                    <span>3000AED</span>
                                </div>
                            </div>
                            <div class="top-roducts-this-week-wrapper-block d-flex">
                                <a href="http://"><img src="{{ asset('assets/web/images/top-product-week3.png') }}" alt="Alt Image"
                                        height="100%" width="50"></a>
                                <div class="top-roducts-this-week-wrapper-block-content d-flex flex-column">
                                    <a href="http://">
                                        <h6>Manual Standard Wheelchair MW02</h6>
                                    </a>
                                    <span>3000AED</span>
                                </div>
                            </div>
                            <div class="top-roducts-this-week-wrapper-block d-flex">
                                <a href="http://"><img src="{{ asset('assets/web/images/top-product-week4.png') }}" alt="Alt Image"
                                        height="100%" width="50"></a>
                                <div class="top-roducts-this-week-wrapper-block-content d-flex flex-column">
                                    <a href="http://">
                                        <h6>Manual Standard Wheelchair MW02</h6>
                                    </a>
                                    <span>3000AED</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrapper-right-block">
                    <div>
                        <div
                            class="d-flex justify-content-between list-view-block align-items-md-center  flex-md-row flex-column gap-md-0 gap-3">
                            <div class="buttons d-flex">
                                <button id="grid-btn" class="active">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="25px" height="auto" x="0"
                                        y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512"
                                        xml:space="preserve" fill-rule="evenodd" class="">
                                        <g>
                                            <path
                                                d="M15 18a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1zm11 0a1 1 0 0 0-1-1h-7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1zm-13 1v5H8v-5zm11 0v5h-5v-5zm2-12a1 1 0 0 0-1-1h-7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1zM15 7a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1zm9 1v5h-5V8zM13 8v5H8V8z"
                                                fill="#888888" opacity="1" data-original="#000000" class="">
                                            </path>
                                        </g>
                                    </svg>
                                    <span>Grid View</span>
                                </button>
                                <button id="list-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" x="0"
                                        y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512"
                                        xml:space="preserve" class="me-1">
                                        <g>
                                            <path
                                                d="M0 113.293h113.293V0H0zm30.004-83.29h53.289v53.29h-53.29zM149.297 0v113.293H512V0zm332.7 83.293H179.3v-53.29h302.695zM0 260.3h113.293V147.009H0zm30.004-83.292h53.289v53.289h-53.29zM149.297 260.3H512V147.009H149.297zm30.004-83.292h302.695v53.289H179.301zM0 407.309h113.293V294.012H0zm30.004-83.293h53.289v53.289h-53.29zM149.297 407.309H512V294.012H149.297zm30.004-83.293h302.695v53.289H179.301zm0 0"
                                                fill="#888888" opacity="1" data-original="#000000" class="">
                                            </path>
                                        </g>
                                    </svg>
                                    <span>List View</span>
                                </button>
                            </div>
                            {{ $products->links('web.product.include.pagination_results') }}
                        </div>
                        <div class="mt-4 grid-view products">
                            <div class="container-fluid px-0 grid-view-block-wrapper">
                                <div class="row">
                                    @foreach ($products as $product)
                                    <div class="col-xl-3 col-6">
                                        <div class="product-card position-relative">
                                            <div
                                                class="wish-icon position-absolute d-flex align-items-center justify-content-center end-0">
                                                <img src="{{ asset('assets/web/images/heart-white.png') }}" alt="Wish Icon" srcset=""
                                                    width="auto" height="auto">
                                            </div>
                                            <a href="{{ route('web.products.show', $product->id) }}">
                                                <img src="{{ $product->thumbnail }}" alt="Product Image" srcset=""
                                                    width="100%" height="auto">
                                            </a>
                                            <div class="product-card-body">
                                                <h2 class="m-0 product-card-title">
                                                    <a href="{{ route('web.products.show', $product->id) }}" class="text-black">
                                                        {{ $product->name }}
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
                                                        <img src="{{ asset('assets/web/images/star-p.png') }}" alt="Star Icon"
                                                            srcset="" height="auto" width="auto">
                                                        <span>4.5(128)</span>
                                                    </div>
                                                </div>
                                                <div class="product-button text-center mt-4">
                                                    <a href="http://" class="button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="20"
                                                            height="20px" x="0" y="0" viewBox="0 0 450.391 450.391"
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
                                </div>
                            </div>
                            <div class="container-fluid px-0 list-view-block-wrapper">
                                <div class="row">
                                    @foreach ($products as $product)
                                    <div class="col-12">
                                        <div class="product-card position-relative d-flex">
                                            <div
                                                class="wish-icon position-absolute d-flex align-items-center justify-content-center end-0">
                                                <img src="{{ asset('assets/web/images/heart-white.png') }}" alt="Wish Icon" srcset=""
                                                    width="auto" height="auto">
                                            </div>
                                            <a href="{{ route('web.products.show', $product->id) }}" class="product-card-img position-relative">
                                                <img src="{{ $product->thumbnail }}" alt="Product Image" srcset=""
                                                    width="100%" height="100%">
                                                <span class="deail-box position-absolute top-0 start-0">15% OFF</span>
                                            </a>
                                            <div
                                                class="product-card-body position-relative w-100 d-flex flex-column justify-content-center">
                                                <p class="category-sub-category pb-lg-1">
                                                    {{ $product->category->name }} / {{ $product->subCategory->name }}
                                                </p>
                                                <h2 class="m-0 product-card-title pb-lg-4">
                                                    <a href="{{ route('web.products.show', $product->id) }}" class="text-black">
                                                        {{ $product->name }}
                                                    </a>
                                                </h2>
                                                <div
                                                    class="reviews-block mt-1 d-flex flex-column gap-2 justify-content-between">
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
                                                        <img src="assets/images/star-p.png" alt="Star Icon"
                                                            srcset="" height="auto" width="auto">
                                                        <span>4.5(128)</span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="product-button text-center position-absolute end-0 bottom-0 m-md-3 m-2">
                                                    <a href="http://" class="button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="20"
                                                            height="20px" x="0" y="0" viewBox="0 0 450.391 450.391"
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
                                </div>
                            </div>
                        </div>
                        {{ $products->links('web.product.include.pagination_links') }}
                        <div class="product-wrapper-right-block-description d-flex flex-column  gap-lg-5 gap-3">
                            <div class="d-flex flex-column gap-lg-4">
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
                            <div class="d-flex flex-column gap-lg-4">
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
                            <div class="d-flex flex-column gap-lg-4">
                                <h4 class="m-0 text-black">
                                    Different types of powered wheelchairs
                                </h4>
                                <p class="m-0 text-black">
                                    Several different wheelchairs are introduced to the clients. The one that suits his
                                    need
                                    is supplied. Following are the types mentioned
                                </p>
                            </div>
                            <div class="d-flex flex-column gap-lg-4">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

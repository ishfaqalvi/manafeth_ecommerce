@extends('web.layout.app')

@section('title')
    Manafeth | Customer Cart
@endsection

@section('content')
<section class="bg-gray">
    <div class="page-width shopping-cart-page pb-2">
        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-md-8">
                    <div class="d-flex justify-content-between align-items-center pb-40 pt-50">
                        <h2 class="cart-main-heading h2 mb-0">
                            Shopping Cart:
                        </h2>
                        @if (count($cartItems) > 0)
                            <a href="{{ route('web.products.sale') }}" class="text-black more-shopping">
                                More Shopping
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row gap-md-0 gap-3">
                @if (count($cartItems) > 0)
                    <div class="col-md-8">
                        <div class="list-view-block-wrapper">
                            @foreach ($cartItems as $item)
                                <div class="product-card shopping-product-cart position-relative d-flex flex-column flex-md-row">
                                    <div class="wish-icon z-1 position-absolute d-flex align-items-center justify-content-center end-0">
                                        <a href="javascript:void(0)" class="del-icon remove-from-cart" data-id="{{ $item->id }}" title="Remove from Cart">
                                            <img src="{{ asset('assets/web/images/delete.png') }}" alt="Wish Icon" srcset="" width="auto" height="auto">
                                        </a>
                                    </div>
                                    <a href="{{ route('web.products.show', $item->product->id) }}" class="product-card-img position-relative">
                                        <img src="{{ $item->product->thumbnail }}" alt="Product Image" srcset="" width="100%" height="100%">
                                        <span class="deail-box position-absolute top-0 start-0">15% OFF</span>
                                    </a>
                                    <div
                                        class="product-card-body position-relative w-100 d-flex flex-column justify-content-center">
                                        <p class="category-sub-category pb-lg-1">
                                            {{ $item->product->category->name.' / '.$item->product->subCategory->name }}
                                        </p>
                                        <h2 class="m-0 product-card-title pb-lg-4">
                                            <a href="{{ route('web.products.show', $item->product->id) }}" class="text-black">
                                                {{ $item->product->name }}
                                            </a>
                                        </h2>
                                        <div class="reviews-block mt-1 d-flex flex-column gap-2 justify-content-between">
                                            <div class="rate-block d-flex flex-wrap align-items-baseline gap-md-1">
                                                <span class="pb-lg-4">
                                                    {{ $item->product->price }}AED
                                                </span>
                                                @if(!empty($item->product->discount))
                                                <del>
                                                    {{ $item->product->discount }}AED
                                                </del>
                                                @endif
                                            </div>
                                            <div class="star-reviews d-flex align-items-center gap-1">
                                                <img src="{{ asset('assets/web/images/star-p') }}.png" alt="Star Icon" srcset="" height="auto" width="auto">
                                                <span>4.5(128)</span>
                                            </div>
                                        </div>
                                        <div class="product-button text-center position-absolute end-0 bottom-0 m-md-3 m-2">
                                            <div class="text-center">
                                                <div class="qty-container d-flex">
                                                    <button class="qty-btn-minus qty-button bg-transparent border-0" type="button" data-id="{{ $item->id }}" data-quantity="{{ $item->quantity }}">
                                                        <img src="{{ asset('assets/web/images/minus.png') }}" alt="Minus Icon" srcset="">
                                                    </button>
                                                    <input type="text" name="qty" value="{{ $item->quantity }}" class="input-qty border-0 text-center">
                                                    <button class="qty-btn-plus qty-button bg-transparent border-0" type="button" data-id="{{ $item->id }}" data-quantity="{{ $item->quantity }}">
                                                        <img src="{{ asset('assets/web/images/plus.png') }}" alt="Plus Icon" srcset="">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-4">
                        <form action="/submit" method="post" class="order-summary-form bg-white d-flex flex-column">
                            <h4 class="order-summary-h4 border-bottom nb-0 pb-3">
                                Order Summary
                            </h4>
                            <ul class="budget-order-summery mb-0 py-lg-4 py-3 border-bottom d-flex flex-column gap-lg-3 gap-2 list-unstyled">
                                <li class="d-flex justify-content-between">
                                    <span>Subtotal:</span>
                                    <span>{{ cartSummary() }} AED</span>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <span>Shipping:</span>
                                    <span>0.00 AED</span>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <span>Order Total:</span>
                                    <span>{{ cartSummary() }} AED</span>
                                </li>
                            </ul>
                            <h4 class="my-lg-4 my-3 order-summary-sm-h4">APPLY DISCOUNT CODE</h4>
                            <label for="mobile" class="form-label">Enter discount code</label>
                            <input type="tel" class="form-control border-all-form-outline" id="mobile" name="mobile" placeholder="Enter discount code" required>
                            <button type="submit" class="btn-primary mt-2">Apply Discount</button>
                            <div class="border-bottom my-lg-4 my-3"></div>
                            <button type="submit" class="btn-secondary">Proceed To Checkout</button>
                        </form>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="bg-white border-all-form-outline w-100 request-found-wrapper d-flex flex-column align-items-center justify-content-center gap-2">
                            <img src="{{ asset('assets/web/images/Magnifier-icon.png') }}" alt="Magnifier Icon" srcset="">
                            <h2 class="mb-0">No product found!</h2>
                            <p class="mb-3 text-center">You have not added any product in list yet!</p>
                            <a href="{{ route('web.products.sale') }}" class="button">Add Product</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

@extends('web.layout.app')

@section('title')
    Manafeth | Brands
@endsection

@section('content')
    <section class="bg-gray">
        <div class="page-width pt-40">
            <div class="container-fluid px-0">
                <div class="row">
                    <div class="col-md-8">
                        <div class="d-flex flex-column">
                            <h2 class="cart-main-heading h2 mb-0 mt-md-4 mt-3">
                                Brands:
                            </h2>
                            <ul class="list-unstyled d-flex gap-1 flex-wrap mt-md-0 mb-0">
                                <li>
                                    <a href="" class="checkout-breadcrumbs-item">Home
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="10px" height="10px" x="0"
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
                                    <a href="" class="checkout-breadcrumbs-item active">Global Brands</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <h2 class="cart-main-heading text-center h2 mb-0 mt-md-4 mt-3 global-brand-title mx-auto">
                    <span>Global brands </span> that we have proudly worked with
                </h2>
                <div class="global-brand-wrapper">
                    @foreach($brands as $brand)
                    <div class="global-brand-wrapper-img">
                        <a href="{{ $brand->website }}" target="_blank">
                            <img src="{{ $brand->logo }}" alt="List Grid Images" srcset="" height="auto"
                                width="100%">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

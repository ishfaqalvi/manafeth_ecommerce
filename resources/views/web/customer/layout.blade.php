@extends('web.layout.app')

@section('title')
    Manafeth | Customer
@endsection

@section('content')
<section class="bg-gray account-all-pages pt-pb-min-max left-right-equal-height">
    <div class="page-width">
        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-md-4 col-lg-3">
                    <h2 class="account-main-title text-md-start text-center">My Account</h2>
                    <ul class="list-unstyled d-flex gap-1 flex-wrap mt-1 mt-md-0 mb-0 justify-content-md-start justify-content-center">
                        <li>
                            <a href="" class="checkout-breadcrumbs-item">Account
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="10px" height="10px" x="0" y="0" viewBox="0 0 407.436 407.436" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                    <g>
                                        <path d="M112.814 0 91.566 21.178l181.946 182.54-181.946 182.54 21.248 21.178 203.055-203.718z" fill="#888888" opacity="1" data-original="#000000"></path>
                                    </g>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="" class="checkout-breadcrumbs-item active">Account Information</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8 col-lg-9">
                    <div class="account-member-block d-flex align-items-center flex-column position-relative mt-md-0 mt-3">
                        <div class="account-member-block-img">
                            <img src="{{ auth('customer')->user()->image }}" alt="Member Image Icon" srcset="" height="auto" width="100%">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4 min-height-590 gap-md-0 gap-5">
                <div class="col-md-4 col-lg-3 equal-col">
                    <div class="w-100 my-account-information-sidebar border-all-form-outline bg-white">
                        <ul class="list-unstyled gap-1 d-flex flex-column mb-0">
                            <li>
                                <a href="{{ route('profile.show') }}" class="account-information-sidebar-item d-flex justify-content-between align-items-center {{ request()->is('customer/profile*') ? 'active' : ''}}">
                                Account information
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" x="0" y="0" viewBox="0 0 407.436 407.436" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M112.814 0 91.566 21.178l181.946 182.54-181.946 182.54 21.248 21.178 203.055-203.718z" fill="#000000" opacity="1" data-original="#000000" class=""></path></g></svg>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('address.index') }}" class="account-information-sidebar-item d-flex justify-content-between align-items-center {{ request()->is('customer/address*') ? 'active' : ''}}">
                                    Address Book
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" x="0" y="0" viewBox="0 0 407.436 407.436" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M112.814 0 91.566 21.178l181.946 182.54-181.946 182.54 21.248 21.178 203.055-203.718z" fill="#000000" opacity="1" data-original="#000000" class=""></path></g></svg>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('favourite.index') }}" class="account-information-sidebar-item d-flex justify-content-between align-items-center {{ request()->is('customer/favourite*') ? 'active' : ''}}">
                                    My Wishlist
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" x="0" y="0" viewBox="0 0 407.436 407.436" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M112.814 0 91.566 21.178l181.946 182.54-181.946 182.54 21.248 21.178 203.055-203.718z" fill="#000000" opacity="1" data-original="#000000" class=""></path></g></svg>
                                </a>
                            </li>
                            <li>
                                <a href="" class="account-information-sidebar-item d-flex justify-content-between align-items-center">
                                    My Orders
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" x="0" y="0" viewBox="0 0 407.436 407.436" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M112.814 0 91.566 21.178l181.946 182.54-181.946 182.54 21.248 21.178 203.055-203.718z" fill="#000000" opacity="1" data-original="#000000" class=""></path></g></svg>
                                </a>
                            </li>
                            <li>
                                <a href="" class="account-information-sidebar-item d-flex justify-content-between align-items-center">
                                    Maintenance
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" x="0" y="0" viewBox="0 0 407.436 407.436" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M112.814 0 91.566 21.178l181.946 182.54-181.946 182.54 21.248 21.178 203.055-203.718z" fill="#000000" opacity="1" data-original="#000000" class=""></path></g></svg>
                                </a>
                            </li>
                            <li>
                                <a href="" class="account-information-sidebar-item d-flex justify-content-between align-items-center">
                                    Rental Request
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" x="0" y="0" viewBox="0 0 407.436 407.436" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M112.814 0 91.566 21.178l181.946 182.54-181.946 182.54 21.248 21.178 203.055-203.718z" fill="#000000" opacity="1" data-original="#000000" class=""></path></g></svg>
                                </a>
                            </li>
                            <li>
                                <a href="" class="account-information-sidebar-item d-flex justify-content-between align-items-center">
                                    My Product Reviews
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" x="0" y="0" viewBox="0 0 407.436 407.436" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M112.814 0 91.566 21.178l181.946 182.54-181.946 182.54 21.248 21.178 203.055-203.718z" fill="#000000" opacity="1" data-original="#000000" class=""></path></g></svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8 col-lg-9 equal-col">
                    @yield('customer_account')
                </div>
            </div>
        </div>
    </div>
 </section>
@endsection

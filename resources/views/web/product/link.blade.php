@extends('web.layout.app')

@section('title') Rent Product Now @endsection

@section('content')
<style>
    /* slider section */
    .linkProduct .slider {
        width: 80%;
        margin: auto;
    }
    .linkProduct .slider img {
        width: 100%;
        border-radius: 15px;
    }
    .linkProduct .slick-dots {
        bottom: 10px;
    }
    .linkProduct .slick-dots li button:before {
        font-size: 10px;
        color: #666;
    }
    .slick-dots li.slick-active button:before {
        color: rgb(243, 160, 16);
    }
    /* End slider section */

    /* nav item */
    .linkProduct .nav-tabs{
        border: none !important;
    }
    .linkProduct .nav-tabs .nav-link{
        border-radius: 5px !important;
        padding: 5px 10px !important;
    }
    .linkProduct .nav-tabs .active{
        background-color: orange !important;
        color: white !important;
        border: 1px orange !important;
    }
    .linkProduct .nav-link{
        margin-left: 10px;
        margin-bottom: 10px;
        color: black;
        border: 1px solid lightgray;
    }
    .linkProduct .nav-pills .nav-link.active {
        background-color: orange;
        color: white;
        border: none;
    }
    .linkProduct .nav-pills .nav-link.active:hover{
        color: white;
    }
    .linkProduct .nav-pills .nav-link{
        padding:5px 10px;
    }
    .nav-pills .nav-link:hover{
        color: black;
    }

    .getOnRent {
        border: 1px solid white;
        border-radius: 20px;
        background-color: rgb(243, 160, 16);
        color: white;
    }
    .price{
        font-size: small;
    }
    .input-group-text img {
        width: 20px;
        height: auto;
        margin-right: 5px;
    }
    .form-label{
        margin-bottom: 0px;
    }
    .proceed-section button{
        border-radius: 20px;
        color: white;
        background-color: rgb(243, 160, 16);
    }
    .proceed-section button:hover{
        background-color: rgb(243, 160, 16);
        color: white;
    }

    /* date picker */
    .linkProduct .datepicker {
        z-index: 1151 !important;
    }
</style>
<div class="container-fluid pt-3 linkProduct">
    <div class="container">
        <div class="row section-1 mt-3">
            <div class="col-md-5 slider-section">
                <div class="slider mt-4">
                    <div><img src="{{ $link->product->thumbnail }}" alt="Slide"></div>
                    @foreach ($link->product->images as $row)
                        <div><img src="{{ $row->image }}" alt="Slide"></div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-7 category-section">
                <div class="row">
                    <div class="col">
                        <small class="text-muted">{{ $link->product->category->name }} / {{ $link->product->subCategory->name }}</small>
                        <h1>{{ $link->product->name }}</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="tab-content">
                        @foreach($link->product->rents as $rent)
                        <div id="{{ 'tab'.$rent->id }}" class="container tab-pane {{ $rent->id == $link->product_rent_id ? 'active' : '' }}"><br>
                            <h3>AED {{ $rent->amount }} <small class="text-muted price">for {{ $rent->title }}</small></h3>
                        </div>
                        @endforeach
                    </div>
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach($link->product->rents as $rent)
                        <li class="nav-item">
                            <a class="nav-link {{ $rent->id == $link->product_rent_id ? 'active' : '' }}" data-bs-toggle="tab" href="#{{ 'tab'.$rent->id }}">{{ $rent->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <label for="fromDate" class="form-label">From:</label>
                        <input type="text" class="form-control" id="fromDate" placeholder="Select start date" value="{{ date('Y-d-m', $link->from)}}">
                    </div>
                    <div class="col-md-6">
                        <label for="toDate" class="form-label">To:</label>
                        <input type="text" class="form-control" id="toDate" placeholder="Select end date">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-4 my-2">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div>
                    <label for="phone" class="form-label">Phone</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <img src="assets/images/UAE.webp" alt="UAE Flag">
                            +971
                        </span>
                        <input type="tel" class="form-control" id="phone" placeholder="">
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" class="form-control">
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3">
                <div class="form-check px-0">
                    <input type="radio" class="form-control-range" name="type" id="Self pickup">
                    <label class="form-check-label" for="Self pickup">Self pickup</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check px-0">
                    <input type="radio" class="form-control-range" name="type" id="Home Delivery">
                    <label class="form-check-label" for="Home Delivery">Home Delivery</label>
                </div>
            </div>
        </div>
        {{-- <div class="row proceed-section  mt-4">
            <div class="col-md-4 mx-auto">
                <button type="button" class="btn" id="otpButton" data-bs-toggle="popover" title="<h5>Verify OTP</h5>" data-bs-html="true" data-bs-content=
                    "
        <div class='popover-body'>
            <img src='assets/images/otp.webp' width='100px' alt='OTP Image' class='mb-3'>
            <p>Please Enter OTP sent to your phone<br><strong>+971231232323123</strong></p>
            <div class='otp-input'>
                <input type='text' maxlength='1'>
                <input type='text' maxlength='1'>
                <input type='text' maxlength='1'>
                <input type='text' maxlength='1'>
                <input type='text' maxlength='1'>
                <input type='text' maxlength='1'>
            </div>
            <p class='small'>Didn’t receive OTP? <a href='#' class='text-primary'>Resend</a></p>
            <div class='popover-footer'>
                <button class='btn-submit-otp'>Submit OTP</button>
            </div>
        </div>
    " data-bs-placement="bottom">
                    Confirm & Proceed
                </button>
            </div>
        </div> --}}
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('.slider').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
        });
        $('#fromDate').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true
        }).on('changeDate', function (selected) {
            var startDate = new Date(selected.date.valueOf());
            $('#toDate').datepicker('setStartDate', startDate);
        });

        $('#toDate').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true
        }).on('changeDate', function (selected) {
            var endDate = new Date(selected.date.valueOf());
            $('#fromDate').datepicker('setEndDate', endDate);
        });
    });
</script>
@endsection

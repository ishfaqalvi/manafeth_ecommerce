@extends('web.layout.app')

@section('title')
    Rent Product Now
@endsection

@section('content')
<input type="hidden" name="link_token" value="{{ $link->token }}" id="link_token">
<input type="hidden" name="link" value="{{ $link->web_page_url }}" id="web_page_url">
    <div class="container-fluid pt-3 linkProduct">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="thumbnail"><img src="{{ $link->product->thumbnail }}" alt="Slide"></div>
                </div>
                <div class="col-md-7">
                    <h1 class="fw-bold">{{ $link->product->name }}</h1>
                    <h4>
                        <span class="price-unit">AED
                            @if($link->price_change_type)
                                @if ($link->price_change_type == 'increment')
                                    {{ $link->productRent->amount + $link->price_change_value }}
                                @else
                                    {{ $link->productRent->amount - $link->price_change_value }}
                                @endif
                            @else
                                {{ $link->productRent->amount }}
                            @endif
                        </span>
                        <small class="text-muted price">( {{ $link->productRent->title }} )</small>
                    </h4>
                    <h4>Quantity
                        {{ $link->quantity }}X
                    </h4>
                    <h3 class="mt-3">Rental Date:</h3>
                    <h5>
                        From: <small class="text-muted">{{ date('Y-m-d', $link->from) }}</small>
                        To: <small class="text-muted">{{ date('Y-m-d', $link->to) }}</small>
                    </h5>
                    <ul class="list-unstyled mt-2">
                        <li class="d-flex align-items-center mb-3">
                            <img src="{{ asset('assets/web/images/link/calendar2x.png') }}" alt="Image" class="me-2" width="30px">
                            <h5 class="fw-bold mb-0">Collection Date:</h5>&nbsp;
                            <p class="text-muted mb-0">{{ date('Y-m-d', $link->collection_date) }}</p>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="{{ asset('assets/web/images/link/delivery2x.png') }}" alt="Image" class="me-2" width="30px">
                            <h5 class="fw-bold mb-0">Collection Type:</h5>&nbsp;
                            <p class="text-muted mb-0">{{ $link->collection_type }}</p>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="{{ asset('assets/web/images/link/time2x.png') }}" alt="Image" class="me-2" width="30px">
                            <h5 class="fw-bold mb-0">Time Slot:</h5>&nbsp;
                            <p class="text-muted mb-0">{{ $link->timeSlot->start_time.'/'.$link->timeSlot->end_time }}</p>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="{{ asset('assets/web/images/link/location_duoline2x.png') }}" alt="Image" class="me-2" width="30px">
                            <h5 class="fw-bold mb-0">Address:</h5>&nbsp;
                            <p class="text-muted mb-0">{{ $link->address }}</p>
                        </li>
                    </ul>
                    <form id="send-otp-form" method="Post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <input id="name" type="text" name="name" class="form-control" placeholder="Enter Name">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <input id="mobile_number" type="tel" name="phone" class="form-control" placeholder="000 0000000" required>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-secondary">Get This On Rent Now</button>
                            </div>
                        </div>
                    </form>
                    <form id="verify-otp-form" method="Post" class="d-none">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                {{ Form::text('otp', null, ['class' => 'form-control', 'placeholder' => 'Enter OTP','required']) }}
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-secondary">Confirm & Proceed</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="recaptcha-container"></div>
@endsection

@section('script')
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
    <script>
        var input = document.querySelector("#mobile_number");
        var iti = window.intlTelInput(input, {
            initialCountry: "ae", // Default country set to UAE
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" // for formatting
        });
        $('.iti').css('display', 'block');
        var firebaseConfig = {
            apiKey: "AIzaSyB66H6E356R3eiuB7hF9DzPPEPo_X3Xhks",
            authDomain: "e-manafeth-9bd48.firebaseapp.com",
            projectId: "e-manafeth-9bd48",
            storageBucket: "e-manafeth-9bd48.appspot.com",
            messagingSenderId: "928927421004",
            appId: "1:928927421004:web:d8e3cc954768cb36e35ae9",
            measurementId: "G-2M9S1WTXDV"
        };
        firebase.initializeApp(firebaseConfig);
        window.onload = function () {
            render();
        };
        function render() {
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
                'size': 'invisible',
                'callback': (response) => {
                    // onSignInSubmit();
                }
            });
        }
        function sendOTP(phone)
        {
            firebase.auth().signInWithPhoneNumber(phone, window.recaptchaVerifier)
                .then(function (confirmationResult) {
                    window.confirmationResult = confirmationResult;
                    coderesult = confirmationResult;
                    $("#send-otp-form").addClass('d-none');
                    $("#verify-otp-form").removeClass('d-none');
                    toastr.success('Message sent successfully! Check your phone.');
                }).catch(function (error) {
                    toastr.error(error.message);
                    console.log(error.message);
                }).finally(() => {
                    $("#overlay").hide('slow');
                    $('body').removeClass('body-lock');
                });
        }
        function verify(code) {
            coderesult.confirm(code).then(function (result) {
                var user = result.user;
                sendFormData()
            }).catch(function (error) {
                $("#send-otp-form").removeClass('d-none');
                $("#verify-otp-form").addClass('d-none');
                toastr.error('Something went wrong please try again!.');
                console.log(error.message);
            }).finally(() => {
                $("#overlay").hide('slow');
                $('body').removeClass('body-lock');
            });
        }
        function sendFormData() {
            $.ajax({
                url: "{{ route('web.products.checkout') }}",
                type: 'POST',
                data: {
                    name:               $("#name").val(),
                    mobile_number:      $("#mobile_number").val(),
                    link_token :        $('#link_token').val(),
                    _token:             $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    toastr.success(response.message);
                    window.location.href = "{{ route('web.products.order') }}";
                },
                error: function (xhr, error) {
                    toastr.error('Something went wrong please try again!.');
                    window.location.href = $('#web_page_url').val();
                }
            });
        }
        $(document).ready(function() {
            $('.slider').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                autoplay: true,
                autoplaySpeed: 3000,
                arrows: true,
            });
            $.validator.addMethod("validPhoneNumber", function(value, element) {
                return iti.isValidNumber();
            }, "Please enter a valid phone number with country code");
            $('#send-otp-form').validate({
                errorElement: "div",
                errorPlacement: function(error, element) {
                    error.addClass("invalid-feedback");
                    error.insertAfter(element);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                },
                submitHandler: function (form, event) {
                    event.preventDefault();
                    formData = $(form).serializeArray();
                    var phone = iti.getNumber();
                    $("#mobile_number").val(phone);
                    $("#overlay").show('slow');
                    $('body').addClass('body-lock');
                    sendOTP(phone);
                },
                rules: {
                    mobile_number: {
                        required: true,
                        validPhoneNumber: true
                    }
                },
                messages: {
                    mobile_number:{
                        required: "Please enter your valid phone number"
                    }
                }
            });
            $('#verify-otp-form').validate({
                errorElement: "div",
                errorPlacement: function(error, element) {
                    error.addClass("invalid-feedback");
                    error.insertAfter(element);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                },
                submitHandler: function (form, event) {
                    event.preventDefault();
                    formData = $(form).serializeArray();
                    var otp = $("input[name='otp']").val();
                    $("#overlay").show('slow');
                    $('body').addClass('body-lock');
                    verify(otp);
                },
                rules: {
                    otp: {
                        required: true
                    }
                },
                messages: {
                    otp:{
                        required: "Please enter otp send on your phone number"
                    }
                }
            });
        });
    </script>
@endsection

@extends('web.layout.app')

@section('title')
    Rent Product Now
@endsection

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
        .linkProduct .nav-tabs {
            border: none !important;
        }

        .linkProduct .nav-tabs .nav-link {
            border-radius: 5px !important;
            padding: 5px 10px !important;
        }

        .linkProduct .nav-tabs .active {
            background-color: orange !important;
            color: white !important;
            border: 1px orange !important;
        }

        .linkProduct .nav-link {
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

        .linkProduct .nav-pills .nav-link.active:hover {
            color: white;
        }

        .linkProduct .nav-pills .nav-link {
            padding: 5px 10px;
        }

        .nav-pills .nav-link:hover {
            color: black;
        }

        .price {
            font-size: small;
        }

        .input-group-text img {
            width: 20px;
            height: auto;
            margin-right: 5px;
        }

        .form-label {
            margin-bottom: 0px;
        }

        .proceed-section button {
            border-radius: 20px;
            color: white;
            background-color: rgb(243, 160, 16);
        }

        .proceed-section button:hover {
            background-color: rgb(243, 160, 16);
            color: white;
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
                            <small class="text-muted">{{ $link->product->category->name }} /
                                {{ $link->product->subCategory->name }}</small>
                            <h1>{{ $link->product->name }}</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="tab-content">
                            @foreach ($link->product->rents as $rent)
                                <div id="{{ 'tab' . $rent->id }}"
                                    class="container tab-pane {{ $rent->id == $link->product_rent_id ? 'active' : '' }}">
                                    <br>
                                    <h3>AED {{ $rent->amount }} <small class="text-muted price">for
                                            {{ $rent->title }}</small></h3>
                                </div>
                            @endforeach
                        </div>
                        <ul class="nav nav-tabs" role="tablist">
                            @foreach ($link->product->rents as $rent)
                                <li class="nav-item">
                                    <a class="nav-link {{ $rent->id == $link->product_rent_id ? 'active' : '' }}"
                                        data-bs-toggle="tab" href="#{{ 'tab' . $rent->id }}">{{ $rent->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <label for="fromDate" class="form-label">From:</label>
                            <input type="date" class="form-control" id="fromDate" name="fromDate"
                                placeholder="Select start date" value="{{ date('Y-m-d', $link->from) }}">
                        </div>
                        <div class="col-md-4">
                            <label for="toDate" class="form-label">To:</label>
                            <input type="date" class="form-control" id="toDate" name="toDate"
                                placeholder="Select end date" value="{{ date('Y-m-d', $link->to) }}">
                        </div>
                        <div class="col-md-4">
                            <label for="quantity" class="form-label">Quantity:</label>
                            <input type="number" class="form-control" name="quantity" placeholder="Enter quanitity"
                                value="{{ $link->quantity }}" id="quantity">
                        </div>
                        <div class="col-md-12 proceed-section my-3">
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#confirm_proceed">Confirm
                                & Proceed</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirm_proceed">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Verify Your Identity</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary">Save changes</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
    <script>
        const config = {
            spinnerContent: `
            <div class="text-center text-success">
                <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                    <span class="visually-hidden"></span>
                </div>
            </div>
            `,
            sendOtpBtnContent: '<button type="submit" class="btn btn-lg btn-primary btn-block">Send OTP</button>',
            verifyOtpBtnContent: '<button type="submit" class="btn btn-lg btn-primary btn-block">Verify OTP</button>',
        };
        var firebaseConfig = {
            apiKey: "AIzaSyB66H6E356R3eiuB7hF9DzPPEPo_X3Xhks",
            authDomain: "e-manafeth-9bd48.firebaseapp.com",
            projectId: "e-manafeth-9bd48",
            storageBucket: "e-manafeth-9bd48.appspot.com",
            messagingSenderId: "928927421004",
            appId: "1:928927421004:web:d8e3cc954768cb36e35ae9",
            measurementId: "G-2M9S1WTXDV",

            // databaseURL: "https://sakoon-ed0db.firebaseio.com"
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
            $('#sendOtpBtnContainer').html(config.spinnerContent);
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
                    $('#sendOtpBtnContainer').html(config.sendOtpBtnContent);
                });
        }
        function verify(code) {
            $('#verifyOtpBtnContainer').html(config.spinnerContent);
            coderesult.confirm(code).then(function (result) {
                var user = result.user;
                sendFormData()
            }).catch(function (error) {
                $("#send-otp-form").removeClass('d-none');
                $("#verify-otp-form").addClass('d-none');
                toastr.error('Something went wrong please try again!.');
                console.log(error.message);
            }).finally(() => {
                $('#verifyOtpBtnContainer').html(config.verifyOtpBtnContent);
            });
        }
        function sendFormData() {
            $.ajax({
                url: "{{ route('web.login') }}",
                type: 'POST',
                data: {
                    name: $("#name").val(),
                    phone_number: $("#phone_number").val(),
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    toastr.success(response.message);
                    location.reload();
                },
                error: function (xhr, error) {
                    toastr.error('Something went wrong please try again!.');
                }
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            $.validator.addMethod("pakistaniPhoneNumber", function(value, element) {
                return this.optional(element) || /^((\+92)|(0092))-{0,1}3[0-9]{2}-{0,1}[0-9]{7}$|^03[0-9]{2}-[0-9]{7}$/.test(value);
            }, "Please enter a valid phone number");
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
                    var phone = $("input[name='phone_number']").val();
                    sendOTP(phone);
                },
                rules: {
                    name: {
                        required: true
                    },
                    phone_number: {
                        required: true,
                        pakistaniPhoneNumber: true
                    }
                },
                messages: {
                    name:{
                        required: "Please enter your name"
                    },
                    phone_number:{
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

@section('script')
    <script>
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
            $('#fromDate').on('change', function() {
                var fromDate = $(this).val();
                $('#toDate').attr('min', fromDate);

                if ($('#toDate').val() && $('#toDate').val() < fromDate) {
                    $('#toDate').val('');
                }
            });

            $('#toDate').on('change', function() {
                var toDate = $(this).val();
                $('#fromDate').attr('max', toDate);

                if ($('#fromDate').val() && $('#fromDate').val() > toDate) {
                    $('#fromDate').val('');
                }
            });
        });
    </script>
@endsection

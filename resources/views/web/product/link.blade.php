@extends('web.layout.app')

@section('title')
    Rent Product Now
@endsection

@section('content')
<input type="hidden" name="link_token" value="{{ $link->token }}" id="link_token">
<input type="hidden" name="link" value="{{ $link->web_page_url }}" id="web_page_url">
<div class="container-fluid pt-3 linkProduct">
    <div class="container">
        <div class="row my-3">
            <div class="col-md-6">
                <img src="{{ $link->product->thumbnail }}" alt="Slide" class="product-thumbnail">
            </div>
            <div class="col-md-6 ps-md-5">
                <h1 class="title">{{ $link->product->name }}</h1>
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
                    <small class="price">({{ $link->productRent->title }})</small>
                </h4>
                <h4 class="quantity">Quantity:
                    {{ $link->quantity }}X
                </h4>
                <h3 class="mt-3 rental-detail">Rental Date:</h3>
                <div class="d-flex date">
                    <span class="date-label">From:&nbsp;</span><span class="date-value">{{ date('d M Y', $link->from) }}</span>&nbsp;&nbsp;
                    <span class="date-label">To:&nbsp;</span><span class="date-value">{{ date('d M Y', $link->to) }}</span>
                </div>
                <ul class="list-unstyled mt-2">
                    <li class="d-flex align-items-center mb-3">
                        <img src="{{ asset('assets/web/images/link/calendar2x.png') }}" alt="Image" class="me-2">
                        <h5 class="mb-0">Delivery Date:</h5>&nbsp;
                        <p class="mb-0">{{ date('d M Y', $link->collection_date) }}</p>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <img src="{{ asset('assets/web/images/link/delivery2x.png') }}" alt="Image" class="me-2" width="25px">
                        <h5 class="mb-0">Collection Type:</h5>&nbsp;
                        <p class="mb-0">{{ $link->collection_type }}</p>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <img src="{{ asset('assets/web/images/link/time2x.png') }}" alt="Image" class="me-2" width="25px">
                        <h5 class="mb-0">Time Slot:</h5>&nbsp;
                        <p class="mb-0">{{ date('h A', strtotime($link->timeSlot->start_time)).'/'. date('h A', strtotime($link->timeSlot->end_time)) }}</p>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <img src="{{ asset('assets/web/images/link/location_duoline2x.png') }}" alt="Image" class="me-2" width="25px">
                        <h5 class="mb-0">Address:</h5>&nbsp;
                        <p class="mb-0">{{ $link->address }}</p>
                    </li>
                </ul>
                <form id="send-otp-form" method="POST" action="{{ route('web.products.sendOTP') }}" class="mt-4 d-none">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input id="name" type="text" name="name" class="form-control" placeholder="Enter your full name">
                        </div>
                        <div class="form-group col-md-6 mb-3" id="phoneDiv">
                            <label for="mobile_number" class="form-label">Phone Number</label>
                            <input id="mobile_number" type="tel" name="phone" class="form-control" placeholder="000 0000000" required>
                        </div>
                        <div class="form-group col-md-6 mb-3 d-none" id="emailDiv">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" type="email" name="email" class="form-control" placeholder="Enter your email">
                        </div>
                        <div class="form-group col-md-12 mb-3 ms-1 ps-5 form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="otpEmail" name="otpEmail">
                            <label class="form-check-label" for="otpEmail">Use Email for Verification</label>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <button type="submit" class="btn btn-secondary w-100 py-2">Request OTP for Verification</button>
                        </div>
                    </div>
                </form>
                <div class="otp-container" id="otp-container">
                    <div class="card p-4 shadow">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-3">OTP Verification</h5>
                            <p class="card-text">Enter the 6-digit code sent to your phone/email</p>
                            <form id="verify-otp-form" method="POST">
                                @csrf
                                <input type="hidden" name="phone" value="">
                                <div class="otp-input-wrapper">
                                    <input type="text" class="form-control otp-input" maxlength="1" id="otp-1" required>
                                    <input type="text" class="form-control otp-input" maxlength="1" id="otp-2" required>
                                    <input type="text" class="form-control otp-input" maxlength="1" id="otp-3" required>
                                    <input type="text" class="form-control otp-input" maxlength="1" id="otp-4" required>
                                    <input type="text" class="form-control otp-input" maxlength="1" id="otp-5" required>
                                    <input type="text" class="form-control otp-input" maxlength="1" id="otp-6" required>
                                </div>
                                <input type="hidden" id="otp" name="otp">
                                <button type="submit" class="hidden-submit-btn d-none">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        var input = document.querySelector("#mobile_number");
        var iti = window.intlTelInput(input, {
            initialCountry: "ae",      // Set default country to UAE (can be changed)
            nationalMode: false,       // Ensure country code is always shown
            autoHideDialCode: false,   // Don't hide the country code when focus is lost
            separateDialCode: true,
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
        });
        $('.iti').css('display', 'block');
        $('#otpEmail').on('change', function() {
            if ($(this).is(':checked')) {
                // Show email and hide phone number
                $('#emailDiv').removeClass('d-none');
                $('#phoneDiv').addClass('d-none');
                // Set phone field to not required and email field to required
                $('#mobile_number').prop('required', false);
                $('#email').prop('required', true);
            } else {
                // Show phone number and hide email
                $('#emailDiv').addClass('d-none');
                $('#phoneDiv').removeClass('d-none');
                // Set email field to not required and phone field to required
                $('#email').prop('required', false);
                $('#mobile_number').prop('required', true);
            }
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

                $("#overlay").show('slow');
                $('body').addClass('body-lock');

                var phone = iti.getNumber();
                $("#mobile_number").val(phone);
                var formData = $(form).serialize();
                $.ajax({
                    url: '{{ route('web.products.sendOTP') }}',
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        $("#overlay").hide('slow');
                        $('body').removeClass('body-lock');
                        toastr.success(response.message);
                        $('#send-otp-form').addClass('d-none');
                        $('#otp-container').removeClass('d-none');
                    },
                    error: function (xhr, status, error) {
                        $("#overlay").hide('slow');
                        $('body').removeClass('body-lock');

                        var errorMessage = xhr.responseJSON?.message || 'Error sending OTP. Please try again.';
                        toastr.error(errorMessage);
                    }
                });
            },
            rules: {
                mobile_number: {
                    required: function(element) {
                        return !$('#otpEmail').is(':checked');
                    },
                    validPhoneNumber: function(element) {
                        return !$('#otpEmail').is(':checked');
                    }
                },
                email: {
                    required: function(element) {
                        return $('#otpEmail').is(':checked');
                    },
                    email: function(element) {
                        return $('#otpEmail').is(':checked');
                    }
                }
            },
            messages: {
                mobile_number: {
                    required: "Please enter your valid phone number."
                },
                email: {
                    required: "Please enter your valid email address.",
                    email: "Please enter a valid email address."
                }
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        const inputs = $('.otp-input');

        // Function to move to next or previous input
        function moveToNext(currentInput, nextInput) {
            if (currentInput.val().length === 1) {
                nextInput.focus();
            }
        }

        function moveToPrev(currentInput, prevInput) {
            if (currentInput.val().length === 0 && prevInput.length) {
                prevInput.focus();
            }
        }

        // Handle input event
        inputs.on('input', function () {
            let currentInput = $(this);
            let nextInput = currentInput.next('.otp-input'); // Next input field

            moveToNext(currentInput, nextInput);

            let otpValue = '';
            inputs.each(function () {
                otpValue += $(this).val();
            });

            if (otpValue.length === 6) {
                $('#otp').val(otpValue);
                submitOtpForm();
            }
        });

        // Handle backspace event
        inputs.on('keydown', function (e) {
            let currentInput = $(this);
            let prevInput = currentInput.prev('.otp-input');

            if (e.key === 'Backspace') {
                moveToPrev(currentInput, prevInput);
            }
        });

        function submitOtpForm() {
            var formData = $('#otp-form').serializeArray();

            formData.push({ name: 'otp', value: $("#otp").val() });
            formData.push({ name: 'name', value: $("#name").val() });
            formData.push({ name: 'email', value: $("#email").val() });
            formData.push({ name: 'mobile_number', value: $("#mobile_number").val() });
            formData.push({ name: 'otpEmail', value: $('#otpEmail').is(':checked') });
            formData.push({ name: 'link_token', value: $('#link_token').val() });

            $("#overlay").show('slow');
            $('body').addClass('body-lock');

            $.ajax({
                url: '{{ route('web.products.checkout') }}',
                type: 'POST',
                data: formData,
                success: function (response) {
                    if (response.status) {
                        toastr.success(response.message);
                        window.location.href = "{{ route('web.products.order') }}";
                    } else {
                        toastr.error(response.message || 'Invalid OTP, please try again.');
                        inputs.val('');
                        inputs.first().focus();
                    }
                },
                error: function (xhr, error) {
                    toastr.error('Something went wrong, please try again.');
                    window.location.href = $('#web_page_url').val();
                },
                complete: function() {
                    $("#overlay").hide('slow');
                    $('body').removeClass('body-lock');
                }
            });
        }
    });
</script>
@endsection

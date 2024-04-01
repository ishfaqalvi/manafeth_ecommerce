@extends('web.layout.app')

@section('title')
    Manafeth | Forgot Password
@endsection

@section('content')
<section class="bg-gray account-all-pages d-flex flex-column align-items-center">
    <div class="sm-container mx-auto my-md-5 my-3 w-100 px-md-0 px-3">
        <h2 class="account-main-title text-center">Forgot Password</h2>
        <p class="text-center">Recover Your Account</p>
        <form action="{{ route('web.forgotPassword')}}" method="post" id="validateForgotPasswordForm" class="w-100 my-acount-detail-form d-flex flex-column border-all-form-outline bg-white">
            @csrf
            <div class="w-100 d-flex flex-column gap-2">
                <input type="email" class="form-control border-all-form-outline" name="email" placeholder="Email" required id="email">
            </div>
            <p class="text-center verify-otp">**You must need to provide working email to verify OTP</p>
            <button type="submit" class="button">Submit</button>
        </form>
        <form action="{{ route('web.verifyAccount')}}" method="post" id="validateOtpForm" class="w-100 my-acount-detail-form d-flex flex-column border-all-form-outline bg-white d-none">
            @csrf
            <input type="hidden" name="email" required id="otpEmail">
            <div class="w-100 d-flex flex-column gap-2">
                <input type="number" class="form-control border-all-form-outline" name="otp" placeholder="Enter OTP" required id="otp">
            </div>
            <p class="text-center verify-otp">**You must need to provide OTP sending on email</p>
            <button type="submit" class="button" name="update_profile">Submit</button>
        </form>
    </div>
</section>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            // CSRF token for AJAX requests
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Toggle overlay and body-lock class
            function toggleOverlay(show) {
                if (show) {
                    $("#overlay").show('slow');
                    $('body').addClass('body-lock');
                } else {
                    $("#overlay").hide('slow');
                    $('body').removeClass('body-lock');
                }
            }

            // Validate Form
            $("#validateForgotPasswordForm").validate({
                successClass: 'success',
                errorElement: 'span',
                errorClass: 'error',
                highlight: function(element) {
                    $(element).addClass('invalid').removeClass('success');
                },
                unhighlight: function(element) {
                    $(element).removeClass('invalid').addClass('success');
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
                rules: {
                    email: {
                        required: true,
                        email: true,
                        remote: {
                            url: "{{ route('web.verifyEmail') }}",
                            type: "POST",
                            data: {
                                _token: csrfToken,
                                email: function() {
                                    return $("#email").val();
                                }
                            }
                        }
                    }
                },
                messages: {
                    email: {
                        required: "Please enter a valid email address.",
                        remote: "Email is not exist in our record."
                    }
                },
                submitHandler: function(form) {
                    toggleOverlay(true);
                    $.ajax({
                        url: $(form).attr('action'),
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function(response) {
                            toggleOverlay(false);
                            if (response.success) {
                                $('#validateForgotPasswordForm').addClass('d-none');
                                $('#validateOtpForm').removeClass('d-none');
                                $('#otpEmail').val($('#email').val());
                                toastr.success('Reset password OTP sent. Check your email.');
                            }
                        },
                        error: function() {
                            toggleOverlay(false);
                            toastr.error('An error occurred. Please try again.');
                        }
                    });
                    return false;
                }
            });

            // Validate OTP Form
            $("#validateOtpForm").validate({
                successClass: 'success',
                errorElement: 'span',
                errorClass: 'error',
                highlight: function(element) {
                    $(element).addClass('invalid').removeClass('success');
                },
                unhighlight: function(element) {
                    $(element).removeClass('invalid').addClass('success');
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
                rules: {
                    otp: {
                        required: true,
                        remote: {
                            url: "{{ route('web.verifyOTP') }}",
                            type: "POST",
                            data: {
                                _token: csrfToken,
                                otp: function() {
                                    return $("#otp").val();
                                },
                                email: function() {
                                    return $("#otpEmail").val();
                                }
                            }
                        }
                    }
                },
                messages: {
                    otp: {
                        required: "Please enter the OTP sent to your email.",
                        remote: "Incorrect OTP, please try again."
                    }
                },
                submitHandler: function(form) {
                    event.preventDefault();
                    var otp = $(form).find("input[name='otp']").val();
                    var email = $(form).find("input[name='email']").val();
                    var targetUrl = '/reset-password?email=' + encodeURIComponent(email) + '&otp=' + encodeURIComponent(otp);
                    window.location.href = targetUrl;
                    return false;
                }
            });
        });
    </script>
@endsection

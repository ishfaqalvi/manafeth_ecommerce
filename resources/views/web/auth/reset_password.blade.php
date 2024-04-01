@extends('web.layout.app')

@section('title')
    Manafeth | Reset Password
@endsection

@section('content')
    <section class="bg-gray account-all-pages d-flex flex-column align-items-center">
        <div class="sm-container mx-auto my-md-5 my-3 w-100 px-md-0 px-3">
            <h2 class="account-main-title text-center">Welcome Back</h2>
            <p class="text-center">Reset Password to recover account</p>
            <form action="{{ route('web.resetPassword') }}" method="post" class="w-100 my-acount-detail-form d-flex flex-column border-all-form-outline bg-white" id="validateForm">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">
                <input type="hidden" name="otp" value="{{ $otp }}">
                <div class="w-100 d-flex flex-column gap-2">
                    <div class="position-relative">
                        <input type="password" class="form-control border-all-form-outline" id="password" name="password"
                            placeholder="Password" required>
                        <i class="fa fa-lock position-absolute top-0 end-0 m-3"></i>
                    </div>
                </div>
                <div class="w-100 d-flex flex-column gap-2">
                    <div class="position-relative">
                        <input type="password" class="form-control border-all-form-outline" id="confirm_password" name="confirm_password"
                            placeholder="Confirm Password" required>
                        <i class="fa fa-lock position-absolute top-0 end-0 m-3"></i>
                    </div>
                </div>
                <button type="submit" class="button">Submit</button>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
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
            // Validate Login Form
            $("#validateForm").validate({
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
                    password: {
                        required: true,
                        minlength: 8,
                        maxlength: 15
                    },
                    confirm_password: {
                        required: true,
                        equalTo: "#password"
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
                                toastr.success('Password reset successfully.');
                                window.location.href = '/login';
                            }else{
                                toastr.error('The provided email or otp is correct.');
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
        });
    </script>
@endsection

@extends('web.layout.app')

@section('title')
    Manafeth | Login
@endsection

@section('content')
    <section class="bg-gray account-all-pages d-flex flex-column align-items-center">
        <div class="sm-container mx-auto my-md-5 my-3 w-100 px-md-0 px-3">
            <h2 class="account-main-title text-center">Welcome</h2>
            <p class="text-center">Login To Continue</p>
            <form action="{{ route('web.login') }}" method="post" class="w-100 my-acount-detail-form d-flex flex-column border-all-form-outline bg-white" id="validateForm">
                @csrf
                <div class="w-100 d-flex flex-column gap-2">
                    <div class="position-relative">
                        <input type="email" class="form-control border-all-form-outline" id="email" name="email"
                            placeholder="Email" required>
                        <i class="fa fa-at position-absolute top-0 end-0 m-3"></i>
                    </div>
                </div>
                <div class="w-100 d-flex flex-column gap-2">
                    <div class="position-relative">
                        <input type="password" class="form-control border-all-form-outline" id="password" name="password"
                            placeholder="Password" required>
                        <i class="fa fa-lock position-absolute top-0 end-0 m-3"></i>
                    </div>
                </div>
                <a href="{{ route('web.forgotPassword') }}" class="text-end forgot-password">Forgot Password?</a>
                <button type="submit" class="button" name="sign-in">Sign In</button>
                <a href="http://"
                    class="text-center or d-flex align-items-center justify-content-center gap-2 mx-auto">OR</a>
                <a href="{{ route('web.showRegisterForm') }}" class="button btn-tertiary">Create new Account</a>
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
                submitHandler: function(form) {
                    toggleOverlay(true);
                    $.ajax({
                        url: $(form).attr('action'),
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function(response) {
                            toggleOverlay(false);
                            if (response.success) {
                                window.location.href = '/customer/profile/view';
                            }else{
                                toastr.error('The provided credentials are incorrect.');
                            }
                        },
                        error: function() {
                            toggleOverlay(false);
                            toastr.error('An error occurred during login. Please try again.');
                        }
                    });
                    return false;
                }
            });
        });
    </script>
@endsection

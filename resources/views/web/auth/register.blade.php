@extends('web.layout.app')

@section('title')
    Manafeth | Register
@endsection

@section('content')
<section class="bg-gray account-all-pages d-flex flex-column align-items-center">
    <div class="sm-container mx-auto my-md-5 my-3 w-100 px-md-0 px-3">
        <h2 class="account-main-title text-center">Get Started</h2>
        <p class="text-center">Create Your Account</p>
        <form action="{{ route('web.registger')}}" method="post" id="validateRegister" 
            class="w-100 my-acount-detail-form d-flex flex-column border-all-form-outline bg-white">
            <div class="w-100 d-flex flex-column gap-2">
                <input type="text" class="form-control border-all-form-outline" name="name" placeholder="Name" required>
            </div>
            <div class="w-100 d-flex flex-column gap-2">
                <input type="email" class="form-control border-all-form-outline" name="email" placeholder="Email" required id="email">
            </div>
            <div class="w-100 d-flex flex-column gap-2">
                <input type="tel" class="form-control border-all-form-outline" name="mobile_number" placeholder="Enter Mobile Number" required>
            </div>
            <div class="w-100 d-flex flex-column gap-2">
                <input type="password" class="form-control border-all-form-outline" name="password" placeholder="Password" required id="password">
            </div>
            <div class="w-100 d-flex flex-column gap-2">
                <input type="password" class="form-control border-all-form-outline" name="confirm_password" placeholder="Confirm Password" required>
            </div>
            <p class="text-center verify-otp">**You must need to provide working email to verify OTP</p>
            <button type="submit" class="button" name="update_profile">Submit</button>
            <a href="{{ route('web.showLoginForm') }}" class="button btn-tertiary" >Already have an account ?</a>
        </form>
        <form action="{{ route('web.registger')}}" method="post" id="validateOtp" 
            class="w-100 my-acount-detail-form d-flex flex-column border-all-form-outline bg-white">
            <div class="w-100 d-flex flex-column gap-2">
                <input type="email" class="form-control border-all-form-outline" name="email" placeholder="Email" required id="email">
            </div>
            <div class="w-100 d-flex flex-column gap-2">
                <input type="tel" class="form-control border-all-form-outline" name="mobile_number" placeholder="Enter Mobile Number" required>
            </div>
            <p class="text-center verify-otp">**You must need to provide working email to verify OTP</p>
            <button type="submit" class="button" name="update_profile">Submit</button>
            <a href="{{ route('web.showLoginForm') }}" class="button btn-tertiary" >Already have an account ?</a>
        </form>
    </div>
</section>
@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function() {
    $("#validate").validate({
        errorClass: 'invalid',
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
                minlength:8,
                maxlength:15
            },    
            confirm_password:{
                required: true,
                equalTo: "#password"
            },
            email:{
                "remote":
                {
                    url: "{{ route('web.checkEmail') }}",
                    type: "POST",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        email: function() {
                            return $("#email").val();
                        }
                    },
                }
            }
        },
        messages:{
            email:{
                required: "Please enter a valid email address.",
                remote: jQuery.validator.format("{0} is already exist.")
            }
        },
        submitHandler: function(form) {
            $("#overlay").show('slow');
            $.ajax({
                url: $(form).attr('action'),
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    if (response.success) {
                        $('#validateRegister').hide();
                        $('#validateRegister').show();
                        $("#overlay").hide('slow');
                        toastr.success('Registration successful. chek your email...');
                    }
                },
                error: function(xhr, status, error) {
                    $("#overlay").hide('slow');
                    toastr.error('An error occurred. Please try again.');
                }
            });
            return false;
        }
    });
});
</script>
@endsection
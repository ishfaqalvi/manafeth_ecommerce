@extends('web.layout.app')

@section('title')
    Manafeth | Register
@endsection

@section('content')
<section class="bg-gray account-all-pages d-flex flex-column align-items-center">
    <div class="sm-container mx-auto my-md-5 my-3 w-100 px-md-0 px-3">
        <h2 class="account-main-title text-center">Get Started</h2>
        <p class="text-center">Create Your Account</p>
        <form action="#" method="post"
            class="w-100 my-acount-detail-form d-flex flex-column border-all-form-outline bg-white">
            <div class="w-100 d-flex flex-column gap-2">
                <input type="text" class="form-control border-all-form-outline" id="first_name" name="first_name"
                    placeholder="First Name" required>
            </div>
            <div class="w-100 d-flex flex-column gap-2">
                <input type="email" class="form-control border-all-form-outline" id="last_name" name="last_name"
                    placeholder="Email" required>
            </div>
            <div class="w-100 d-flex flex-column gap-2">
                <input type="password" class="form-control border-all-form-outline" id="phone" name="phone"
                    placeholder="Password" required>
            </div>
            <div class="w-100 d-flex flex-column gap-2">
                <input type="tel" class="form-control border-all-form-outline" id="phone" name="phone" placeholder="Enter Mobile Number" required="">
            </div>
            <p class="text-center verify-otp">**You must need to provide working mobile number to verify OTP</p>
            <button type="submit" class="button" name="update_profile">Submit</button>
            <a href="{{ route('web.showLoginForm') }}" class="button btn-tertiary" >Already have an account ?</a>
        </form>
    </div>
</section>
@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function() {
    var _token = $("input[name='_token']").val();
    $("#validate").validate({
        errorClass: 'invalid',
        successClass: 'success',
        validClass: 'success',
        errorElement: 'span',
        errorClass: 'error',
        highlight: function(element) {
            $(element).removeClass('success');
            $(element).addClass('invalid');
        },
        unhighlight: function(element) {
            $(element).removeClass('invalid');
            $(element).addClass('success');
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
                        _token:_token,
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
        }
    });
});
</script>
@endsection
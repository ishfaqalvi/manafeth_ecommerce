@extends('web.customer.layout')

@section('customer_account')
<form action="{{ route('profile.update') }}" method="post" class="w-100 my-acount-detail-form d-flex flex-column border-all-form-outline bg-white" id="validateForm" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="form-group col-md-6 mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control border-all-form-outline" id="name" name="name" value="{{ $customer->name }}" required>
        </div>
        <div class="form-group col-md-6 mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control border-all-form-outline" id="email" name="email" value="{{ $customer->email }}" required>
        </div>
        <div class="form-group col-md-6 mb-3">
            <label for="mobile_number">Mobile #</label>
            <input type="text" class="form-control border-all-form-outline" id="mobile_number" name="mobile_number" value="{{ $customer->mobile_number }}" required>
        </div>
        <div class="form-group col-md-6 mb-3">
            <label for="image">Profile Picture</label>
            <input type="file" class="form-control border-all-form-outline" id="image" name="image">
        </div>
        <div class="form-group col-md-12 mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control border-all-form-outline" id="address" name="address" value="{{ $customer->address }}" required>
        </div>
    </div>
    <hr>
    <h3>Change Password</h3>
    <div class="row">
        <div class="form-group col-md-6 mb-3">
            <label for="old_password">Old Password</label>
            <input type="password" class="form-control border-all-form-outline" id="old_password" name="old_password">
        </div>
        <div class="form-group col-md-6 mb-3">
            <label for="new_password">New Password</label>
            <input type="password" class="form-control border-all-form-outline" id="new_password" name="new_password">
        </div>
        <div class="form-group col-md-6 mb-3">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" class="form-control border-all-form-outline" id="confirm_password" name="confirm_password">
        </div>
    </div>
    <div class="form-group d-flex flex-column flex-md-row justify-content-between align-items-center gap-md-0 gap-3 mt-md-0 mt-2">
        <button type="submit" class="button" name="update_profile">Update Profile</button>
    </div>
</form>
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
            var _token = $("input[name='_token']").val();
            var id = "{{ $customer->id }}";
            var password = $('#new_password');
            var oldpassword = $('#old_password');
            $.validator.addMethod('filesize', function (value, element, param) {
                return this.optional(element) || (element.files[0].size <= param)
            }, 'File size must be less than 1 MB');
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
                    image: {
                        filesize: 1000000 // 1MB
                    },
                    new_password: {
                        required: function() {
                            return $("input[name='old_password']").val().length != 0;
                        },
                        minlength: 8,
                        maxlength: 15
                    },
                    confirm_password: {
                        required: function() {
                            return $("input[name='new_password']").val().length != 0;
                        },
                        equalTo: "#new_password"
                    },
                    email: {
                        remote: {
                            url: "{{ route('web.checkEmail') }}",
                            type: "POST",
                            data: {
                                _token: _token,
                                id: id,
                                email: function() {
                                    return $("input[name='email']").val();
                                }
                            },
                        }
                    },
                    old_password: {
                        remote: {
                            url: "{{ route('profile.checkPassword') }}",
                            type: "POST",
                            data: {
                                _token: _token,
                                id: id,
                                old_password: function() {
                                    return $("input[name='old_password']").val();
                                }
                            },
                        }
                    }
                },
                messages: {
                    email: {
                        required: "Please enter a valid email address.",
                        remote: "Email is already in use."
                    },
                    old_password: {
                        remote: "Old password is incorrect."
                    }
                },
                submitHandler: function(form) {
                    toggleOverlay(true);
                    var formData = new FormData($(form)[0]);
                    $.ajax({
                        url: $(form).attr('action'),
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            toggleOverlay(false);
                            if (response.success) {
                                toastr.success('Profile updated successfully.');
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

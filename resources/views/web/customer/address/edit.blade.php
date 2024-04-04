@extends('web.customer.layout')

@section('customer_account')
    <form method="POST" action="{{ route('address.update') }}" class="w-100 my-acount-detail-form d-flex flex-column border-all-form-outline bg-white" role="form" enctype="multipart/form-data" id="validate">
        @csrf
        <input type="hidden" name="id" value="{{ $address->id }}">
        @include('web.customer.address.form')
    </form>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#validate").validate({
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
                    $("#overlay").show('slow');
                    $.ajax({
                        url: $(form).attr('action'),
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function(response) {
                            $("#overlay").hide('slow');
                            if (response.success) {
                                toastr.success('Address updated successfully.');
                                window.location.href = '/customer/address/list';
                            }
                        },
                        error: function() {
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

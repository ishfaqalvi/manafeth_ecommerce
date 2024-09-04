@extends('web.layout.app')

@section('title')
    Rent Product Now
@endsection

@section('content')
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
                <input type="hidden" name="product_id" value="{{ $link->product_id }}" id="product_id">
                <input type="hidden" name="link" value="{{ $link->web_page_url }}" id="web_page_url">
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
                                    <a
                                        class="nav-link {{ $rent->id == $link->product_rent_id ? 'active' : '' }}"
                                        data-bs-toggle="tab"
                                        href="#{{ 'tab' . $rent->id }}"
                                        data-rent-id="{{ $rent->id }}"
                                        >
                                        {{ $rent->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <input type="hidden" id="product_rent_id" name="product_rent_id" value="{{ $link->product_rent_id }}">
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <label for="fromDate" class="form-label">From:</label>
                            <input type="date" class="form-control" id="fromDate" name="fromDate" placeholder="Select start date" value="{{ date('Y-m-d', $link->from) }}">
                        </div>
                        <div class="col-md-4">
                            <label for="toDate" class="form-label">To:</label>
                            <input type="date" class="form-control" id="toDate" name="toDate" placeholder="Select end date" value="{{ date('Y-m-d', $link->to) }}">
                        </div>
                        <div class="col-md-4">
                            <label for="quantity" class="form-label">Quantity:</label>
                            <input type="number" class="form-control" name="quantity" placeholder="Enter quanitity" value="{{ $link->quantity }}" id="quantity">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="fw-bold border-bottom pb-2 mb-3">Delivery Details</div>
                <div class="form-group col-lg-4 mb-3">
                    {{ Form::label('collection_date') }}
                    {{ Form::date('collection_date', $link->collection_date ? date('Y-m-d', $link->collection_date) : '', ['class' => 'form-control collection_date', 'placeholder' => 'Collection Date','required','id' => 'collection_date']) }}
                </div>
                <div class="form-group col-lg-4 mb-3">
                    {{ Form::label('collection_type') }}
                    {{ Form::select('collection_type', ['Self Pickup' => 'Self Pickup','Home Delivery' => 'Home Delivery'], $link->collection_type, ['class' => 'form-control', 'placeholder' => '--Select--','required', 'id' => 'collection_type']) }}
                </div>
                <div class="form-group col-lg-4 mb-3">
                    {{ Form::label('time_slot_id', 'Time Slot') }}
                    {{ Form::select('time_slot_id', [], $link->time_slot_id, ['class' => 'form-control', 'placeholder' => '--Select--','required', 'id' => 'time_slot_select', 'default' => $link->time_slot_id]) }}
                </div>
                <div class="form-group col-lg-12 mb-3">
                    {{ Form::label('address') }}
                    {{ Form::text('address', $link->address, ['class' => 'form-control', 'placeholder' => 'Address','required', 'id' => 'address']) }}
                </div>
                {{ Form::hidden('lat', $link->lat, ['id' => 'lat']) }}
                {{ Form::hidden('long', $link->long, ['id' => 'long']) }}
                <div class="col-md-12 proceed-section my-3">
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#confirm_proceed">Get This On Rent Now</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirm_proceed">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form id="send-otp-form" method="Post">
                            @csrf
                            {{-- <div class="form-group mb-3">
                                {{ Form::label('name') }}
                                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name','required', 'id' => 'name']) }}
                            </div>
                            <div class="form-group mb-3">
                                {{ Form::label('mobile_number','Mobile Number') }}
                                {{ Form::number('mobile_number', null, ['class' => 'form-control', 'placeholder' => 'Mobile Number','required', 'id' => 'mobile_number']) }}
                            </div> --}}
                            <div class="form-group col-lg-12 mb-3">
                                <label for="name">Name</label>
                                <input id="name" type="text" name="name" class="form-control" placeholder="Name">
                            </div>

                            <div class="form-group col-lg-12 mb-3">
                                <label for="mobile_number">Mobile Number</label>
                                <input id="mobile_number" type="tel" name="phone" class="form-control" placeholder="Mobile Number">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-secondary">Send OTP</button>
                            </div>
                        </form>
                        <form id="verify-otp-form" method="Post" class="d-none">
                            @csrf
                            <div class="form-group mb-3">
                                {{ Form::label('otp','OTP') }}
                                {{ Form::text('otp', null, ['class' => 'form-control', 'placeholder' => 'OTP','required']) }}
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-secondary">Confirm & Proceed</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="recaptcha-container"></div>
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
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
                var rentId = $(e.target).data('rent-id');
                $('#product_rent_id').val(rentId);
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
            var selected_time_slot_id = $('#time_slot_select').attr('default');
            let type = $('#collection_type').val();
            time_slot_list(type, selected_time_slot_id);
            $('#collection_type').change(function () {
                let type = $(this).val();
                time_slot_list(type, 0);
            });
            function time_slot_list(type, selected_time_slot_id){
                var $timeSlotSelect = $('#time_slot_select');
                var date = $('#collection_date').val();
                $timeSlotSelect.empty();
                $timeSlotSelect.append('<option value="" disabled selected>--Select--</option>');
                $.get("/products/time-slots", {type: type, data:date}).done(function (result) {
                    let data = JSON.parse(result);
                    $.each(data, function (i, val) {
                        var isSelected = val.id == selected_time_slot_id ? true : false;

                        $('select[name=time_slot_id]').append(
                            $('<option></option>')
                                .val(val.id)
                                .html(val.start_time + ' / ' + val.end_time)
                                .attr('selected', isSelected)
                        );
                    });
                });
            }
            var input = document.querySelector("#mobile_number");
            var iti = window.intlTelInput(input, {
                initialCountry: "ae", // Default country set to UAE
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" // for formatting
            });
        });
    </script>
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
    <script>
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
                    name: $("#name").val(),
                    mobile_number: $("#mobile_number").val(),
                    product_id : $('#product_id').val(),
                    product_rent_id : $('#product_rent_id').val(),
                    quantity : $('#quantity').val(),
                    from : $('#fromDate').val(),
                    to : $('#toDate').val(),
                    _token: $('meta[name="csrf-token"]').attr('content')
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
                    name:{
                        required: "Please enter your name"
                    },
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
    <script src="https://maps.googleapis.com/maps/api/js?key={{ settings('google_map_api_key') }}&libraries=places"></script>
    <script>
        function initAutocomplete() {
            var addressInput = document.getElementById('address');

            // Initialize Google Places Autocomplete
            var autocomplete = new google.maps.places.Autocomplete(addressInput);

            // Set up the place_changed event on the Autocomplete instance:
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();

                // Extract the place's latitude and longitude:
                var latitude = place.geometry.location.lat();
                var longitude = place.geometry.location.lng();

                // Populate the latitude and longitude fields:
                document.getElementById('lat').value = latitude;
                document.getElementById('long').value = longitude;
            });
        }
        // Call this function when the page is loaded
        google.maps.event.addDomListener(window, 'load', initAutocomplete);
    </script>
@endsection

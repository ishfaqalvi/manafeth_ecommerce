@extends('admin.layout.app')

@section('title')
{{ __('Create') }} Rent Link
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Rent Link Managment</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('links.index') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
                <span class="btn-labeled-icon bg-primary text-white rounded-pill">
                    <i class="ph-arrow-circle-left"></i>
                </span>
                Back
            </a>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">{{ __('Create') }} Rent Link</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('links.store') }}" class="validate" role="form" enctype="multipart/form-data">
                @csrf
                @include('admin.rent.link.form')
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function(){
        $('.select').select2();
        $('.validate').validate({
            errorClass: 'validation-invalid-label',
            successClass: 'validation-valid-label',
            validClass: 'validation-valid-label',
            highlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
                $(element).addClass('is-invalid');
                $(element).removeClass('is-valid');
            },
            unhighlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
                $(element).removeClass('is-invalid');
                $(element).addClass('is-valid');
            },
            errorPlacement: function(error, element) {
                if (element.hasClass('select2-hidden-accessible')) {
                    error.appendTo(element.parent());
                }else if (element.parents().hasClass('form-control-feedback') || element.parents().hasClass('form-check') || element.parents().hasClass('input-group')) {
                    error.appendTo(element.parent().parent());
                }else {
                    error.insertAfter(element);
                }
            }
        });
        ['.from_date','.to_date', '.collection_date'].forEach(selector => {
            const element = document.querySelector(selector);
            if (element) {
                new Datepicker(element, {
                    container: '.content-inner',
                    buttonClass: 'btn',
                    prevArrow: document.dir == 'rtl' ? '&rarr;' : '&larr;',
                    nextArrow: document.dir == 'rtl' ? '&larr;' : '&rarr;',
                    autohide: true
                });
            }
        });
        $('#product-select').on('change', function() {
            var productId = $(this).val();
            var $rentSelect = $('#rent-select');

            $rentSelect.empty();
            $rentSelect.append('<option value="" disabled selected>--Select--</option>');

            $.get("{{ route('links.getRents') }}", {product_id: productId}).done(function (result) {
                let data = JSON.parse(result);
                $.each(data, function(index, rent) {
                    $rentSelect.append('<option value="' + rent.id + '">' + rent.title + ' (' + rent.amount + ')</option>');
                })
            });
        });
        $('select[name=collection_type]').change(function () {
            let type = $(this).val();
            var date = $('#collection_date').val();
            $('select[name=time_slot_id]').html('<option value="">--Select--</option>');
            $('select[name=time_slot_id]').attr('disabled',false);
            $.get('/admin/rent/links/time-slots', {type: type, data:date}).done(function (result) {
                let data = JSON.parse(result);
                $.each(data, function (i, val) {
                    $('select[name=time_slot_id]').append($('<option></option>').val(val.id).html(val.start_time +' / ' + val.end_time));
                })
            });
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

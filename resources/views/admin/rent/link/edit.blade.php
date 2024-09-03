@extends('admin.layout.app')

@section('title')
    {{ __('Update') }} Rent Link
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
            <h5 class="mb-0">{{ __('Edit ') }} Rent Link </h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('links.update', $rentLink->id) }}" class="validate"   role="form" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
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
        var selected_rent_id = $('#rent-select').attr('default');
        let id = $('#product-select').val();
        rent_list(id, selected_rent_id);
        $('#product-select').change(function () {
            let id = $(this).val();
            rent_list(id, 0);
        });
        function rent_list(productId, selected_rent_id){
            var $rentSelect = $('#rent-select');
            $rentSelect.empty();
            $rentSelect.append('<option value="" disabled selected>--Select--</option>');

            $.get("{{ route('links.getRents') }}", {product_id: productId}).done(function (result) {
                let data = JSON.parse(result);
                $.each(data, function (i, val) {
                    if(val.id == selected_rent_id){
                        $rentSelect.append('<option selected value="' + val.id + '">' + val.title + ' (' + val.amount + ')</option>');
                    }else{
                        $rentSelect.append('<option value="' + val.id + '">' + val.title + ' (' + val.amount + ')</option>');
                    }
                });
            });
        }
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
            $.get("/admin/rent/links/time-slots", {type: type, data:date}).done(function (result) {
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

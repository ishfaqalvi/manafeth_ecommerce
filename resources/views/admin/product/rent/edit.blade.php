@extends('admin.layout.app')

@section('title')
    {{ __('Update') }} Product
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Product Managment</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('products.rent.index') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
            <h5 class="mb-0">{{ __('Edit ') }} Product </h5>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight mb-3">
                <li class="nav-item">
                    <a href="#detail" class="nav-link active" data-bs-toggle="tab">
                        <i class="ph-note-pencil me-2"></i>
                        Detail
                    </a>
                </li>
                @can('productFeatures-list')
                <li class="nav-item">
                    <a href="#features" class="nav-link" data-bs-toggle="tab">
                        <i class="ph-currency-circle-dollar me-2"></i>
                        {{ __('Features') }}
                    </a>
                </li>
                @endcan
                @can('productSpecification-list')
                <li class="nav-item">
                    <a href="#specification" class="nav-link" data-bs-toggle="tab">
                        <i class="ph-file-image me-2"></i>
                        {{ __('Specification') }}
                    </a>
                </li>
                @endcan
                @can('productResource-list')
                <li class="nav-item">
                    <a href="#resource" class="nav-link" data-bs-toggle="tab">
                        <i class="ph-handshake me-2"></i>
                        {{ __('Resource') }}
                    </a>
                </li>
                @endcan
                @can('productImage-list')
                <li class="nav-item">
                    <a href="#images" class="nav-link" data-bs-toggle="tab">
                        <i class="ph-file-image me-2"></i>
                        {{ __('Images') }}
                    </a>
                </li>
                @endcan
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="detail">
                    @include('admin.product.rent.form')
                </div>
                <div class="tab-pane fade" id="features">
                    @include('admin.product.include.feature.index')
                </div>
                <div class="tab-pane fade" id="specification">
                    @include('admin.product.include.specification.index')
                </div>
                <div class="tab-pane fade" id="resource">
                    @include('admin.product.include.resource.index')
                </div>
                <div class="tab-pane fade" id="images">
                    @include('admin.product.include.image.index')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function(){
        $(".select").select2();
        $('.dropify').dropify();
        const swalInit = swal.mixin({
            buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-light',
                denyButton: 'btn btn-light',
                input: 'form-control'
            }
        });
        $(".sa-confirm").click(function (event) {
            event.preventDefault();
            swalInit.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                }
            }).then((result) => {
                if (result.value === true)  $(this).closest("form").submit();
            });
        });
        var sub_category_id = $('select[name=sub_category_id]').attr('default');
        let id = $('select[name=category_id]').val();
        sub_category_list(id, sub_category_id);
        $('select[name=category_id]').change(function () {
            let id = $(this).val();
            sub_category_list(id, 0);
        });
        function sub_category_list(id,sub_category_id){
            $('select[name=sub_category_id]').html('<option>--Select--</option>');
            $('select[name=sub_category_id]').attr('disabled',false);
            $.get('/admin/categories/sub-categories', {id: id}).done(function (result) {
                let data = JSON.parse(result);
                $.each(data, function (i, val) {
                    if(val.id == sub_category_id){
                        $('select[name=sub_category_id]').append($('<option>', 
                            {selected : 'selected', value : val.id, text : val.name}
                        ));
                    }else{
                        $('select[name=sub_category_id]').append($('<option>', 
                            {value : val.id,  text : val.name}
                        ));
                    }
                });
            }); 
        }
        $('.editFeatureRecord').click(function(){
            $('#edit-id').val($(this).data('id'));
            $('#edit-description').val($(this).data('description'));
            $('#editFeature').modal('show');
        });
        $('.editSpecRecord').click(function(){
            $('#editspec-id').val($(this).data('id'));
            $('#edit-title').val($(this).data('title'));
            $('#edit-value').val($(this).data('value'));
            $('#editSpecification').modal('show');
        });
        $('#fileUpload').change(function() {
            if (this.files && this.files.length > 0) {
                var file = this.files[0];
                var fileNameWithoutExtension = file.name.replace(/\.[^/.]+$/, "");

                $('#fileNames').empty();
                $('#fileNames').append('<input type="text" class="form-control" name="name" value="' + fileNameWithoutExtension + '">');
            }
        });
        $('.editResourceRecord').click(function(){
            $('#editRes-id').val($(this).data('id'));
            $('#edit-name').val($(this).data('name'));
            $('#editResource').modal('show');
        });
        function getValidationSettings(additionalSettings) {
            var commonSettings = {
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
                    } else if (element.parents().hasClass('form-control-feedback') || element.parents().hasClass('form-check') || element.parents().hasClass('input-group')) {
                        error.appendTo(element.parent().parent());
                    } else {
                        error.insertAfter(element);
                    }
                }
            };
            return $.extend(commonSettings, additionalSettings);
        }
        $('.editValidate').validate(getValidationSettings({}));
        $('.validateCreatFeature').validate(getValidationSettings({}));
        $('.validateUpdateFeature').validate(getValidationSettings({}));
        $('.validateCreatSpec').validate(getValidationSettings({}));
        $('.validateUpdateSpec').validate(getValidationSettings({}));
        $('.validateCreatResource').validate(getValidationSettings({}));
        $('.validateUpdateResource').validate(getValidationSettings({}));
        $('.validateImageCreate').validate(getValidationSettings({}));
    });
</script>
@endsection
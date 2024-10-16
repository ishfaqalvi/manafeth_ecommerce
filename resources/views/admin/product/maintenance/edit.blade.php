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
            <a href="{{ route('products.maintenance.index') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
                    @include('admin.product.maintenance.form')
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
        function sub_category_list(categoryId,sub_category_id){
            if (categoryId) {
                var allSubCategories = @json(subCategories(null));
                var subCategories = allSubCategories.filter(function(state) {
                    return state.category_id == categoryId;
                });
                $('select[name=sub_category_id]').html('<option value="">--Select--</option>');
                $('select[name=sub_category_id]').attr('disabled',false);
                $.each(subCategories, function (key, value) {
                    if(value.id == sub_category_id){
                        $('select[name=sub_category_id]').append($('<option>',
                            {selected : 'selected', value : value.id, text : value.name}
                        ));
                    }else{
                        $('select[name=sub_category_id]').append($('<option>',
                            {value : value.id,  text : value.name}
                        ));
                    }
                });
            } else {
                $('select[name=sub_category_id]').append('<option value="">--Select--</option>');
                $('select[name=sub_category_id]').attr('disabled', true);
            }
        }
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
        ClassicEditor.create(document.querySelector('#ckeditorFeatures'), {
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                ]
            }
        }).catch(console.error);
        ClassicEditor.create(document.querySelector('#ckeditorDescription'), {
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                ]
            }
        }).catch(console.error);
        $('.editValidate').validate(getValidationSettings({}));
        $('.validateCreatSpec').validate(getValidationSettings({}));
        $('.validateUpdateSpec').validate(getValidationSettings({}));
        $('.validateCreatResource').validate(getValidationSettings({}));
        $('.validateUpdateResource').validate(getValidationSettings({}));
        $('.validateImageCreate').validate(getValidationSettings({}));
    });
</script>
@endsection

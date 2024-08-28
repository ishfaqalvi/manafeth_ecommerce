@extends('admin.layout.app')

@section('title')
    Rent Link
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Rent Link Managment</span>
        </h4>
    </div>
    @can('rentLinks-create')
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('links.create') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
                <span class="btn-labeled-icon bg-primary text-white rounded-pill">
                    <i class="ph-plus"></i>
                </span>
                Create New
            </a>
        </div>
    </div>
    @endcan
</div>
@endsection

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Rent Link</h5>
        </div>
        <table class="table datatable-basic">
            <thead class="thead">
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Link</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($rentLinks as $key => $rentLink)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $rentLink->title }}</td>
                    <td>
                        <button type="button" class="btn btn-link copy-link-btn" data-link="{{ $rentLink->web_page_url }}">
                            <i class="ph-link me-1"></i>
                            Copy Link
                        </button>
                    </td>
                    <td class="text-center">@include('admin.rent.link.actions')</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function () {
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
        $('.copy-link-btn').on('click', function() {
            var link = $(this).data('link');

            navigator.clipboard.writeText(link).then(function() {
                new Noty({
                    layout: 'bottomCenter',
                    text: "Link copied to clipboard!",
                    type: 'success'
                }).show();
            }).catch(function(error) {
                new Noty({
                    layout: 'bottomCenter',
                    text: "Failed to copy the link.",
                    type: 'error'
                }).show();
            });
        });
    });
</script>
@endsection
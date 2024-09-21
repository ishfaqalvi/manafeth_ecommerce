@extends('admin.layout.app')

@section('title', 'Settings')

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Settings</span>
        </h4>
    </div>
</div>
<div class="page-header-content d-lg-flex border-top">
    @include('admin.settings.include.navigation')
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Website</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-11 offset-lg-1">
                <form method="POST" action="{{ route('settings.save') }}" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <div class="row mb-3">
                            <label class="col-lg-4 mb-3 col-form-label">Logo :</label>
                            <div class="col-lg-8 mb-3">
                                <input type="file" name="website_logo" class="form-control dropify" accept="image" data-default-file="{{ settings('website_logo') }}">
                            </div>
                            <label class="col-lg-4 mb-3 col-form-label">Name :</label>
                            <div class="col-lg-8 mb-3">
                                <input type="text" name="values[website_name]" class="form-control" value="{{ settings('website_name') }}">
                            </div>
                            <label class="col-lg-4 mb-3 col-form-label">Address :</label>
                            <div class="col-lg-8 mb-3">
                                <input type="text" name="values[website_address]" class="form-control" value="{{ settings('website_address') }}">
                            </div>
                        </div>
                    </fieldset>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Save Changes<i class="ph-paper-plane-tilt ms-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('.dropify').dropify();
    });
</script>
@endsection

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
        <h5 class="mb-0">Twilio</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-11 offset-lg-1">
                <form method="POST" action="{{ route('settings.save') }}" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <div class="row mb-3">
                            <label class="col-lg-4 mb-3 col-form-label">SID :</label>
                            <div class="col-lg-8 mb-3">
                                <input type="text" name="values[twilio_sid]" class="form-control" value="{{ settings('twilio_sid') }}">
                            </div>
                            <label class="col-lg-4 mb-3 col-form-label">Auth Token :</label>
                            <div class="col-lg-8 mb-3">
                                <input type="text" name="values[twilio_token]" class="form-control" value="{{ settings('twilio_token') }}">
                            </div>
                            <label class="col-lg-4 mb-3 col-form-label">Service ID :</label>
                            <div class="col-lg-8 mb-3">
                                <input type="text" name="values[twilio_service_id]" class="form-control" value="{{ settings('twilio_service_id') }}">
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

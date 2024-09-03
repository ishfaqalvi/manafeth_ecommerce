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
        <h5 class="mb-0">General</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-9 offset-lg-2">
                <form method="POST" action="{{ route('settings.save') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-lg-4 col-form-label mt-2">Per page items  :</label>
                        <div class="col-lg-8 mt-2">
                            <input type="text" name="values[per_page_items]" class="form-control" value="{{ settings('per_page_items') }}">
                        </div>
                        <label class="col-lg-4 col-form-label mt-2">Shiping Charges  :</label>
                        <div class="col-lg-8 mt-2">
                            <input type="text" name="values[shiping_charges]" class="form-control" value="{{ settings('shiping_charges') }}">
                        </div>
                        <label class="col-lg-4 col-form-label mt-2">Minimum Receiving Order Amount  :</label>
                        <div class="col-lg-8 mt-2">
                            <input type="text" name="values[minimun_receiving_order_amount]" class="form-control" value="{{ settings('minimun_receiving_order_amount') }}">
                        </div>
                        <label class="col-lg-4 col-form-label mt-2">Order Receiving Watsapp Number:</label>
                        <div class="col-lg-8 mt-2">
                            <input type="text" name="values[watsapp_number_order_receive]" class="form-control" value="{{ settings('watsapp_number_order_receive') }}">
                        </div>
                        <label class="col-lg-4 col-form-label mt-2">Order Receiving Admin Email 1:</label>
                        <div class="col-lg-8 mt-2">
                            <input type="text" name="values[admin_email_order_receive1]" class="form-control" value="{{ settings('admin_email_order_receive1') }}">
                        </div>
                        <label class="col-lg-4 col-form-label mt-2">Order Receiving Admin Email 2:</label>
                        <div class="col-lg-8 mt-2">
                            <input type="text" name="values[admin_email_order_receive2]" class="form-control" value="{{ settings('admin_email_order_receive2') }}">
                        </div>
                        <label class="col-lg-4 col-form-label mt-2">Google Map API Key:</label>
                        <div class="col-lg-8 mt-2">
                            <input type="text" name="values[google_map_api_key]" class="form-control" value="{{ settings('google_map_api_key') }}">
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Save Changes<i class="ph-paper-plane-tilt ms-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

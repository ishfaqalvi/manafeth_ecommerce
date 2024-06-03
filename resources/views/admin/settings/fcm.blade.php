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
        <h5 class="mb-0">FCM Notifications</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <form method="POST" action="{{ route('settings.save') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <label class="col-lg-4 mb-3 col-form-label">Firebase Project Id :</label>
                        <div class="col-lg-8 mb-3">
                            <input type="text" name="values[firebase_project_id]" class="form-control" value="{{ settings('firebase_project_id') }}">
                        </div>
                        <label class="col-lg-4 mb-3 col-form-label">Google Application Credentials :</label>
                        <div class="col-lg-8 mb-3">
                            <input type="file" name="google_application_credentials" class="form-control dropify" accept=".json" data-default-file="{{ settings('google_application_credentials') }}">
                        </div>
                        <label class="col-lg-4 mb-3 col-form-label">Message Topic For All Customer :</label>
                        <div class="col-lg-8 mb-3">
                            <input type="text" name="values[firebase_topic]" class="form-control" value="{{ settings('firebase_topic') }}">
                            <span class="form-text">Add Multiple with commar seperated</span>
                        </div>
                        <label class="col-lg-4 mb-3 col-form-label">Sale Order Notification  :</label>
                        <div class="col-lg-8 mb-3">
                            <select name="values[sale_order_fcm_notification]" class="form-select">
                                <option value="Yes" {{ settings('sale_order_fcm_notification') == 'Yes' ? 'selected' : ''}}>Yes</option>
                                <option value="No" {{ settings('sale_order_fcm_notification') == 'No' ? 'selected' : ''}}>No</option>
                            </select>
                        </div>
                        <label class="col-lg-4 mb-3 col-form-label">Rent Order Notification  :</label>
                        <div class="col-lg-8 mb-3">
                            <select name="values[rent_order_fcm_notification]" class="form-select">
                                <option value="Yes" {{ settings('rent_order_fcm_notification') == 'Yes' ? 'selected' : ''}}>Yes</option>
                                <option value="No" {{ settings('rent_order_fcm_notification') == 'No' ? 'selected' : ''}}>No</option>
                            </select>
                        </div>
                        <label class="col-lg-4 mb-3 col-form-label">Maintenence Request Notification  :</label>
                        <div class="col-lg-8 mb-3">
                            <select name="values[maintenence_request_fcm_notification]" class="form-select">
                                <option value="Yes" {{ settings('maintenence_request_fcm_notification') == 'Yes' ? 'selected' : ''}}>Yes</option>
                                <option value="No" {{ settings('maintenence_request_fcm_notification') == 'No' ? 'selected' : ''}}>No</option>
                            </select>
                        </div>
                        <label class="col-lg-4 mb-3 col-form-label">Employee Task Notification :</label>
                        <div class="col-lg-8 mb-3">
                            <select name="values[employee_task_fcm_notification]" class="form-select">
                                <option value="Yes" {{ settings('employee_task_fcm_notification') == 'Yes' ? 'selected' : ''}}>Yes</option>
                                <option value="No" {{ settings('employee_task_fcm_notification') == 'No' ? 'selected' : ''}}>No</option>
                            </select>
                        </div>
                        <label class="col-lg-4 mb-3 col-form-label">Customer Rental End One day before Alert :</label>
                        <div class="col-lg-8 mb-3">
                            <select name="values[customer_rental_end_fcm_alert]" class="form-select">
                                <option value="Yes" {{ settings('customer_rental_end_fcm_alert') == 'Yes' ? 'selected' : ''}}>Yes</option>
                                <option value="No" {{ settings('customer_rental_end_fcm_alert') == 'No' ? 'selected' : ''}}>No</option>
                            </select>
                        </div>
                        <label class="col-lg-4 mb-3 col-form-label">Customer Rental End Notification :</label>
                        <div class="col-lg-8 mb-3">
                            <select name="values[customer_rental_end_fcm_notification]" class="form-select">
                                <option value="Yes" {{ settings('customer_rental_end_fcm_notification') == 'Yes' ? 'selected' : ''}}>Yes</option>
                                <option value="No" {{ settings('customer_rental_end_fcm_notification') == 'No' ? 'selected' : ''}}>No</option>
                            </select>
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

@section('script')
<script>
    $(document).ready(function() {
        $('.dropify').dropify();
    });
</script>
@endsection

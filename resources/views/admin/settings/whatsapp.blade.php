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
        <h5 class="mb-0">WhatsApp Notifications</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <form method="POST" action="{{ route('settings.save') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <label class="col-lg-4 mb-3 col-form-label">Admin Notification Receive Number  :</label>
                        <div class="col-lg-8 mb-3">
                            <input type="text" name="values[whatsapp_notification_number]" class="form-control" value="{{ settings('whatsapp_notification_number') }}">
                        </div>
                        <label class="col-lg-4 mb-3 col-form-label">Sale Item Add To Cart Notification  :</label>
                        <div class="col-lg-8 mb-3">
                            <select name="values[sale_item_add_to_cart_whatsapp_notification]" class="form-select">
                                <option value="Yes" {{ settings('sale_item_add_to_cart_whatsapp_notification') == 'Yes' ? 'selected' : ''}}>Yes</option>
                                <option value="No" {{ settings('sale_item_add_to_cart_whatsapp_notification') == 'No' ? 'selected' : ''}}>No</option>
                            </select>
                        </div>
                        <label class="col-lg-4 mb-3 col-form-label">Sale Order Notification  :</label>
                        <div class="col-lg-8 mb-3">
                            <select name="values[sale_order_whatsapp_notification]" class="form-select">
                                <option value="Yes" {{ settings('sale_order_whatsapp_notification') == 'Yes' ? 'selected' : ''}}>Yes</option>
                                <option value="No" {{ settings('sale_order_whatsapp_notification') == 'No' ? 'selected' : ''}}>No</option>
                            </select>
                        </div>
                        <label class="col-lg-4 mb-3 col-form-label">Rent Item Add To Cart Notification  :</label>
                        <div class="col-lg-8 mb-3">
                            <select name="values[rent_item_add_to_cart_whatsapp_notification]" class="form-select">
                                <option value="Yes" {{ settings('rent_item_add_to_cart_whatsapp_notification') == 'Yes' ? 'selected' : ''}}>Yes</option>
                                <option value="No" {{ settings('rent_item_add_to_cart_whatsapp_notification') == 'No' ? 'selected' : ''}}>No</option>
                            </select>
                        </div>
                        <label class="col-lg-4 mb-3 col-form-label">Rent Order Notification  :</label>
                        <div class="col-lg-8 mb-3">
                            <select name="values[rent_order_whatsapp_notification]" class="form-select">
                                <option value="Yes" {{ settings('rent_order_whatsapp_notification') == 'Yes' ? 'selected' : ''}}>Yes</option>
                                <option value="No" {{ settings('rent_order_whatsapp_notification') == 'No' ? 'selected' : ''}}>No</option>
                            </select>
                        </div>
                        <label class="col-lg-4 mb-3 col-form-label">Rent Expire Date Admin Alert:</label>
                        <div class="col-lg-8 mb-3">
                            <select name="values[rent_expire_date_admin_alert]" class="form-select">
                                <option value="Yes" {{ settings('rent_expire_date_admin_alert') == 'Yes' ? 'selected' : ''}}>Yes</option>
                                <option value="No" {{ settings('rent_expire_date_admin_alert') == 'No' ? 'selected' : ''}}>No</option>
                            </select>
                        </div>
                        <label class="col-lg-4 mb-3 col-form-label">Rent Expire Date Admin Notification:</label>
                        <div class="col-lg-8 mb-3">
                            <select name="values[rent_expire_date_admin_notification]" class="form-select">
                                <option value="Yes" {{ settings('rent_expire_date_admin_notification') == 'Yes' ? 'selected' : ''}}>Yes</option>
                                <option value="No" {{ settings('rent_expire_date_admin_notification') == 'No' ? 'selected' : ''}}>No</option>
                            </select>
                        </div>
                        <label class="col-lg-4 mb-3 col-form-label">Rent Expire Date Customer Alert:</label>
                        <div class="col-lg-8 mb-3">
                            <select name="values[rent_expire_date_watsapp_customer_alert]" class="form-select">
                                <option value="Yes" {{ settings('rent_expire_date_watsapp_customer_alert') == 'Yes' ? 'selected' : ''}}>Yes</option>
                                <option value="No" {{ settings('rent_expire_date_watsapp_customer_alert') == 'No' ? 'selected' : ''}}>No</option>
                            </select>
                        </div>
                        <label class="col-lg-4 mb-3 col-form-label">Rent Expire Date Customer Notification:</label>
                        <div class="col-lg-8 mb-3">
                            <select name="values[rent_expire_date_watsapp_customer_notification]" class="form-select">
                                <option value="Yes" {{ settings('rent_expire_date_watsapp_customer_notification') == 'Yes' ? 'selected' : ''}}>Yes</option>
                                <option value="No" {{ settings('rent_expire_date_watsapp_customer_notification') == 'No' ? 'selected' : ''}}>No</option>
                            </select>
                        </div>
                        <label class="col-lg-4 mb-3 col-form-label">Maintenence Request Notification  :</label>
                        <div class="col-lg-8 mb-3">
                            <select name="values[maintenence_request_whatsapp_notification]" class="form-select">
                                <option value="Yes" {{ settings('maintenence_request_whatsapp_notification') == 'Yes' ? 'selected' : ''}}>Yes</option>
                                <option value="No" {{ settings('maintenence_request_whatsapp_notification') == 'No' ? 'selected' : ''}}>No</option>
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

<div class="row mb-3">
    <label class="col-lg-4 col-form-label">Per page items  :</label>
    <div class="col-lg-8">
        <input type="text" name="values[per_page_items]" class="form-control" value="{{ settings('per_page_items') }}">
    </div>
    <label class="col-lg-4 col-form-label">Shiping Charges  :</label>
    <div class="col-lg-8">
        <input type="text" name="values[shiping_charges]" class="form-control" value="{{ settings('shiping_charges') }}">
    </div>
    <label class="col-lg-4 col-form-label">Minimum Receiving Order Amount  :</label>
    <div class="col-lg-8">
        <input type="text" name="values[minimun_receiving_order_amount]" class="form-control" value="{{ settings('minimun_receiving_order_amount') }}">
    </div>
    <label class="col-lg-4 col-form-label">Order Receiving Watsapp Number:</label>
    <div class="col-lg-8">
        <input type="text" name="values[watsapp_number_order_receive]" class="form-control" value="{{ settings('watsapp_number_order_receive') }}">
    </div>
    <label class="col-lg-4 col-form-label">Order Receiving Admin Email 1:</label>
    <div class="col-lg-8">
        <input type="text" name="values[admin_email_order_receive1]" class="form-control" value="{{ settings('admin_email_order_receive1') }}">
    </div>
    <label class="col-lg-4 col-form-label">Order Receiving Admin Email 2:</label>
    <div class="col-lg-8">
        <input type="text" name="values[admin_email_order_receive2]" class="form-control" value="{{ settings('admin_email_order_receive2') }}">
    </div>
</div>
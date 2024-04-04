<input type="hidden" name="customer_id" value="{{ auth('customer')->user()->id }}">
<div class="form-group d-flex flex-md-row flex-column gap-lg-4 gap-3">
    <div class="w-100 d-flex flex-column gap-2">
        <label for="full_name">Name*</label>
        <input type="text" class="form-control border-all-form-outline" id="full_name" name="full_name" placeholder="Full Name" required value="{{ $address->full_name }}">
    </div>
    <div class="w-100 d-flex flex-column gap-2">
        <label for="phone">Phone No*</label>
        <input type="tel" class="form-control border-all-form-outline" id="phone" name="phone_number" placeholder="Phone No" required value="{{ $address->phone_number }}">
    </div>
</div>
<div class="form-group d-flex flex-md-row flex-column gap-lg-4 gap-3">
    <div class="w-100 d-flex flex-column gap-2">
        <label for="postal_code">Zip/Postal Code</label>
        <input type="text" class="form-control border-all-form-outline" id="postal_code" name="postal_code" placeholder="Zip/Postal Code" required value="{{ $address->postal_code }}">
    </div>
    <div class="w-100 d-flex flex-column gap-2">
        <label for="city">City*</label>
        <input type="text" class="form-control border-all-form-outline" id="city" name="city" placeholder="City" required value="{{ $address->city }}">
    </div>
</div>
<div class="form-group d-flex flex-md-row flex-column gap-lg-4 gap-3">
    <div class="w-100 d-flex flex-column gap-2">
        <label for="state">State/Province*</label>
        <input type="text" class="form-control border-all-form-outline" id="state" name="state" placeholder="State/Province" required value="{{ $address->state }}">
    </div>
    <div class="w-100 d-flex flex-column gap-2">
        <label for="country">Country*</label>
        <input type="text" class="form-control border-all-form-outline" id="country" name="country" placeholder="Country" required value="{{ $address->country }}">
    </div>
</div>
<div class="form-group d-flex flex-md-row flex-column gap-lg-4 gap-3">
    <div class="w-100 d-flex flex-column gap-2">
        <label for="address">Address*</label>
        <input type="text" class="form-control border-all-form-outline" id="address" name="address" placeholder="Address" required value="{{ $address->address }}">
    </div>
</div>
<div class="form-group d-flex justify-content-end align-items-center">
    <button type="submit" class="button" name="update_profile">Save Address</button>
</div>

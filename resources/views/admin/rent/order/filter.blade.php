<div class="row">
    <div class="form-group col-md-3 mb-3">
        {{ Form::label('customer') }}
        <input type="text" class="form-control" name="brand" value="{{ !is_null($userRequest) ? $userRequest->customer : ''}}" placeholder="Search by customer">
    </div>
    <div class="form-group col-md-3 mb-3">
        {{ Form::label('category') }}
        <input type="text" class="form-control" name="category" value="{{ !is_null($userRequest) ? $userRequest->category : ''}}" placeholder="Search by category">
    </div>
    <div class="form-group col-md-3 mb-3">
        {{ Form::label('sub_category') }}
        <input type="text" class="form-control" name="sub_category" value="{{ !is_null($userRequest) ? $userRequest->sub_category : ''}}" placeholder="Search by sub category">
    </div>
    <div class="form-group col-md-3 mb-3">
        {{ Form::label('model') }}
        <input type="text" class="form-control" name="model" value="{{ !is_null($userRequest) ? $userRequest->model : ''}}" placeholder="Search by model">
    </div>
    <div class="form-group col-md-3 mb-3">
        <select name="type" class="form-control form-select">
            <option value="">--Select Type--</option>
            <option value="Rent" {{ !is_null($userRequest) ? ($userRequest->type == 'Rent'? 'selected' : '') : ''}}>Rent</option>
            <option value="Maintenance" {{ !is_null($userRequest) ? ($userRequest->type == 'Maintenance'? 'selected' : '') : ''}}>Maintenance</option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <input type="text" class="form-control" name="search" value="{{ !is_null($userRequest) ? $userRequest->search : ''}}" placeholder="Search (Name, Description)">
    </div>
    <div class="form-group col-md-1">
        <input type="checkbox" class="form-check-input" name="special" value="Yes" id="special" {{ !is_null($userRequest) ? ($userRequest->special == 'Yes'? 'checked' : '') : ''}}>
        {{ Form::label('special') }}
    </div>
    <div class="form-group col-md-2">
        <button type="submit" class="btn btn-primary w-100">
            Submit <i class="ph-paper-plane-tilt ms-2"></i>
        </button>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-3 mb-3">
        {{ Form::label('brand') }}
        <input type="text" class="form-control" name="brand" value="{{ !is_null($userRequest) ? $userRequest->brand : ''}}" placeholder="Search by brand">
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
        {{ Form::label('formula') }}
        <input type="text" class="form-control" name="formula" value="{{ !is_null($userRequest) ? $userRequest->formula : ''}}" placeholder="Search by sub formula">
    </div>
    <div class="form-group col-md-9">
        <input type="text" class="form-control" name="search" value="{{ !is_null($userRequest) ? $userRequest->search : ''}}" placeholder="Search (Name, Formula, Description)">
    </div>
    <div class="form-group col-md-3">
        <button type="submit" class="btn btn-primary w-100">
            Submit <i class="ph-paper-plane-tilt ms-2"></i>
        </button>
    </div>
</div>
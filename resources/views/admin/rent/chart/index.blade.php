@extends('admin.layout.app')

@section('title')
    Rent Chart
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Rent Chart Managment</span>
        </h4>
    </div>
</div>
@endsection

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Rent Chart</h5>
        </div>
        <div class="col-md-12">
            <div class="row p-3">
                @foreach (categoriesList('Rent') as $category)
                    <div class="col-md-4 mb-3">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action active">{{ $category->name }}</a>
                            <a class="list-group-item list-group-item-action d-flex">
                                Active <span class="badge border border-teal text-teal rounded-pill ms-auto">{{ $category->rented_products_count }}</span>
                            </a>
                            <a class="list-group-item list-group-item-action d-flex">
                                Available <span class="badge border border-teal text-teal rounded-pill ms-auto">{{ $category->available_products_count }}</span>
                            </a>
                            <a class="list-group-item list-group-item-action d-flex">
                                Ending Renting <span class="badge border border-teal text-teal rounded-pill ms-auto">{{ $category->rental_ending_soon_products_count }}</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

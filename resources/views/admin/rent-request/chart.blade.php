<div class="col-md-12">
    <div class="row p-3">
        @foreach (categoriesList('Rent') as $category)
            <div class="col-md-4 mb-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">{{ $category->name }}</a>
                    <a href="#" class="list-group-item list-group-item-action d-flex">
                        Active <span class="badge border border-teal text-teal rounded-pill ms-auto">{{ $category->rented_products_count }}</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action d-flex">
                        Available <span class="badge border border-teal text-teal rounded-pill ms-auto">{{ $category->available_products_count }}</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action d-flex">
                        Ending Renting <span class="badge border border-teal text-teal rounded-pill ms-auto">{{ $category->rental_ending_soon_products_count }}</span>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

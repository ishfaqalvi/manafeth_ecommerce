<div class="col-sm-12 rental-chart pb-5">
    <div class="tree text-center">
        <ul>
            <li>
                <a href="#" class="btn btn-info">
                    Rental Chart
                </a>
                @if(count(categoriesList('Rent')) > 0)
                    <ul>
                        @foreach (categoriesList('Rent') as $category)
                            <li>
                                <div style="width: 150px;" class="mx-auto">
                                    <div class="card mb-0">
                                        <div class="bg-yellow card-header d-flex align-items-center justify-content-center p-1">
                                            {{-- <a href="#" data-parentid="" class="text-white addFramework">
                                                <i class="ph-plus-circle"></i>
                                            </a> --}}
                                            <div class="fw-bold">{{ $category->name }}</div>
                                        </div>
                                        {{-- <div class="card-body p-1">
                                            <div class="fw-bold"> {{ $category->name }}</div>
                                        </div> --}}
                                    </div>
                                </div>
                                @if ($category->products->count() > 0)
                                    <ul>
                                        @foreach ($category->products as $product)
                                        @if($product->serial_number)
                                        <li>
                                            <div style="width: 150px;" class="mx-auto">
                                                <div class="card mb-0">
                                                    <div class="bg-yellow card-header d-flex align-items-center justify-content-center p-1">
                                                        {{-- <a href="#" data-parentid="" class="text-white addFramework">
                                                            <i class="ph-plus-circle"></i>
                                                        </a> --}}
                                                        <div class="fw-bold">{{ $product->serial_number }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        </ul>
    </div>
</div>

@extends('web.layout.app')

@section('title')
    Rent Product Now
@endsection

@section('content')
    <style>
        /* slider section */
        .linkProduct .slider {
            width: 80%;
            margin: auto;
        }

        .linkProduct .slider img {
            width: 100%;
            border-radius: 15px;
        }

        .linkProduct .slick-dots {
            bottom: 10px;
        }

        .linkProduct .slick-dots li button:before {
            font-size: 10px;
            color: #666;
        }

        .slick-dots li.slick-active button:before {
            color: rgb(243, 160, 16);
        }

        /* End slider section */

        /* nav item */
        .linkProduct .nav-tabs {
            border: none !important;
        }

        .linkProduct .nav-tabs .nav-link {
            border-radius: 5px !important;
            padding: 5px 10px !important;
        }

        .linkProduct .nav-tabs .active {
            background-color: orange !important;
            color: white !important;
            border: 1px orange !important;
        }

        .linkProduct .nav-link {
            margin-left: 10px;
            margin-bottom: 10px;
            color: black;
            border: 1px solid lightgray;
        }

        .linkProduct .nav-pills .nav-link.active {
            background-color: orange;
            color: white;
            border: none;
        }

        .linkProduct .nav-pills .nav-link.active:hover {
            color: white;
        }

        .linkProduct .nav-pills .nav-link {
            padding: 5px 10px;
        }

        .nav-pills .nav-link:hover {
            color: black;
        }

        .price {
            font-size: small;
        }

        .input-group-text img {
            width: 20px;
            height: auto;
            margin-right: 5px;
        }

        .form-label {
            margin-bottom: 0px;
        }

        .proceed-section button {
            border-radius: 20px;
            color: white;
            background-color: rgb(243, 160, 16);
        }

        .proceed-section button:hover {
            background-color: rgb(243, 160, 16);
            color: white;
        }
    </style>
    <div class="container-fluid pt-3 linkProduct">
        <div class="container">
            <div class="row section-1 mt-3">
                <div class="col-md-5 slider-section">
                    <div class="slider mt-4">
                        <div><img src="{{ $link->product->thumbnail }}" alt="Slide"></div>
                        @foreach ($link->product->images as $row)
                            <div><img src="{{ $row->image }}" alt="Slide"></div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-7 category-section">
                    <div class="row">
                        <div class="col">
                            <small class="text-muted">{{ $link->product->category->name }} /
                                {{ $link->product->subCategory->name }}</small>
                            <h1>{{ $link->product->name }}</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="tab-content">
                            @foreach ($link->product->rents as $rent)
                                <div id="{{ 'tab' . $rent->id }}"
                                    class="container tab-pane {{ $rent->id == $link->product_rent_id ? 'active' : '' }}">
                                    <br>
                                    <h3>AED {{ $rent->amount }} <small class="text-muted price">for
                                            {{ $rent->title }}</small></h3>
                                </div>
                            @endforeach
                        </div>
                        <ul class="nav nav-tabs" role="tablist">
                            @foreach ($link->product->rents as $rent)
                                <li class="nav-item">
                                    <a class="nav-link {{ $rent->id == $link->product_rent_id ? 'active' : '' }}"
                                        data-bs-toggle="tab" href="#{{ 'tab' . $rent->id }}">{{ $rent->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <label for="fromDate" class="form-label">From:</label>
                            <input type="date" class="form-control" id="fromDate" name="fromDate"
                                placeholder="Select start date" value="{{ date('Y-m-d', $link->from) }}">
                        </div>
                        <div class="col-md-4">
                            <label for="toDate" class="form-label">To:</label>
                            <input type="date" class="form-control" id="toDate" name="toDate"
                                placeholder="Select end date" value="{{ date('Y-m-d', $link->to) }}">
                        </div>
                        <div class="col-md-4">
                            <label for="quantity" class="form-label">Quantity:</label>
                            <input type="number" class="form-control" name="quantity" placeholder="Enter quanitity" value="{{ $link->quantity }}" id="quantity">
                        </div>
                        <div class="col-md-12 proceed-section my-3">
                            <button type="button" class="btn">Confirm & Proceed</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.slider').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                autoplay: true,
                autoplaySpeed: 3000,
                arrows: true,
            });
            $('#fromDate').on('change', function() {
                var fromDate = $(this).val();
                $('#toDate').attr('min', fromDate);

                if ($('#toDate').val() && $('#toDate').val() < fromDate) {
                    $('#toDate').val('');
                }
            });

            $('#toDate').on('change', function() {
                var toDate = $(this).val();
                $('#fromDate').attr('max', toDate);

                if ($('#fromDate').val() && $('#fromDate').val() > toDate) {
                    $('#fromDate').val('');
                }
            });
        });
    </script>
@endsection

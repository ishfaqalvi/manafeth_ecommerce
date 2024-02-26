@extends('admin.layout.app')

@section('title', 'Customers')

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Customers Managment</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            @can('customers-create')
            <a href="{{ route('customers.create') }}"
                class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
                <span class="btn-labeled-icon bg-primary text-white rounded-pill">
                    <i class="ph-plus"></i>
                </span>
                Create New
            </a>
            @endcan
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Customers</h5>
        </div>
        <div class="card-body">
            <div class="chart-container">
                <div class="chart has-fixed-height" id="customers_chart"></div>
            </div>
        </div>
        <table class="table table-striped text-nowrap table-customers">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Registered</th>
                    <th>Email</th>
                    <th>Phone #</th>
                    <th>Orders history</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $key => $customer)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <a href="#" class="d-block me-3">
                                <img src="{{ $customer->image }}" width="40" height="40" class="rounded-circle" alt="">
                            </a>
                            <div class="flex-fill">
                                <a href="#" class="fw-semibold">{{ $customer->name }}</a>
                                <div class="fs-sm text-muted">
                                    Not defined
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>{{ date('M d Y', $customer->created_at->timestamp) }}</td>
                    <td><a href="#">{{ $customer->email }}</a></td>
                    <td>{{ $customer->phone_number }}</td>
                    <td>
                        <div>
                            <i class="ph-clock fs-base lh-base align-top text-danger me-1"></i>
                            Pending:
                            <a href="#">0 orders</a>
                        </div>

                        <div>
                            <i class="ph-check-circle fs-base lh-base align-top text-success me-1"></i>
                            Processed:
                            <a href="#">0 orders</a>
                        </div>
                    </td>
                    <td class="text-center">@include('admin.customer.actions')</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function() {
        var customers_chart_element = document.getElementById('customers_chart');
        var customers_chart = echarts.init(customers_chart_element, null, { renderer: 'svg' });
        customers_chart.setOption({
            color: ['#EF5350', '#03A9F4','#4CAF50'],
            textStyle: {
                fontFamily: 'var(--body-font-family)',
                color: 'var(--body-color)',
                fontSize: 14,
                lineHeight: 22,
                textBorderColor: 'transparent'
            },
            animationDuration: 750,
            grid: {
                left: 0,
                right: 10,
                top: 35,
                bottom: 0,
                containLabel: true
            },
            legend: {
                type: 'scroll',
                data: ['New customers','Returned customers','Orders'],
                itemHeight: 8,
                itemGap: 40,
                pageIconColor: 'var(--body-color)',
                pageIconInactiveColor: 'var(--gray-500)',
                pageTextStyle: {
                    color: 'var(--body-color)'
                },
                textStyle: {
                    color: 'var(--body-color)',
                    padding: [0, 5]
                }
            },
            tooltip: {
                trigger: 'axis',
                className: 'shadow-sm rounded',
                backgroundColor: 'var(--white)',
                borderColor: 'var(--gray-400)',
                padding: 15,
                textStyle: {
                    color: '#000'
                },
                axisPointer: {
                    type: 'shadow',
                    shadowStyle: {
                        color: 'rgba(var(--body-color-rgb), 0.025)'
                    }
                }
            },
            xAxis: [{
                type: 'category',
                data: ['January','February','March','April','May','June','July','August','September','October','November','December'],
                axisLabel: {
                    color: 'rgba(var(--body-color-rgb), .65)'
                },
                axisLine: {
                    lineStyle: {
                        color: 'var(--gray-500)'
                    }
                },
                splitLine: {
                    show: true,
                    lineStyle: {
                        color: 'var(--gray-300)',
                        type: 'dashed'
                    }
                }
            }],
            yAxis: [
                {
                    type: 'value',
                    axisTick: {
                        show: false
                    },
                    axisLabel: {
                        color: 'rgba(var(--body-color-rgb), .65)',
                        formatter: '{value}k'
                    },
                    axisLine: {
                        lineStyle: {
                            color: 'var(--gray-500)'
                        }
                    },
                    splitLine: {
                        show: true,
                        lineStyle: {
                            color: 'var(--gray-300)'
                        }
                    },
                    splitArea: {
                        show: true,
                        areaStyle: {
                            color: ['rgba(var(--white-rgb), .01)', 'rgba(var(--black-rgb), .01)']
                        }
                    }
                },
                {
                    type: 'value',
                    axisTick: {
                        show: false
                    },
                    axisLabel: {
                        color: 'rgba(var(--body-color-rgb), .65)',
                        formatter: '{value}k'
                    },
                    axisLine: {
                        lineStyle: {
                            color: 'var(--gray-500)'
                        }
                    },
                    splitLine: {
                        show: true,
                        lineStyle: {
                            color: 'var(--gray-300)'
                        }
                    },
                    splitArea: {
                        show: true,
                        areaStyle: {
                            color: ['rgba(var(--white-rgb), .01)', 'rgba(var(--black-rgb), .01)']
                        }
                    }
                }
            ],
            series: [
                {
                    name: 'New customers',
                    type: 'bar',
                    data: [20, 49, 70, 232, 256, 767, 1356, 1622, 326, 200, 64, 33]
                },
                {
                    name: 'Returned customers',
                    type: 'bar',
                    data: [26, 59, 90, 264, 287, 707, 1756, 1822, 487, 188, 60, 23]
                },
                {
                    name: 'Orders',
                    type: 'line',
                    smooth: true,
                    symbol: 'circle',
                    symbolSize: 8,
                    yAxisIndex: 1,
                    data: [20, 22, 33, 45, 63, 102, 203, 234, 230, 165, 120, 62]
                }
            ]
        });
        var triggerChartResize = function() {
            customers_chart_element && customers_chart.resize();
        };
        var sidebarToggle = document.querySelectorAll('.sidebar-control');
        if (sidebarToggle) {
            sidebarToggle.forEach(function(togglers) {
                togglers.addEventListener('click', triggerChartResize);
            });
        }
        var resizeCharts;
        window.addEventListener('resize', function() {
            clearTimeout(resizeCharts);
            resizeCharts = setTimeout(function () {
                triggerChartResize();
            }, 200);
        });
        const swalInit = swal.mixin({
            buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-light',
                denyButton: 'btn btn-light',
                input: 'form-control'
            }
        });
        $(".sa-confirm").click(function(event) {
            event.preventDefault();
            swalInit.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                }
            }).then((result) => {
                if (result.value === true) $(this).closest("form").submit();
            });
        });
    });
</script>
@endsection

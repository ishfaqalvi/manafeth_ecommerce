@extends('web.customer.layout')

@section('customer_account')
@if (count($addresses) > 0)
<div class="w-100 my-acount-detail-form d-flex flex-column border-all-form-outline bg-white">
    <div><a href="{{ route('address.create') }}" class="btn btn-sm button">Add New Address</a></div>
    <table class="table table-hover table-bordered">
        <thead>
            <tr class="table-warning">
                <th scope="col">Name</th>
                <th scope="col">Phone #</th>
                <th scope="col">Postal Code</th>
                <th scope="col">City</th>
                <th scope="col">State</th>
                <th scope="col">Country</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($addresses as $address)
                <tr>
                    <td>{{ $address->full_name }}</td>
                    <td>{{ $address->phone_number }}</td>
                    <td>{{ $address->postal_code }}</td>
                    <td>{{ $address->city }}</td>
                    <td>{{ $address->state }}</td>
                    <td>{{ $address->country }}</td>
                    <td>{{ $address->address }}</td>
                    <td width="90px">
                        <a href="{{ route('address.edit',$address->id) }}" class="btn btn-sm btn-primary me-1">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-danger remove-address" data-id={{ $address->id }}>
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="bg-white border-all-form-outline w-100 request-found-wrapper d-flex flex-column align-items-center justify-content-center gap-2">
    <img src="{{ asset('assets/web/images/Magnifier-icon.png') }}" alt="Magnifier Icon" srcset="">
    <h2 class="mb-0">No address found!</h2>
    <p class="mb-3 text-center">You have not added any address in list yet!</p>
    <a href="{{ route('address.create') }}" class="button">Add New Address</a>
</div>
@endif
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('.remove-address').on('click', function(e) {
            $("#overlay").show('slow');
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: '/customer/address/delete',
                type: 'POST',
                data: {
                    id: id,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $("#overlay").hide('slow');
                    toastr.success('Address removed successfully.');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    $("#overlay").hide('slow');
                    if(xhr.status === 401) {
                        toastr.warning('Please login first for this action.');
                    } else {
                        toastr.error('Some thing went wrong!');
                    }
                }
            });
        });
    });
</script>
@endsection

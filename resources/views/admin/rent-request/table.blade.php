<div class="table-responsive">
    <table class="table text-nowrap">
        <thead class="thead">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Phone #</th>
                <th>Date</th>
                <th>Time</th>
                <th>Task</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($rentRequests as $key => $rentRequest)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $rentRequest->name }}</td>
                <td>{{ $rentRequest->phone_number }}</td>
                <td>{{ Carbon\Carbon::parse($rentRequest->created_at)->toDateString() }}</td>
                <td>{{ Carbon\Carbon::parse($rentRequest->created_at)->toTimeString() }}</td>
                <td>
                    @if (!is_null($rentRequest->task))
                        {{ $rentRequest->task->status." By ". $rentRequest->task->employee_service }}
                    @endif
                </td>
                <td>{{ $rentRequest->status }}</td>
                <td class="text-center">@include('admin.rent-request.actions')</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="card-body">
        {{ $rentRequests->links('vendor.pagination.bootstrap-5') }}
    </div>
</div>

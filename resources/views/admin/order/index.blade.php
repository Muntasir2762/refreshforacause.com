@extends('admin.layout.default')

@section('pageTitle')
    orders | All
@endsection

@section('mainContent')
    <div class="page-header">
        <h2 class="header-title">{{ ucfirst($order_status) }} Orders</h2>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            @if ($type == "generalorder")
            <form action="{{ route('manage.orders', ['all']) }}" method="GET" class="d-flex">
            @elseif ($type == "orgorder")    
            <form action="{{route('manage.orders.org', [$orders[0]->org_id, 'all'])}}" method="GET" class="d-flex">
            @endif
                @csrf
                <input type="text" id="db_search" name="db_search" class="form-control mr-2"
                    placeholder="Put Order ID or Phone...">
                <button type="submit" class="btn btn-primary">Search</button>
                @if ($type == "generalorder")
                <a href="{{ route('manage.orders', ['all']) }}" class="btn btn-secondary ml-2">Clear</a>
                @elseif ($type == "orgorder")
                <a href="{{route('manage.orders.org', [$orders[0]->org_id, 'all'])}}" class="btn btn-secondary ml-2">Clear</a>
                @endif
            </form>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            @if ($type == "generalorder")
            <form action="{{ route('manage.orders', ['all']) }}" method="GET" class="d-flex">
            @elseif ($type == "orgorder")    
            <form action="{{route('manage.orders.org', [$orders[0]->org_id, 'all'])}}" method="GET" class="d-flex">
            @endif
                @csrf
                <select name="status_search" id="status_search" class="form-control mr-2">
                    <option value="" selected disabled>Filter Order By Order Status</option>
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="delivered">Delivered</option>
                    <option value="cancelled">Cancelled</option>
                    <option value="returned">Returned</option>
                </select>
                <button type="submit" class="btn btn-primary">Search</button>
                @if ($type == "generalorder")
                <a href="{{ route('manage.orders', ['all']) }}" class="btn btn-secondary ml-2">Clear</a>
                @elseif ($type == "orgorder")
                <a href="{{route('manage.orders.org', [$orders[0]->org_id, 'all'])}}" class="btn btn-secondary ml-2">Clear</a>
                @endif
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (count($orders))
                        <table id="data-table" class="table dataTable" role="grid" aria-describedby="data-table_info">
                            <thead>
                                <tr role="row">
                                    <th>Sl.</th>
                                    <th>OrderId</th>
                                    <th>Customer Info.</th>
                                    <th>Product(s)</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            {{ $order->invoice_no }} <br>
                                            @if ($order->affiliate_id != null)
                                                <span class="badge badge-success">Org:
                                                    {{ $order->affiliateMember?->organization?->first_name ?? 'Not Found' }}</span><br>
                                                <span
                                                    class="badge badge-info">Member:{{ $order->affiliateMember->first_name }}</span><br>
                                            @endif
                                        </td>
                                        <td>
                                            <b>Name:</b> {{ $order->buyer_name }} <br>
                                            <b>Phone:</b> {{ $order->buyer_phone ?? 'Not found' }} <br>
                                            <b>Email:</b> {{ $order->buyer_email ?? 'Not found' }} <br>
                                            <b>Address:</b> {{ $order->buyer_address ?? 'Not found' }} <br>
                                        </td>
                                        <td>
                                            @foreach ($order->orderDetails as $details)
                                                <img
                                                    src="{{ asset($details->product?->thumb_small ?? 'https://dummyimage.com/100X100/000/fff') }}"><br>
                                                {{ $details->qty }} X {{ $details->product?->title }}<br>
                                                <b>SKU ID: {{ $details->product?->sku_id }}</b> <br>
                                                <hr>
                                            @endforeach
                                            <b>Total Item: {{ $order->total_items }}</b>
                                        </td>
                                        <td>
                                            {{ $order->grand_total }}
                                        </td>
                                        <td>
                                            <!-- Dropdown for status -->
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton{{ $order->id }}" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    @if ($order->status)
                                                        {{ ucfirst($order->status) }}
                                                    @else
                                                        Select Status
                                                    @endif
                                                </button>
                                                <div class="dropdown-menu"
                                                    aria-labelledby="dropdownMenuButton{{ $order->id }}">
                                                    <a class="dropdown-item" href="#" data-status="pending"
                                                        onclick="updateStatus({{ $order->id }}, 'pending', event)">Pending</a>
                                                    <a class="dropdown-item" href="#" data-status="confirmed"
                                                        onclick="updateStatus({{ $order->id }}, 'confirmed', event)">Confirmed</a>
                                                    <a class="dropdown-item" href="#" data-status="delivered"
                                                        onclick="updateStatus({{ $order->id }}, 'delivered', event)">Delivered</a>
                                                    <a class="dropdown-item" href="#" data-status="cancelled"
                                                        onclick="updateStatus({{ $order->id }}, 'cancelled', event)">Cancelled</a>
                                                    <a class="dropdown-item" href="#" data-status="returned"
                                                        onclick="updateStatus({{ $order->id }}, 'returned', event)">Returned</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $order->created_at->format('m-d-Y') }}</td>
                                        <td class="text-right">
                                            <div class="row justify-content-end">
                                                <div class="mr-1">
                                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded btn-success">
                                                        <i class="anticon anticon-eye"></i>
                                                    </button>
                                                </div>
                                                {{-- <div class="mr-1">
                                                    <a href="#"
                                                        class="btn btn-icon btn-hover btn-sm btn-rounded btn-info">
                                                        <i class="anticon anticon-edit"></i>
                                                    </a>
                                                </div> --}}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        {{-- <div class="row">
                            <div class="text-right justify-end">
                                {{ $orders->links() }}
                            </div>
                        </div> --}}
                    @else
                        <p>No Data.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('extra_script')
    <script>
        $(document).ready(function() {
            $('#data-table').DataTable({
                paging: true, // Enable pagination
                searching: true, // Enable search functionality
                ordering: true, // Enable column sorting
                info: true, // Show table info
                lengthChange: true, // Allow users to change the number of records displayed
            });
        });
    </script>

    <script>
        function updateStatus(orderId, status, event) {
            event.preventDefault(); // Prevent the default behavior (form submission or link click)

            $.ajax({
                url: '/manage-orders/update-order-status', // Update with your route for status update
                method: 'POST',
                data: {
                    order_id: orderId,
                    status: status,
                    _token: '{{ csrf_token() }}' // Include CSRF token for security
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success('Order status updated successfully!', 'Success', {
                            "positionClass": "toast-top-right",
                            "timeOut": "3000", // Duration in milliseconds
                            "closeButton": true
                        });

                        // Update the dropdown button text dynamically
                        $('#dropdownMenuButton' + orderId).text(status.charAt(0).toUpperCase() + status.slice(
                            1));
                    } else {
                        toastr.error('Failed to update order status.', 'Error', {
                            "positionClass": "toast-top-right",
                            "timeOut": "3000",
                            "closeButton": true
                        });
                    }
                },
                error: function() {
                    toastr.error('An error occurred.', 'Error', {
                        "positionClass": "toast-top-right",
                        "timeOut": "3000",
                        "closeButton": true
                    });
                }
            });
        }
    </script>
@endpush

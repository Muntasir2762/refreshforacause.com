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
            <form action="{{ route('manage.orders', ['all']) }}" method="GET" class="d-flex">
                @csrf
                <input type="text" id="db_search" name="db_search" class="form-control mr-2" placeholder="Put Order ID or Phone...">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="{{ route('manage.orders', ['all']) }}" class="btn btn-secondary ml-2">Clear</a>
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
                                            {{ $order->invoice_no }}
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
                                            Test
                                        </td>
                                        <td>{{ $order->created_at->format('m-d-Y') }}</td>
                                        <td class="text-right">
                                            <div class="row justify-content-end">
                                                <div class="mr-1">
                                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded btn-success">
                                                        <i class="anticon anticon-eye"></i>
                                                    </button>
                                                </div>
                                                <div class="mr-1">
                                                    <a href="#"
                                                        class="btn btn-icon btn-hover btn-sm btn-rounded btn-info">
                                                        <i class="anticon anticon-edit"></i>
                                                    </a>
                                                </div>
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
@endpush

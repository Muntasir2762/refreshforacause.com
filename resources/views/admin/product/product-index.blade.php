@extends('admin.layout.default')

@section('pageTitle')
    Products | All
@endsection

@section('mainContent')
    <div class="page-header">
        <h2 class="header-title">All Products</h2>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (count($products))
                        <table id="data-table" class="table dataTable" role="grid" aria-describedby="data-table_info">
                            <thead>
                                <tr role="row">
                                    <th>SKU Code</th>
                                    <th>Thumbnail</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->sku_id }}</td>
                                        {{-- Old Image... --}}
                                        {{-- <td>
                                            <img src="{{ asset($product->thumb_small) }}" alt="">
                                        </td> --}}
                                        <td>
                                            @php
                                                // Decode the JSON and get the first image
                                                $thumbSmallArray = json_decode($product->thumb_small, true);
                                                $firstImage = $thumbSmallArray[0] ?? null; // Get the first image or null if not available
                                            @endphp
                                        
                                            @if ($firstImage)
                                                <img src="{{ asset($firstImage) }}" alt="Thumbnail Image">
                                            @else
                                                <img src="{{ asset('default-image.jpg') }}" alt="Default Image">
                                            @endif
                                        </td>                                        
                                        <td>
                                            {{ $product->title }}
                                        </td>
                                        <td>
                                            {{ $product->category->name }}
                                        </td>
                                        <td>
                                            {{ $product->quantity }}
                                        </td>
                                        <td>
                                            {{ ucwords($product->status) }}
                                        </td>
                                        <td class="text-right">
                                            <div class="row justify-content-end">
                                                <div class="mr-1">
                                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded btn-success">
                                                        <i class="anticon anticon-eye"></i>
                                                    </button>
                                                </div>
                                                <div class="mr-1">
                                                    <a href="{{ route('manage.products.edit', ['id' => $product->id]) }}"
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
                        <div class="row">
                            <div class="text-right justify-end">
                                {{ $products->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    @else
                        <p>No Data.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

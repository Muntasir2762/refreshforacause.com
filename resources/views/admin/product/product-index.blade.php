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
                    <table id="data-table" class="table dataTable" role="grid" aria-describedby="data-table_info">
                        <thead>
                            <tr role="row">
                                <th>#ID</th>
                                <th>SKU</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <div class="row">
                        {{-- <div class="text-right justify-end">
                            {{ $products->links('pagination::bootstrap-4') }}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

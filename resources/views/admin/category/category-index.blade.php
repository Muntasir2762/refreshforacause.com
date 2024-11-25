@extends('admin.layout.default')

@section('pageTitle')
    Category
@endsection

@section('mainContent')
    <div class="page-header">
        <h2 class="header-title">Manage Category</h2>
    </div>
    <div class="row">
        <div class="col-md-8 col-12">
            <div class="card">
                <div class="card-header pt-2">
                    <h5>All Categories</h5>
                </div>
                <div class="card-body">
                    <table id="data-table" class="table dataTable" role="grid" aria-describedby="data-table_info">
                        <thead>
                            <tr role="row">
                                <th>#ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                                <tr role="row">
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ ucfirst($category->status) }}</td>
                                    <td class="text-right">
                                        <div class="row justify-content-end">
                                            <div class="mr-1">
                                                <a href="{{ route('manage.categories.edit', ['id' => $category->id]) }}"
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
                            {{ $categories->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-header pt-2">
                    <h5>Add Category</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('manage.categories.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Category name" value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label>

                                    <select name="status" id="status" class="form-control">
                                        @foreach ($statuses as $status)
                                            <option @if (strtolower($status->name) == 'live') selected @endif
                                                value="{{ strtolower($status->name) }}">{{ ucwords($status->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group text-right">
                                    <button class="btn btn-primary text-uppercase" type="submit">SAVE</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

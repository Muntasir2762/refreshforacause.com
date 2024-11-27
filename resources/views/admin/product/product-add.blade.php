@extends('admin.layout.default')

@section('pageTitle')
    Product | Add
@endsection

@section('mainContent')
    <div class="page-header">
        <h2 class="header-title">Add Product</h2>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('manage.products.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title <sup class="text-danger">*</sup></label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        placeholder="Name" value="{{ old('title') }}" required>
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

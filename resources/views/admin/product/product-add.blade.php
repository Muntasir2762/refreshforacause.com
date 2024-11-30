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
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="title">Title <sup class="text-danger">*</sup></label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        placeholder="Title" value="{{ old('title') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sku_id">SKU Code <sup class="text-danger">*</sup></label>
                                    <input type="text" name="sku_id" id="sku_id" class="form-control"
                                        placeholder="Title" value="{{ old('sku_id') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Category <sup class="text-danger">*</sup></label>
                                    <select class="form-control" name="category_id" id="category" required>
                                        <option value="">--SELECT--</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="price">Price ($)<sup class="text-danger">*</sup></label>
                                    <input type="number" min="1" step="0.1" name="price" id="price"
                                        class="form-control" placeholder="Price" value="{{ old('price') }}" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="discount_amount">Discount Amount</label>
                                    <input type="number" min="1" step="0.1" name="discount_amount"
                                        id="discount_amount" class="form-control" placeholder="Discount amount"
                                        value="{{ old('discount_amount') }}">
                                    <small class="text-muted">In percentage (%), e.g. 1.5 (just the value)</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="vat_amount">Vat Amount</label>
                                    <input type="number" min="1" step="0.1" name="vat_amount" id="vat_amount"
                                        class="form-control" placeholder="Vat Amount" value="{{ old('vat_amount') }}">
                                    <small class="text-muted">In percentage (%), e.g. 1.5 (just the value)</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="quantity">Quantity <sup class="text-danger">*</sup></label>
                                    <input type="number" min="1" step="1" name="quantity" id="quantity"
                                        class="form-control" placeholder="Quantity" value="{{ old('quantity') }}" required>
                                    <small class="text-muted">Product quantity</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="size">Size </label>
                                    <select class="form-control" name="size" id="size">
                                        <option value="">--SELECT--</option>
                                        @foreach ($productSizes as $size)
                                            <option value="{{ $size->size }}">{{ ucwords($size->size) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="material">Material</label>
                                    <input type="text" name="material" id="material" class="form-control"
                                        placeholder="Material" value="{{ old('material') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="color">Color</label>
                                    <input type="text" name="color" id="color" class="form-control"
                                        placeholder="Color" value="{{ old('color') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="capacity">Capacity</label>
                                    <input type="text" name="capacity" id="capacity" class="form-control"
                                        placeholder="Capacity" value="{{ old('capacity') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status">Status <sup class="text-danger">*</sup></label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="">--SELECT--</option>
                                        @foreach ($productStatuses as $status)
                                            <option value="{{ $status->name }}">{{ ucwords($status->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="trend_type">Trend Type</label>
                                    <select class="form-control" name="trend_type" id="trend_type">
                                        <option value="">--SELECT--</option>
                                        @foreach ($productTrendTypes as $trend_type)
                                            <option value="{{ $trend_type->trend }}">{{ ucwords($trend_type->trend) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="checkbox mt-4">
                                        <input id="featured" name="is_featured" type="checkbox">
                                        <label for="featured">Featured</label>
                                    </div>
                                    <small class="text-muted">Check to make the product featured</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="thumbnail">Thumbnail Image <sup class="text-danger">*</sup></label>
                                    <input type="file" name="thumbnail" id="thumbnail" class="form-control" required>
                                    <small class="text-muted">Maximum size is 2Mb</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="5">{{ old('description') }}</textarea>
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

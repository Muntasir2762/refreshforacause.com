@extends('admin.layout.default')

@section('pageTitle')
    Product | Edit
@endsection

@section('mainContent')
    <div class="page-header">
        <h2 class="header-title">Edit {{ $product->title }}</h2>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('manage.products.update', ['id' => $product->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="title">Title <sup class="text-danger">*</sup></label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        placeholder="Title" value="{{ $product->title }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sku_id">SKU Code <sup class="text-danger">*</sup></label>
                                    <input type="text" name="sku_id" id="sku_id" class="form-control"
                                        placeholder="Title" value="{{ $product->sku_id }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Category <sup class="text-danger">*</sup></label>
                                    <select class="form-control" name="category_id" id="category" required>
                                        @foreach ($categories as $category)
                                            <option @if ($category->id == $product->category_id) selected @endif
                                                value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="price">Price ($)<sup class="text-danger">*</sup></label>
                                    <input type="number" min="1" step="0.1" name="price" id="price"
                                        class="form-control" placeholder="Price" value="{{ $product->price }}" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="discount_amount">Discount Amount</label>
                                    <input type="number" min="1" step="0.1" name="discount_amount"
                                        id="discount_amount" class="form-control" placeholder="Discount amount"
                                        value="{{ $product->discount_amount }}">
                                    <small class="text-muted">In percentage (%), e.g. 1.5 (just the value)</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="vat_amount">Vat Amount</label>
                                    <input type="number" min="1" step="0.1" name="vat_amount" id="vat_amount"
                                        class="form-control" placeholder="Vat Amount" value="{{ $product->vat_amount }}">
                                    <small class="text-muted">In percentage (%), e.g. 1.5 (just the value)</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="quantity">Quantity <sup class="text-danger">*</sup></label>
                                    <input type="number" min="1" step="1" name="quantity" id="quantity"
                                        class="form-control" placeholder="Quantity" value="{{ $product->quantity }}"
                                        required>
                                    <small class="text-muted">Product quantity</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="size">Size </label>
                                    <select class="form-control" name="size" id="size">
                                        <option value="">--SELECT--</option>
                                        @foreach ($productSizes as $size)
                                            <option @if (strtolower($size->size) == strtolower($product->size)) selected @endif
                                                value="{{ $size->size }}">{{ ucwords($size->size) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="material">Material</label>
                                    <input type="text" name="material" id="material" class="form-control"
                                        placeholder="Material" value="{{ $product->material }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="color">Color</label>
                                    <input type="text" name="color" id="color" class="form-control"
                                        placeholder="Color" value="{{ $product->color }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="capacity">Capacity</label>
                                    <input type="text" name="capacity" id="capacity" class="form-control"
                                        placeholder="Capacity" value="{{ $product->capacity }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status">Status <sup class="text-danger">*</sup></label>
                                    <select class="form-control" name="status" id="status">
                                        @foreach ($productStatuses as $status)
                                            <option @if (strtolower($status->name) == strtolower($product->status)) selected @endif
                                                value="{{ $status->name }}">{{ ucwords($status->name) }}</option>
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
                                            <option @if (strtolower($trend_type->trend) == strtolower($product->trend_type)) selected @endif
                                                value="{{ $trend_type->trend }}">{{ ucwords($trend_type->trend) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="checkbox mt-4">
                                        <input id="featured" name="is_featured"
                                            type="checkbox"@if ($product->is_featured) checked @endif>
                                        <label for="featured">Featured</label>
                                    </div>
                                    <small class="text-muted">Check/Uncheck to make the product featured/not</small>
                                </div>
                            </div>

                            {{-- Old Image update input field... --}}
                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-auto col-2">
                                            <img class="img img-fluid" src="{{ asset($product->thumb_small) }}">
                                        </div>
                                        <div class="col-md-11 col-12">
                                            <label for="thumbnail">Thumbnail Image </label>
                                            <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                                            <small class="text-muted">Maximum size is 5Mb</small>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="thumbnail">Current Thumbnail Images</label>
                                    <div class="row mb-3">
                                        @if ($product->thumb_small)
                                            @php
                                                $thumbSmallArray = json_decode($product->thumb_small, true);
                                            @endphp
                                            @foreach ($thumbSmallArray as $smallImage)
                                                <div class="col-md-2 col-4 mb-2">
                                                    <img src="{{ asset($smallImage) }}" class="img img-fluid border" alt="Thumbnail Image">
                                                </div>
                                            @endforeach
                                        @else
                                            <p>No images available.</p>
                                        @endif
                                    </div>
                            
                                    <label for="thumbnail">Replace Old Images with New Thumbnail Images</label>
                                    <input type="file" name="thumbnail[]" id="thumbnail" class="form-control" multiple>
                                    <small class="text-muted">Maximum size is 5Mb per image</small>
                                </div>
                            </div>                                                       
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="5">{{ $product->description }}</textarea>
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

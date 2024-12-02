@extends('admin.layout.default')

@section('pageTitle')
    Banner
@endsection

@section('mainContent')
    <div class="page-header">
        <h2 class="header-title">Manage Banners</h2>
    </div>
    <div class="row">
        <div class="col-md-8 col-12">
            <div class="card">
                <div class="card-header pt-2">
                    <h5>All Banners</h5>
                </div>
                <div class="card-body">
                    @if (count($bannerImages))
                        <table id="data-table" class="table dataTable" role="grid" aria-describedby="data-table_info">
                            <thead>
                                <tr role="row">
                                    <th>#ID</th>
                                    <th>Image</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bannerImages as $key => $bannerImage)
                                    <tr role="row">
                                        <td>{{ $bannerImage->id }}</td>
                                        <td>
                                            <img style="width: 80%" class="img img-fluid"
                                                src="{{ asset($bannerImage->image) }}" alt="banner">
                                        </td>
                                        <td class="text-right">
                                            <div class="row justify-content-end">
                                                <div class="mr-1">

                                                    <div>
                                                        <form
                                                            action="{{ route('manage.banners.delete', ['id' => $bannerImage->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                class="btn btn-icon btn-hover btn-sm btn-rounded btn-danger delete"
                                                                type="submit">
                                                                <i class="anticon anticon-delete"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No Data.</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-header pt-2">
                    <h5>Upload Banner</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('manage.banners.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">Image <span class="text-danger">*</span></label>
                                    <input type="file" name="image" id="image" class="form-control" required>
                                    <small class="text-muted">Max. size 2Mb, dimension 1920x400</small>
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

@section('script')
    <script>
        $('.delete').on('click', (e) => {
            e.preventDefault()
            const targetItem = e.currentTarget
            console.log(targetItem)
            Swal.fire({
                title: "Warning",
                text: "Are you sure you want to delete this?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                confirmButtonText: "DELETE"
            }).then((result) => {
                if (result.value) {
                    targetItem.closest('form').submit()
                }
            });
        })
    </script>
@endsection

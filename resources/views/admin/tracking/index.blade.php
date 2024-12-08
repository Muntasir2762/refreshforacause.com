@extends('admin.layout.default')

@section('pageTitle')
    Trackers
@endsection

@section('mainContent')
    <div class="page-header">
        <h2 class="header-title">Manage Trackers</h2>
    </div>
    <div class="row">
        <div class="col-md-8 col-12">
            <div class="card">
                <div class="card-header pt-2">
                    <h5>Trackers</h5>
                </div>
                <div class="card-body">
                    @if (count($trackingScripts))
                        <table id="data-table" class="table dataTable" role="grid" aria-describedby="data-table_info">
                            <thead>
                                <tr role="row">
                                    <th>#ID</th>
                                    <th>Type</th>
                                    <th>Position</th>
                                    <th style="width: 50%">
                                        Script
                                    </th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trackingScripts as $key => $tracker)
                                    <tr role="row">
                                        <td>{{ $tracker->id }}</td>
                                        <td>
                                            {{ $tracker->type }}
                                        </td>
                                        <td>
                                            {{ $tracker->position }}
                                        </td>
                                        <td style="width: 50%">
                                            {{ $tracker->script }}
                                        </td>
                                        <td class="text-right">
                                            <div class="row justify-content-end">
                                                <div class="mr-1">
                                                    <div>
                                                        <form
                                                            action="{{ route('tracking-script.delete', ['id' => $tracker->id]) }}"
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
                    <h5>Add Tracker</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('tracking-script.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type">Type <span class="text-danger">*</span></label>
                                    <select name="type" id="type" class="form-control" required>
                                        <option value="">--SELECT--</option>
                                        @foreach ($trackerTypes as $type)
                                            <option value="{{ $type }}">{{ $type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="position">Position <span class="text-danger">*</span></label>
                                    <select name="position" id="position" class="form-control" required>
                                        <option value="">--SELECT--</option>
                                        @foreach ($trackerPositions as $pos)
                                            <option value="{{ $pos }}">{{ $pos }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="tScript">Script <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="script" id="tScript" rows="5" required></textarea>
                            </div>

                            <div class="col-md-12 mt-4">
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

@extends('admin.layout.default')

@section('pageTitle')
    Users | Manage
@endsection

@section('mainContent')
    <div class="page-header">
        <h2 class="header-title">Manage Users</h2>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="data-table" class="table dataTable" role="grid" aria-describedby="data-table_info">
                        <thead>
                            <tr role="row">
                                <th>#ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr role="row">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->full_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ ucfirst($user->status) }}</td>
                                    <td class="text-right">
                                        <div class="row justify-content-end">
                                            <div class="mr-1">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded btn-success">
                                                    <i class="anticon anticon-eye"></i>
                                                </button>
                                            </div>
                                            <div class="mr-1">
                                                <a href="{{ route('manage.users.edit', ['id' => $user->id]) }}"
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
                            {{ $users->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pluginScript')
    <script src="{{ asset('admin/assets/vendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/datatables/dataTables.bootstrap.min.js') }}"></script>
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
